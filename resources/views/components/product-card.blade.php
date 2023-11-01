<a href="">
<div class="flex flex-col bg-white border border-gray-200 rounded-lg shadow-sm overflow-hidden mx-auto max-w-sm">
    <div class="flex-shrink-0">
        <img class="h-48 w-full object-cover" src="{{ $producto->image_url }}" alt="{{ $producto->nombre }}">
        
    </div>
    <div class="p-6">
        <h2 class="text-2xl font-semibold text-gray-900">{{ $producto->nombre }}</h2>
        
        <p class="mt-2 text-sm text-gray-500">{{ $producto->descripcion }}</p>
        <div class="mt-3">
            <span class="text-sm font-semibold text-gray-700">${{ $producto->precio }}</span>
        </div>
        <div class="mt-6 flex justify-center">
            <form action="{{ route('home') }}">
                <button class="w-8 h-8 bg-indigo-600 hover:bg-indigo-800 text-xs font-bold uppercase rounded-full transition-width duration-100 hover:w-40 hover:h-8">
                    <i class="fa-solid fa-cart-shopping fa-xl" style="color: #FFFFFF;"></i>
                    <span class="opacity-0 hover:opacity-100 transition-opacity duration-100 text-white">Añadir al carrito</span>
                </button>
            </form>
        </div>
    </div>
</div>
</a>