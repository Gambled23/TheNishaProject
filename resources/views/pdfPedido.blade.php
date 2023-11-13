<?php

use App\Models\Producto;
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>My PDF</title>
</head>

<body>
    <h1>Comprobante de pedido en Nisha</h1>
    <p>Usuario: {{ $nombreUsuario }}</p>
    <p>Fecha del pedido: {{ $fechaPedido }}</p>
    <p>Fecha del comprobante: {{ $fechaComprobante }}</p>
    <table>
        <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Total</th>
        </tr>

        @foreach ($trabajos as $trabajo)
        <tr>
            @php
            $producto = Producto::find($trabajo->producto_id);
            $total = $trabajo->cantidad * $producto->precio;
            @endphp
            <td>{{ $producto->nombre }}</td>
            <td>{{ $trabajo->cantidad }}</td>
            <td>{{ $producto->precio }}</td>
            <td>{{ $total }}</td>
        </tr>
        @endforeach
    </table>
    <p>Precio total: ${{ $precioTotal }}</p>
    <p>Punto de entrega: {{ $puntoEntrega }}</p>
</body>

</html>