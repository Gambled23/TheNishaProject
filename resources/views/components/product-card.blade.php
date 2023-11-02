<a href="{{ route('producto.show', $producto)}}">
<div class="flex flex-col bg-violet-50 border border-gray-200 rounded-lg shadow-sm overflow-hidden mx-auto max-w-sm">
    <div class="flex-shrink-0">
        <img class="h-48 w-full object-cover" src='{{ URL::to("/assets/{$producto->nombre}0.jpg") }}' alt="{{ $producto->nombre }}">
    </div>
    <div class="p-6">
        <h2 class="text-2xl font-semibold text-gray-900">{{ $producto->nombre }}</h2>  
        <p class="mt-2 text-sm text-gray-500">{{ \Illuminate\Support\Str::limit($producto->descripcion, 40) }}</p>
        <div class="mt-3">
            <span class="text-sm font-semibold text-gray-700">${{ $producto->precio }}</span>
        </div>
        <div class="mt-6 flex justify-center">
            <form action="{{ route('home') }}">
                <x-carrito-button />
            </form>
        </div>
    </div>
</div>
</a>