@extends ('layouts.main')
@section('body')


<div class="flex flex-col md:flex-row"> 
    <div class="flex flex-col md:flex-row md:items-stretch">   
        <div class="mx-4 md:w-1/2 h-full pb-16"> 
            <x-photo-carrousel :producto="$producto" />
        </div>
        
        <div class="mx-4 my-16 py-8 px-4 md:w-1/2 h-2/3 bg-violet-50 rounded-lg shadow-md overflow-auto"> 
        <h1 class=" text-4xl font-bold">{{ strtoupper($producto->nombre) }}</h1>
        <h2 class="my-2">${{ $producto->precio }}</h2>
        <p class="my-1">{{ $producto->descripcion }}</p>
        
        <div class="mt-3">

            <table>
                <thead>
                    <tr>
                        <th>Tags</th>
                    </tr>
                </thead>
                <tbody>
                    <td>
                        @foreach ($producto->tags as $tags)
                        <button class="text-white bg-purple-700 focus:ring-purple-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">{{$tags->nombre}}</button>
                        @endforeach
                    <td>
                </tbody>
            </table>
            <br>
            <table>
                <thead>
                    <tr>
                        <th>Variaciones Disponibles</th>
                    </tr>
                </thead>
                <tbody>
                    <td>
                        @foreach ($producto->variacions as $variacions)
                        {{$variacions->nombre}} : {{$variacions->pivot->tiempo_total}}
                        <br>
                        @endforeach
                    <td>
                        <td>
                        
</td>                   <td>
                </tbody>
            </table>
        </div>

        <br>
        
        <div class="flex justify-center">
            <x-carrito-button :producto="$producto" />
        </div>
    </div>
</div>


@endsection