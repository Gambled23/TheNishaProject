@extends ('layouts.main')
@section('body')

<h1>Bienvenid@ {{ Auth::user()->name }}</h1>

<button onclick="">Eliminar cuenta</button>
@endsection