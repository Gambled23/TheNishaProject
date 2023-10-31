@extends ('layouts.main')
@section('body')
<x-search-bar class="w-4"/>

<h1 class="text-2xl font-medium text-gray-900 my-3 mx-6" inline>Todos los productos</h1>

@foreach ($products as $product)
    <div>
        <h2>{{ $product->name }}</h2>
        <p>{{ $product->description }}</p>
        <p>{{ $product->price }}</p>
    </div>
@endforeach

@endsection