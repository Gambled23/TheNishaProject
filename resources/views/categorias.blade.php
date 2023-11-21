@extends ('layouts.main')
@section('body')





@foreach($categorias as $categoria)
    <p>{{ $categoria->nombre }}</p>
@endforeach

@endsection