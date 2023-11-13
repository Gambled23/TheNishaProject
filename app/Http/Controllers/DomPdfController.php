<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class DomPdfController extends Controller
{
    public function getPdf(Request $request)
    {
        date_default_timezone_set('America/Mexico_City');
        $data = [
            'titulo' => 'Welcome to Nisha',
            'nombreUsuario' => $request->nombreUsuario,
            'fechaPedido' => $request->fechaPedido,
            'fechaComprobante' => date('m/d/Y h:i a', time()),
            'precioTotal' => $request->precioTotal,
            'puntoEntrega'=> $request->puntoEntrega,
        ];
        $pdf = PDF::loadView('pdfPedido', $data);
        return $pdf->download('orden.pdf');
    }
}
