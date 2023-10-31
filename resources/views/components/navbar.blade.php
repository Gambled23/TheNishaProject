<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <!-- Logo -->
                <a href="{{ route('dashboard') }}">
                        <x-application-mark class="block h-9 w-auto" />
                </a>


                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Inicio') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('cliente.index')">
                        {{ __('Tienda') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('productos.index')">
                        {{ __('Categorías') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Contacto') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('About Nisha') }}
                    </x-nav-link>
                </div>


            </div>

            <!-- Iconos derecha (soy incapaz de hacer este puto logo más pequeño)-->
            
            <div class="">
                <a href="{{ route('dashboard') }}">
                        <x-carrito-logo class="block h-9 w-auto" />
                </a>
                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;</p>
            </div>
        </div>
    </div>
</nav>
