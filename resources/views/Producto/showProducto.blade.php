@extends ('layouts.main')
@section('body')


<div class="flex flex-col md:flex-row"> 
    <div class="flex flex-col md:flex-row md:items-stretch">   
        <div class="mx-4 md:w-1/2 h-full pb-16"> 
            <x-photo-carrousel :producto="$producto" />
        </div>
        
        <div class="mx-4 my-16 py-8 px-4 md:w-1/2 h-2/3 bg-violet-50 rounded-lg shadow-md"> 
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
                        {{$tags->nombre}}
                        @endforeach
                    <td>
                </tbody>
            </table>
            <table>
                <thead>
                    <tr>
                        <th>Variaciones</th>
                    </tr>
                </thead>
                <tbody>
                    <td>
                        @foreach ($producto->variacions as $variacions)
                        {{$variacions->nombre}}
                        @endforeach
                    <td>
                </tbody>
            </table>
        </div>
        
        <div class="flex justify-center">
            <x-carrito-button :producto="$producto" />
        </div>
    </div>
</div>


@endsection