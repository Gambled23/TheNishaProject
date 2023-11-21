<div class="group">

    <form action="{{ route('user.cart.store') }}" method="POST" enctype="multipart/form-data" class="flex justify-end">
                        @csrf
                        <input type="hidden" value="{{ $producto->id }}" name="id">
                        <input type="hidden" value="{{ $producto->nombre }}" name="name">
                        <input type="hidden" value="{{ $producto->precio }}" name="price">
                        <input type="hidden" value="1" name="quantity">
                        <button class="w-8 h-8 bg-indigo-600 hover:bg-indigo-800 text-xs font-bold uppercase rounded-full transition-width duration-100 hover:w-40 hover:h-8 relative">
                        <i class="fa-solid fa-cart-shopping fa-xl absolute inset-0 m-auto py-4 group-hover:opacity-0" style="color: #FFFFFF;"></i>
                        <span class="py-2 opacity-0 group-hover:opacity-100 transition-opacity duration-100 text-white absolute inset-0 m-auto">Añadir al carrito</span>
                    </button>
        </form>
</div>