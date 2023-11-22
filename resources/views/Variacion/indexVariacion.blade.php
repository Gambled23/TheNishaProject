@extends ('layouts.admin')
@section('body')
<main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-50 min-h-screen transition-all main">


<?php
$pagina = "Variaciones"
?>

<x-admin.upper-bar :$pagina/>


<div class="flex flex-col">
    <h1 class="text-center mb-10 text-2xl font-mono"><br>Variaciones</h1>
    @can('create', \App\Models\Variacion::class)
        <a href="{{ route('admin.variacion.create') }}" class="px-4 py-2 mb-4">Crear nueva variacion</a>
    @endcan

    @if ($message = Session::get('success'))
        <div class="p-4 mb-3 bg-blue-400 rounded">
            <p class="text-white">{{ $message }}</p>
        </div>
    @endif

        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full text-left text-sm font-light">
                        <thead class="border-b font-medium dark:border-neutral-500">
                            <tr>
                                <th scope="col" class="px-6 py-4">Nombre</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($variacions as $var)
                        
                            <tr class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                                
                                <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $var->nombre }}</td> 
                                @can('update', $var)
                                    <td class="whitespace-nowrap px-6 py-4 font-medium"> <button type="button" class="text-black bg-white-700 hover:bg-gray-200 focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <svg class="w-3.5 h-3.5 mr-2" aria-hidden="true" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5 15L4 16V20H8L14 14M18 10L21 7L17 3L14 6M18 10L17 11M18 10L14 6M14 6L7.5 12.5" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>  <a href ="{{ route('admin.variacion.edit', $var)}}">Editar</button>
                                    </td>
                                @endcan

                                @can('delete', $var)
                                <td>
                                    <form action="{{ route('admin.variacion.destroy', $var )}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-black bg-white-700 hover:bg-gray-200 focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <svg class="w-3.5 h-3.5 mr-2" aria-hidden="true" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4 6H20M16 6L15.7294 5.18807C15.4671 4.40125 15.3359 4.00784 15.0927 3.71698C14.8779 3.46013 14.6021 3.26132 14.2905 3.13878C13.9376 3 13.523 3 12.6936 3H11.3064C10.477 3 10.0624 3 9.70951 3.13878C9.39792 3.26132 9.12208 3.46013 8.90729 3.71698C8.66405 4.00784 8.53292 4.40125 8.27064 5.18807L8 6M18 6V16.2C18 17.8802 18 18.7202 17.673 19.362C17.3854 19.9265 16.9265 20.3854 16.362 20.673C15.7202 21 14.8802 21 13.2 21H10.8C9.11984 21 8.27976 21 7.63803 20.673C7.07354 20.3854 6.6146 19.9265 6.32698 19.362C6 18.7202 6 17.8802 6 16.2V6M14 10V17M10 10V17" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg> Eliminar </button>
                                    </form>
                                </td>
                                @endcan
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</main>
@endsection