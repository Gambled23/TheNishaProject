<section class="bg-white py-8">
    <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">
        <div class="w-full md:w-1/3 xl:w-1/4 p-6 flex flex-col">
            <a href="{{ route('producto.show', $producto)}}">
                <img class="hover:grow hover:shadow-lg h-48 w-full object-cover" src='{{ URL::to("/images/{$producto->nombre}_0.jpg") }}' alt="{{ $producto->nombre }}">
                <div class="pt-3 flex items-center justify-between">
                    <p class="font-semibold text-gray-900">{{ $producto->nombre }}</p>
                </div>
                <p class="pt-1 font-semibold text-gray-900">${{ $producto->precio }}</p>
                <div class="mt-6 flex justify-center">
                    <x-carrito-button :producto="$producto"/>
                </div>
            </a>
        </div>
    </div>
</section>
