<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trabajos;
use App\Models\Pedidos;
use PDF;

class DomPdfController extends Controller
{
    public function getPdf(Request $request)
    {
        date_default_timezone_set('America/Mexico_City');
        $trabajos = Trabajos::where('pedido_id', $request->pedido_id)->get();
        $data = [
            'titulo' => 'Welcome to Nisha',
            'nombreUsuario' => $request->nombreUsuario,
            'fechaPedido' => $request->fechaPedido,
            'fechaComprobante' => date('d-m-Y h:i a', time()),
            'precioTotal' => $request->precioTotal,
            'puntoEntrega'=> $request->puntoEntrega,
            'trabajos' => $trabajos
        ];
        $pdf = PDF::loadView('pdfPedido', $data);
        return $pdf->download('orden.pdf');
    }
}
