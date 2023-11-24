@extends('layouts.admin')

@section('body')
<main class="md:w-[calc(100%-256px)] md:ml-64 bg-gray-50 min-h-screen transition-all main">
    <table class="w-full mx-auto text-sm text-left text-gray-500">
        <thead>
            <tr class="bg-white border-b">
                <th class="px-4 py-2">Producto</th>
                <th class="px-4 py-2">Cantidad</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($trabajos as $trabajo)
            <tr class="bg-white border-b">
                @php
                $producto = \App\Models\Producto::find($trabajo->producto_id);
                $total = $trabajo->cantidad * $producto->precio;
                @endphp
                <td class="px-4 py-2">{{ $producto->nombre }}</td>
                <td class="px-4 py-2">{{ $trabajo->cantidad }}</td>
                <td class="px-4 py-2">

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <form action="{{ route('admin.pedidos.update', $trabajo->pedido_id) }}" method="POST" class="flex justify-center py-4">
        @csrf
        @method('PUT')
        @if ($completado == 0)
        <button type="submit" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Marcar como completado</button>
        @else
        <button type="submit" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Marcar como pendiente</button>
        @endif
    </form>
</main>
@endsection