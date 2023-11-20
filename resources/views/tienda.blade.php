@extends ('layouts.main')
@section('body')
<div class="flex items-center justify-center py-4 md:py-8 flex-wrap">
        <h1 class="text-blue-700 hover:text-white border border-blue-600 bg-white hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:bg-gray-900 dark:focus:ring-blue-800">Todos los productos</h1>
        <x-search-bar/>
</div>

<div class="grid grid-cols-2 md:grid-cols-3 gap-4">
    @foreach ($productos as $producto)
        <x-product-card :producto="$producto" class="w-full md:w-1/3"/>
    @endforeach
</div>


@endsection