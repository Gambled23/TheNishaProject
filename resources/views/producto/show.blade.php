@extends ('layouts.main')
@section('body')


<div class="flex"> <!-- Div de parte superior -->
    <div class="mx-32 my-6 w-4/5"> <!-- Div imagen izquierda -->
        <img src="{{ $producto->imagen }}" alt="Imagen del producto" width="300" height="300">
    </div>
    <div class="px-24 mx-8 py-4 my-4 bg-indigo-50 rounded-lg shadow-md"> <!-- Div información derecha -->
        <h1 class=" text-4xl font-bold">{{ strtoupper($producto->nombre) }}</h1>
        <h2 class="my-2">${{ $producto->precio }}</h2>
        <p class="my-1">{{ $producto->descripcion }}</p>
        <div class=" flex aling-center justify-center">
            <x-carrito-button/>
        </div>
    </div>
</div>

@endsection