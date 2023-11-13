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
    <p>Precio total: ${{ $precioTotal }}</p>
    <p>Punto de entrega: {{ $puntoEntrega }}</p>
    </body>
</html>