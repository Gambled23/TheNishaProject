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
                                                            <button class="w-full px-4 mt-1 mb-3 py-1.5 text-sm rounded shadow text-violet-100 bg-gray-800">Actualizar</button>
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
                                    <form action="{{ route('make.payment') }}">
                                            @csrf
                                            <!-- DEPOSITE AKI VALIDACIONES PARA Q SE TENGA Q LOGEAR -->
                                            <!--Han sido depositadas en las rutas 🫡-->
                                            Punto de entrega:
                                            <select name="entrega" id="entrega">
                                                <option value="a">CUCEI</option>
                                                <option value="b">CUCEA</option>
                                                <option value="c">Linea 3</option>
                                            </select>
                                            <input type="hidden" name="precioTotal" value="{{ Cart::getTotal() }}">
                                            <button type="submit" class="text-slate-50 bg-gray-800 hover:bg-gray-800/590 focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 mb-2">
                                            <svg class="mr-2 -ml-1 w-4 h-4" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="paypal" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="#fee2e2" d="M111.4 295.9c-3.5 19.2-17.4 108.7-21.5 134-.3 1.8-1 2.5-3 2.5H12.3c-7.6 0-13.1-6.6-12.1-13.9L58.8 46.6c1.5-9.6 10.1-16.9 20-16.9 152.3 0 165.1-3.7 204 11.4 60.1 23.3 65.6 79.5 44 140.3-21.5 62.6-72.5 89.5-140.1 90.3-43.4 .7-69.5-7-75.3 24.2zM357.1 152c-1.8-1.3-2.5-1.8-3 1.3-2 11.4-5.1 22.5-8.8 33.6-39.9 113.8-150.5 103.9-204.5 103.9-6.1 0-10.1 3.3-10.9 9.4-22.6 140.4-27.1 169.7-27.1 169.7-1 7.1 3.5 12.9 10.6 12.9h63.5c8.6 0 15.7-6.3 17.4-14.9 .7-5.4-1.1 6.1 14.4-91.3 4.6-22 14.3-19.7 29.3-19.7 71 0 126.4-28.8 142.9-112.3 6.5-34.8 4.6-71.4-23.8-92.6z"></path></svg>
                                            Pagar con PayPal
                                            </button>
                                </form>
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