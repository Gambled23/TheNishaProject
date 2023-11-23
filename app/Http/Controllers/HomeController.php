<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

Use App\Models\User;

use App\Models\Producto;
use App\Models\Trabajos;
use App\Models\Pedidos;
use GuzzleHttp\Promise\Each;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $usertype=Auth::user()->usertype;

        if($usertype)
        {    
            $clientesViejos = User::where('created_at', '<=', date('Y-m-d H:i:s', strtotime('-30 days')))
                                    ->where('created_at', '>=', date('Y-m-d H:i:s', strtotime('-60 days')))
                                    ->count();
            $clientesNuevos = User::where('created_at', '>=', date('Y-m-d H:i:s', strtotime('-3 days')))->count();
            
            $datos = [
                'trabajosPendientes' => Trabajos::count(),
                'clientes' => User::count(),
                'clientesNuevos' => $clientesNuevos - $clientesViejos,
                'ordenesActivas' => Pedidos::where('completado', '=', '0')
                                            ->where('pagado', '=', '1')
                                            ->count(),
                'dineroOrdenesActivas' => Pedidos::where('completado', '=', '0')
                                            ->where('pagado', '=', '1')
                                            ->sum('precioTotal'),
                'pedidos' => Pedidos::where('pagado', '=', '1')->latest()->take(15)->get(),



            ];
            #dd($datos['pedidos']);
            #dd($datos);
            return view('admin.dashboard', compact('datos'));
        }
    }
}
