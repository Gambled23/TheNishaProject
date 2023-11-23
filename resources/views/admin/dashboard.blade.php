@extends ('layouts.admin')
@section('body')
    <!-- start: Main -->
    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-50 min-h-screen transition-all main">
        
    <?php
    $pagina = "Inicio"
    ?>

    <x-admin.upper-bar :$pagina/>

        <div class="p-6">

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
                <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
                    <div class="flex justify-between mb-6">
                        <div>
                        {{--    <div class="text-2xl font-semibold mb-1">{{ $datos['trabajosPendientes'] }}</div> --}}
                            <div class="text-sm font-medium text-gray-400">Trabajos pendientes</div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
                    <div class="flex justify-between mb-4">
                        <div>
                            <div class="flex items-center mb-1">
                        {{--        <div class="text-2xl font-semibold">{{ $datos['clientes'] }}</div>
                                @if ($datos['clientesNuevos'] > 0)
                                    <div class="p-1 rounded bg-emerald-500/10 text-emerald-500 text-[12px] font-semibold leading-none ml-2">+ {{ $datos['clientesNuevos'] }} </div>
                                @else
                                    <div class="p-1 rounded bg-red-500/10 text-red-500 text-[12px] font-semibold leading-none ml-2">- {{ $datos['clientesNuevos'] }} :c </div>
                                @endif
                            </div> --}}
                            <div class="text-sm font-medium text-gray-400">Clientes</div>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
                    <div class="flex justify-between mb-6">
                        <div>
                            <div class="text-2xl font-semibold mb-1"><span class="text-base font-normal text-gray-400 align-top">&dollar;</span>{{ $datos['dineroOrdenesActivas'] }}</div>
                            <div class="text-sm font-medium text-gray-400">{{ $datos['ordenesActivas'] }} trabajos activos</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
                <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md col-span-3">
                    <div class="flex justify-between mb-4 items-start">
                        <div class="font-medium">Ultimos Trabajos</div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full min-w-[460px]">
                            <thead>
                                <tr>
                                    <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tl-md rounded-bl-md">ID</th>
                                    <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left">Fecha</th>
                                    <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tr-md rounded-br-md">Usuario</th>
                                    <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tr-md rounded-br-md">Punto de entrega</th>
                                    <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tr-md rounded-br-md">Estado</th>
                                    <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tr-md rounded-br-md">Precio total</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{--@foreach ($datos['pedidos'] as $pedido)
                                <tr>
                                    <td class="py-2 px-4 border-b border-b-gray-50">
                                        <div class="flex items-center">
                                            <a href="#" class="text-blue-950 text-sm font-medium hover:text-blue-500 ml-2 truncate" style="text-decoration: underline;">{{ $pedido->id }}</a>
                                        </div>
                                    </td>
                                    <td class="py-2 px-4 border-b border-b-gray-50">
                                        <div class="text-gray-400 text-sm">{{ $pedido->created_at->format('d/m/Y') }}</div>
                                    </td>
                                    <td class="py-2 px-4 border-b border-b-gray-50">
                                        <div class="text-zinc-900 text-sm">{{ $pedido->user->name }}</div>
                                    </td>
                                    <td class="py-2 px-4 border-b border-b-gray-50">
                                            <div class="text-zinc-900 text-sm">{{ $pedido->puntoEntrega }}</div>
                                    </td>
                                    <td class="py-2 px-4 border-b border-b-gray-50">
                                        @if ($pedido->completado == 1)
                                            <span class="inline-block p-1 rounded bg-emerald-500/10 text-emerald-500 font-medium text-[12px] leading-none">Completado</span>
                                        @else
                                            <span class="inline-block p-1 rounded bg-rose-500/10 text-rose-500 font-medium text-[12px] leading-none">Pendiente</span>
                                        @endif
                                    </td>
                                    <td class="py-2 px-4 border-b border-b-gray-50">
                                            <div class="text-zinc-950 text-sm">${{ $pedido->precioTotal }}</div>
                                    </td>

                                </tr>
                                @endforeach--}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection