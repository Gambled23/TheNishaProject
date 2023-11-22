@extends ('layouts.admin')
@section('body')

<main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-50 min-h-screen transition-all main">


    <?php
    $pagina = "Productos"
    ?>

    <x-admin.upper-bar :$pagina />

    <div class="flex flex-col">
        <h1 class="text-center mb-10 text-2xl font-mono"><br>Productos</h1>
        <a href="{{ route('admin.producto.create') }}" class="px-4 py-2 mb-4">Crear nuevo producto</a>

        @if ($message = Session::get('success'))
        <div class="p-4 mb-3 bg-blue-400 rounded">
            <p class="text-white">{{ $message }}</p>
        </div>
        @endif


        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full text-left text-sm font-light">
                        <thead class="border-b font-medium">
                            <tr>
                                <th scope="col" class="px-6 py-4">Nombre</th>
                                <th scope="col" class="px-6 py-4">Descripcion</th>
                                <th scope="col" class="px-6 py-4">Precio</th>
                                <th scope="col" class="px-6 py-4">Stock</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productos as $producto)

                            <tr class="border-b transition duration-300 ease-in-out hover:bg-neutral-100">

                                <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $producto->nombre }}</td> {{--aqui tengo q cambiar por otro show de nuevo controlador, <a href ="{{ route('producto.show', $producto)}}"> --}}
                                <td class="whitespace-nowrap px-6 py-4 font-medium max-w-[200px] overflow-hidden overflow-ellipsis">{{ $producto->descripcion }}</td>
                                <td class="whitespace-nowrap px-6 py-4 font-medium">${{ $producto->precio }}</td>
                                <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $producto->disponibles }}</td>

                                <td class="whitespace-nowrap px-6 py-4 font-medium"> 
                                    <form action="{{ route('admin.producto.edit', $producto) }}" method="GET">
                                        <button type="submit" class="text-black bg-white-700 hover:bg-gray-200 focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center">
                                            <svg class="w-3.5 h-3.5" aria-hidden="true" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5 15L4 16V20H8L14 14M18 10L21 7L17 3L14 6M18 10L17 11M18 10L14 6M14 6L7.5 12.5" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg> Editar detalles
                                        </button>
                                    </form>
                                </td>

                                <td class="whitespace-nowrap px-6 py-4 font-medium"> 
                                    <form action="{{ route('admin.producto.editImages', $producto) }}" method="GET">
                                        <button type="submit" class="text-black bg-white-700 hover:bg-gray-200 focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center">
                                            <svg class="w-3.5 h-3.5" aria-hidden="true" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M22 17V7C22 5.9 21.1 5 20 5H4C2.9 5 2 5.9 2 7V17C2 18.1 2.9 19 4 19H20C21.1 19 22 18.1 22 17ZM8.5 13.5L11 11L14.5 15H4V7H20V13.5L16.5 10L13 13.5L11 12L8.5 13.5Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg> Editar imagenes
                                        </button>
                                    </form>
                                </td>

                                <td>
                                    <form action="{{ route('admin.producto.destroy', $producto )}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 bg-white-700 hover:bg-red-200 focus:ring-2 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center">
                                            <svg class="w-3.5 h-3.5" aria-hidden="true" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M4 6H20M16 6L15.7294 5.18807C15.4671 4.40125 15.3359 4.00784 15.0927 3.71698C14.8779 3.46013 14.6021 3.26132 14.2905 3.13878C13.9376 3 13.523 3 12.6936 3H11.3064C10.477 3 10.0624 3 9.70951 3.13878C9.39792 3.26132 9.12208 3.46013 8.90729 3.71698C8.66405 4.00784 8.53292 4.40125 8.27064 5.18807L8 6M18 6V16.2C18 17.8802 18 18.7202 17.673 19.362C17.3854 19.9265 16.9265 20.3854 16.362 20.673C15.7202 21 14.8802 21 13.2 21H10.8C9.11984 21 8.27976 21 7.63803 20.673C7.07354 20.3854 6.6146 19.9265 6.32698 19.362C6 18.7202 6 17.8802 6 16.2V6M14 10V17M10 10V17" stroke="#800000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg> Eliminar </button>
                                    </form>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @endsection