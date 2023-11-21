<?php 
use Illuminate\Support\Facades\Auth;
$user = Auth::user(); ?>

@extends ('layouts.main')
@section('body')

<h1 class="text-2xl font-bold text-center mb-8 mx-4">
    Bienvenid@, <p class="inline-flex text-violet-700">{{ $user->name }} </p> al centro de cuentas de Nisha</h1>

<h2 class="text-xl font-bold mt-8 mx-4 text-violet-950">Historial de pedidos</h2>
<div class="overflow-x-auto mx-4 mt-2">
    <table class="w-full text-sm text-left text-gray-500">
        <thead>
            <tr class="bg-white border-b">
                <th scope="col" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">Fecha</th>
                <th scope="col" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">Total</th>
                <th scope="col" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">Entrega</th>
                <th scope="col" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">¿Listo para <br> entrega?</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pedidos as $pedido)
            <form  method="post" action="{{ route('pdf') }}">
                <!--Datos para el pdf-->
                @csrf
                <input type="hidden" name="nombreUsuario" value="{{ $user->name }}">
                <input type="hidden" name="fechaPedido" value="{{ $pedido->created_at->format('d-m-Y') }}">
                <input type="hidden" name="precioTotal" value="{{ $pedido->precioTotal }}">
                <input type="hidden" name="puntoEntrega" value="{{ $pedido->puntoEntrega }}">
                <input type="hidden" name="pedido_id" value="{{ $pedido->id }}">

                <tr class="bg-white border-b">
                    <td class="px-4 py-3">{{ $pedido->created_at->format('d-m-Y') }}</td>
                    <td class="px-4 py-3">${{ $pedido->precioTotal }}</td>
                    @switch($pedido->puntoEntrega)
                        @case('CUCEI')
                            <td class="px-4 py-3 text-violet-950 hover:text-violet-600 hover:font-bold"><a target="_blank" href="https://maps.app.goo.gl/4q7XopET6G2ZsxbY7">CUCEI</a></td>
                            @break
                        @case('CUCEA')
                            <td class="px-4 py-3 text-violet-950 hover:text-violet-600 hover:font-bold"><a target="_blank" href="https://maps.app.goo.gl/XiGAgWJxiNvsfrMx6">CUCEA</a></td>
                            @break
                        @case('Linea 3')
                            <td class="px-4 py-3 text-violet-950 hover:text-violet-600 hover:font-bold"><a target="_blank" href="https://maps.app.goo.gl/z3xdn97PwUVw93HW7">Linea 3</a></td>
                            @break
                        @default
                            <td class="px-4 py-3 text-violet-950 hover:text-violet-600 hover:font-bold"><a target="_blank" href="https://wa.me/+523334490542"></a>Acordar con Nisha</td> 
                    @endswitch
                    @if ($pedido->completado)
                        <td class="px-4 py-3"><button type="submit" title="Descargar comprobante"><i class="fa-solid fa-paw fa-xl" style="color: #26a269;"></i></button></td>
                    @else
                        <td class="px-4 py-3"><button type="submit" title="Descargar comprobante"><i class="fa-solid fa-xmark fa-xl" style="color: #a51d2d;"></i></button></td>
                    @endif
                </tr>
            </form>
            @endforeach
        </tbody>
    </table>
</div>

<h2 class="text-xl font-bold mt-8 mx-4 text-violet-950">Detalles de tu cuenta</h2>
<div class="overflow-x-auto mt-2 mx-4">
    <table class="w-full text-sm text-left text-gray-500">
        <tbody>
            <tr class="bg-white border-b">
                <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                    <i class="fa-solid fa-paw fa-xl pr-2" style="color: #3730a3;"></i>
                    Nombre de la cuenta:
                </th>
                <td class="px-4 py-3">
                    {{ Auth::user()->name }}
                </td>
            </tr>
            <tr class="border-b bg-gray-50 ">
                <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                    <i class="fa-solid fa-paw fa-xl pr-2" style="color: #312e81;"></i>
                    Correo electrónico:
                </th>
                <td class="px-4 py-3">
                    {{ Auth::user()->email }}
                </td>
            </tr>
        </tbody>
    </table>
</div>

<div class="flex flex-col sm:flex-row mt-8 justify-center">
    <div class="sm:mr-12 mb-4 sm:mb-0">
        <form method="post" action="{{ route('logout') }}" class="flex justify-center">
            @csrf
            <button class="bg-gray-500 text-white rounded-lg px-6 py-2 hover:bg-gray-600 transition ease-in-out delay-50" onclick="">Cerrar sesión</button>
        </form>
    </div>

    <form action="/user/{{ $user->id }}" method="POST" class="flex justify-center">
        @csrf
        @method('DELETE')
        <button class="bg-red-600 text-white rounded-lg px-6 py-2 hover:bg-red-700 transition ease-in-out delay-50" onclick="" type="submit">Eliminar cuenta</button>
    </form>
</div>

@endsection