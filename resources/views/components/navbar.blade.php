<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="/">
                            <x-application-mark class="block h-9 w-auto" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                        {{ __('Inicio') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('tienda') }}" :active="request()->routeIs('tienda')">
                        {{ __('Tienda') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('productos.index')">
                        {{ __('Categorías') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                        {{ __('Contacto') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                        {{ __('About Nisha') }}
                    </x-nav-link>
                </div>
            </div>

            

            <!--Iconos derecha-->
            
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                
                    @if ( Auth::user() )
                    <a href="{{ route('account') }}">
                        <i class="fa-solid fa-user fa-xl pr-10" style="color: #4338ca;"></i>
                        <a href="{{ route('checkout') }}">
                            <i class="fa-solid fa-cart-shopping fa-xl" style="color: #4338ca;"></i>
                        </a>
                    @else
                        <a href="{{ route('login') }}">
                        Iniciar sesión
                        <!--<i class="fa-solid fa-paw fa-bounce fa-xl pr-10 block-h-9 w-auto" style="color: #4338ca;"></i>-->
                    @endif  
                </a>
            </div> 
        </div>
    </div>
</nav>
