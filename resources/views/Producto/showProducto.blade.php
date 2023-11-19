@extends ('layouts.main')
@section('body')


<div class="flex flex-col md:flex-row"> <!-- Div de parte superior -->
    <div class="mx-4 md:mx-32 my-6 w-full md:w-4/5 h-16"> <!-- Div imagen izquierda -->
        <x-photo-carrousel :producto="$producto" />
    </div>
    <div class="px-4 md:px-24 mx-4 md:mx-8 py-4 my-4 bg-violet-50 rounded-lg shadow-md"> <!-- Div información derecha -->
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