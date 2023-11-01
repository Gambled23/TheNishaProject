@extends ('layouts.main')
@section('body')
<x-search-bar class="w-4"/>

<h1 class="text-2xl font-medium text-gray-900 my-3 mx-6" inline>Todos los productos</h1>

<div class="grid grid-cols-4 gap-y-6">
@foreach ($productos as $producto)
    <x-product-card :producto="$producto" class="w-1/3"/>
@endforeach
</div>

@endsection