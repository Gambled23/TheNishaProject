@extends ('layouts.main')
@section('body')

<div class="grid grid-cols-1 md:grid-cols-3">
    <h1 class="text-2xl font-medium text-gray-900 pt-6 mx-6" inline>Todos los productos</h1>
    <x-search-bar/>
</div>

<div class="grid grid-cols-1 md:grid-cols-4 gap-y-6 gap-x-36 mx-5">
@foreach ($productos as $producto)
    <x-product-card :producto="$producto" class="w-full md:w-1/3"/>
@endforeach
</div>

@endsection