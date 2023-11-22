@extends ('layouts.admin')
@section('body')
<main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-50 min-h-screen transition-all main">

<form method="POST" action="{{ route('admin.producto.deleteImages', [$producto->id]) }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" enctype="multipart/form-data">
    @csrf
    @method('DELETE')

    <div class="grid grid-cols-3 gap-4">
        @for ($i = 0; $i < $producto->imagenesTotales; $i++)
            <div class="relative">
                <img src='{{ URL::to("/images/{$producto->nombre}_{$i}.jpg") }}' alt="{{ $producto->nombre }}">
                <div class="absolute top-0 right-0">
                    <input type="checkbox" name="images[]" value="{{ $i }}">
                </div>
            </div>
        @endfor
    </div>

    <button type="submit" class="mt-4 px-4 py-2 bg-red-500 text-white rounded">Eliminar imagenes seleccionadas</button>
</form>

</main>
@endsection