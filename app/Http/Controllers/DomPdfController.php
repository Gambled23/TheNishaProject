<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class DomPdfController extends Controller
{
    public function getPdf(Request $request)
    {
        $data = [
            'title' => 'Welcome to Nisha',
            'date' => date('m/d/Y')
        ];
        $pdf = PDF::loadView('myPDF', $data);
        return $pdf->download('orden.pdf');
    }
}
