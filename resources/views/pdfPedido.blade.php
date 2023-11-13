<?php

use App\Models\Producto;
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Pedido de {{ $nombreUsuario }}</title>
    <style>
        body {
            display: flex;
            font-family: Arial, sans-serif;
            background-color: #f5f3ff;
            color: #333;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            width: calc(100% - 40px);
            margin: 20px auto;
            max-width: 800px;
        }
        h1 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #800080;
            color: white;
        }
        p {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <h1>Comprobante de pedido en Nisha</h1>
    <p><b>Usuario:</b> {{ $nombreUsuario }}</p>
    <p><b>Punto de entrega:</b> {{ $puntoEntrega }}</p>
    <p><b>Fecha del pedido:</b> {{ $fechaPedido }}</p>
    <p><b>Fecha del comprobante:</b> {{ $fechaComprobante }}</p>
    <table class="w-full text-sm text-left text-gray-500">
        <thead>
        <tr class="bg-white border-b">
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($trabajos as $trabajo)
        <tr class="bg-white border-b">
            @php
            $producto = Producto::find($trabajo->producto_id);
            $total = $trabajo->cantidad * $producto->precio;
            @endphp
            <td>{{ $producto->nombre }}</td>
            <td>{{ $trabajo->cantidad }}</td>
            <td>${{ $producto->precio }}</td>
            <td><b>${{ $total }}</b></td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <div style="text-align: right;">
        <p>Precio total: <b>${{ $precioTotal }}</b></p>
    </div>
</body>

</html>