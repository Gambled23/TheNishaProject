@extends ('layouts.main')
@section('body')


<div class="flex"> <!-- Div de parte superior -->
    <div class="mx-32 my-6 w-4/5 "> <!-- Div imagen izquierda -->
        <x-photo-carrousel :producto="$producto"/>
    </div>
    <div class="px-24 mx-8 py-4 my-4 bg-violet-50 rounded-lg shadow-md"> <!-- Div información derecha -->
        <h1 class=" text-4xl font-bold">{{ strtoupper($producto->nombre) }}</h1>
        <h2 class="my-2">${{ $producto->precio }}</h2>
        <p class="my-1">{{ $producto->descripcion }}</p>
        <div class="flex justify-center">
            <x-carrito-button/>
        </div>
    </div>
</div>

@endsection