@extends ('layouts.main')
@section('body')

    <main class="my-8">
        <div class="container px-6 mx-auto">
            <div class="flex justify-center my-6">
                <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
                    @if(!Cart::isEmpty())
                        @if ($message = Session::get('success'))
                            <div class="p-4 mb-3 bg-blue-400 rounded">
                                <p class="text-white">{{ $message }}</p>
                            </div>
                        @endif
                        <h3 class="text-3xl font-bold">Carrito</h3>
                        <div class="flex-1">
                            <table class="w-full text-sm lg:text-base" cellspacing="0">
                                <thead>
                                    <tr class="h-12 uppercase">
                                        <th class="hidden md:table-cell"></th>
                                        <th class="text-left">Nombre</th>
                                        <th class="pl-5 text-left lg:text-right lg:pl-0">
                                            <span class="lg:hidden" title="Quantity">Cantidad</span>
                                            <span class="hidden lg:inline">Cantidad</span>
                                        </th>
                                        <th class="hidden text-right md:table-cell"> Precio</th>
                                        <th class="hidden text-right md:table-cell"> Remover </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cartItems as $item)
                                        <tr>
                                            <td class="hidden pb-4 md:table-cell" style="width:230px;">
                                                <a href="#">
                                                    <img src='{{ URL::to("images/{$item->name}.jpg") }}' alt="{{ $item->name }}">
                                                </a>
                                            </td>
                                            <td>
                                                <a href="#">
                                                    <p class="mb-2 text-gray-900 font-bold">{{ $item->name }}</p>
                                                </a>
                                            </td>
                                            <td class="justify-center mt-6 md:justify-end md:flex">
                                                <div class="h-10 w-28">
                                                    <div class="relative flex flex-row w-full h-8">
                                                        <form action="{{ route('cart.update') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $item->id}}" class="" >
                                                            <input type="number" name="quantity" value="{{ $item->quantity }}" 
                                                            class="w-full text-center h-10 text-gray-800 outline-none rounded border border-gray-600 py-3" />
                                                            <button class="w-full px-4 mt-1 py-1.5 text-sm rounded shadow text-violet-100 bg-gray-800">Actualizar</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="hidden text-right md:table-cell">
                                                <span class="text-sm font-medium lg:text-base">
                                                    ${{ $item->price }}
                                                </span>
                                            </td>
                                            <td class="hidden text-right md:table-cell">
                                                <form action="{{ route('cart.remove') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" value="{{ $item->id }}" name="id">
                                                    <button class="px-3 py-1 text-white bg-gray-800 shadow rounded-full">x</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="flex justify-between items-center my-5">
                                <div class="font-semibold text-2xl">Total: ${{ Cart::getTotal() }}</div>
                                    <div>
                                        <form action="{{ route('cart.clear') }}" method="POST">
                                            @csrf
                                            <button class="px-6 py-2 text-sm  rounded shadow text-red-100 bg-gray-800">Limpiar carrito</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-between items-center my-5">
                                <div class="font-semibold text-2xl">
                                    <a href="tienda">
                                        <button class="px-6 py-2 text-sm  rounded shadow text-red-100 bg-gray-800">Seguir navegando</button>
                                    </a>
                                </div>
                                    <div>
                                    <a href="#"> <!-- DEPOSITE AKI VALIDACIONES PARA Q SE TENGA Q LOGEAR -->
                                            <button class="px-6 py-2 text-sm  rounded shadow text-red-100 bg-gray-800">Pagar</button>
                                        </a>
                                    </div>
                            </div>
                        </div>
                    @else
                    <div class="flex justify-between items-center my-5">
                                <div class="font-semibold text-2xl">
                                    <h4>Aun no has agregado nada al carrito :(</h4>
                                    <br><br>
                                    <a href="tienda">
                                        <button class="px-6 py-2 text-sm  rounded shadow text-red-100 bg-gray-800">Comprar ahora</button>
                                    </a>
                                </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </main>

    @endsection