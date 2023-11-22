@extends ('layouts.main')
@section('body')

<div class="flex flex-wrap pl-4">
    <!-- Sidebar -->
    <div class="px-6 py-4 w-full md:w-1/6 bg-slate-50 shadow border border-gray-100 rounded-lg md:flex md:flex-col md:justify-start md:items-start">
        <h2 class="text-2xl font-bold mb-2"><a href="{{ route('tienda') }}">Categorias</a></h2>
        <ul>
            @foreach ($categorias as $categoria)
                <li class="mb-1">
                    <a href="{{ route('productos.categoria', $categoria->id) }}" class="text-violet-800 hover:text-violet-950">{{ $categoria->nombre }}</a>
                </li>
            @endforeach
        </ul>
    </div>

    <!-- Main content -->
    <div class="w-full md:w-5/6 p-4">
        <div class="flex items-center justify-center py-4 md:py-8 flex-wrap">
            <a href="{{ route('tienda') }}"><h1 class="text-blue-700 hover:text-white border border-blue-600 bg-white hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3">
                @if (isset($tag))
                    {{ $tag }}
                @else
                    Todos los productos
                @endif</h1></a>
            <x-search-bar/>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            @foreach ($productos as $producto)
                <x-product-card :producto="$producto" class="w-full md:w-1/3"/>
            @endforeach
        </div>
    </div>
</div>

<style>
    @media (min-width: 768px) {
        .flex-wrap {
            flex-direction: row;
        }
        .w-full.md\:w-1\/6 {
            width: 16.666667%;
        }
        .w-full.md\:w-5\/6 {
            width: 83.333333%;
        }
    }
</style>

@endsection