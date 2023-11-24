<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Pedidos;
use App\Models\Trabajos;
use App\Models\Producto;
use FontLib\Table\Type\name;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Illuminate\Support\Facades\Mail;
use App\Mail\confirmacionOrden;


class PaymentController extends Controller
{

    //Crear pedido
    protected $pedido;
    protected $cartItems;

    public function __construct()
    {
        $this->pedido = new Pedidos;
    }
    
    public function handlePayment(Request $request)
    {
        //Crear pedido
        $this->pedido->fill($request->all());
        $this->pedido->user_id = Auth::id();
        $this->pedido->save();
        $this->cartItems = json_decode($request->cartItems, true);

        //Crear trabajo
        foreach ($this->cartItems as $item) {
            $trabajo = new Trabajos;
            $trabajo->pedido_id = $this->pedido->id;
            $trabajo->cantidad = $item['quantity'];
            $producto = Producto::where('nombre', $item['name'])->first();
            $trabajo->producto_id = $producto->id;
            $trabajo->save();
        }

        //Pagar
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('user.success.payment'),
                "cancel_url" => route('user.cancel.payment'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "MXN",
                        //"value" => request('precioTotal'),
                        "value" => '0.1',
                    ]
                ]
            ]
        ]);
        if (isset($response['id']) && $response['id'] != null) {
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }
            return redirect()
                ->route('cancel.payment')
                ->with('error', 'Something went wrong.');
        } else {
            return redirect()
                ->route('create.payment')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    public function paymentCancel()
    {
        return redirect()
            ->route('create.payment')
            ->with('error', $response['message'] ?? 'You have canceled the transaction.');
    }

    public function paymentSuccess(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            # Actualizar pedido a pagado
            $this->pedido = Pedidos::latest()->first();
            $this->pedido->pagado = true;
            $this->pedido->save();
            # Enviar correo de confirmacion
            $trabajos = Trabajos::where('pedido_id', $this->pedido->id)->get();
            $email = Auth::user()->email;
            $data = [
                'nombreUsuario' => Auth::user()->name,
                'fechaPedido' => date('d-m-Y h:i a', time()),
                'precioTotal' => $this->pedido->precioTotal,
                'puntoEntrega'=> $this->pedido->puntoEntrega,
                'trabajos' => $trabajos
            ];
            Mail::to($email)->send(new confirmacionOrden($data));
            
            return redirect()->route('account');
        } else {
            return redirect()
                ->route('home')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }
}

