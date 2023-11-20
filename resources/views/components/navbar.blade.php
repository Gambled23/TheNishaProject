<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex justify-center md:justify-start">
                <!-- Logo -->
                <div class="flex items-center">
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
                    <x-nav-link href="{{ route('faq') }}" :active="request()->routeIs('faq')">
                        {{ __('FAQ') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('about') }}" :active="request()->routeIs('about')">
                        {{ __('Sobre nosotros') }}
                    </x-nav-link>
                </div>
            </div>

            <!--Iconos derecha-->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <a href="{{ route('cart.list') }}" class="flex items-center space-x-1">
                        <i class="fa-solid fa-cart-shopping fa-xl" style="color: #4338ca;"></i>
                        <span class="text-gray-700">{{ Cart::getTotalQuantity()}}</span> 
                    </a>
                </div>
            </div>
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                @if ( Auth::user() )

                <a href="{{ route('account') }}">
                    <span class="text-gray-700">{{ Auth::user()->name }}</span> 

                    <i class="fa-solid fa-user fa-xl pr-10" style="color: #4338ca;"></i>
                @else
                    <a href="{{ route('login') }}">
                    Iniciar sesión
                @endif  
                </a>
            </div> 
        </div>
    </div>

    <!-- Mobile Navigation Menu -->
    <div x-data="{ open: false }" class="sm:hidden">
        <!-- Hamburger button -->
        <button @click="open = !open" class="p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 focus:text-white transition duration-150 ease-in-out">
            <svg :class="{'hidden': open, 'block': !open }" class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
            <svg :class="{'hidden': !open, 'block': open }" class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
        <!-- Mobile navigation links -->
        <div :class="{'block': open, 'hidden': !open}" class="px-2 pt-2 pb-3 space-y-1 flex flex-col">
            <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                {{ __('Inicio') }}
            </x-nav-link>
            <x-nav-link href="{{ route('tienda') }}" :active="request()->routeIs('tienda')">
                {{ __('Tienda') }}
            </x-nav-link>
            <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('productos.index')">
                {{ __('Categorías') }}
            </x-nav-link>
            <x-nav-link href="{{ route('faq') }}" :active="request()->routeIs('faq')">
                {{ __('FAQ') }}
            </x-nav-link>
            <x-nav-link href="{{ route('about') }}" :active="request()->routeIs('about')">
                {{ __('Sobre nosotros') }}
            </x-nav-link>
            <x-nav-link href="{{ route('cart.list') }}" :active="request()->routeIs('cart.list')" >
                <span class="text-gray-700">{{ Cart::getTotalQuantity() }} articulos en carrito</span> 
                <i class="fa-solid fa-cart-shopping fa-xl" style="color: #4338ca;"></i>
            </x-nav-link>
            @if ( Auth::user() )
                <x-nav-link href="{{ route('account') }}" :active="request()->routeIs('account')">
                    <span class="text-gray-700">{{ Auth::user()->name }}</span> 
                    <i class="fa-solid fa-user fa-xl pr-10" style="color: #4338ca;"></i>
                </x-nav-link>
            @else
                <x-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">                  
                    <span class="text-gray-700">{{ _('Iniciar sesión')}}</span> 
                    <i class="fa-solid fa-user fa-xl pr-10" style="color: #4338ca;"></i>
                </x-nav-link>
            @endif
        </div>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>