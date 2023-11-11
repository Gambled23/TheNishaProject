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

            <!-- Mobile menu button -->
            <div class="flex sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out" aria-label="Main menu" aria-expanded="false">
                    <svg :class="{'hidden': open, 'block': ! open }" class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <svg :class="{'hidden': ! open, 'block': open }" class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
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

        <!-- Mobile menu -->
        <div :class="{'block': open, 'hidden': ! open}" class="md:hidden">
            <div class="pt-2 pb-3 space-y-1">
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
    </div>
</nav>
