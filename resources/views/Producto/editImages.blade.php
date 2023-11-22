@extends ('layouts.admin')
@section('body')
<head>
    <style>
        img:hover {
            filter: brightness(70%);
        }
        .darken {
            filter: brightness(30%) sepia(1) hue-rotate(-50deg) saturate(5);
        }
        .darken:hover {
            filter: brightness(40%) sepia(1) hue-rotate(-50deg) saturate(5);
        }
    </style>
</head>
<main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-50 min-h-screen transition-all main">

<form method="POST" action="{{ route('admin.producto.deleteImages', [$producto->id]) }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" enctype="multipart/form-data">
    @csrf
    @method('DELETE')

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @for ($i = 0; $i < $producto->imagenesTotales; $i++)
            <label class="relative cursor-pointer">
                <img id="image{{ $i }}" src='{{ URL::to("/images/{$producto->nombre}_{$i}.jpg") }}' alt="{{ $producto->nombre }}" class="rounded">
                <input type="checkbox" name="images[]" value="{{ $i }}" class="absolute top-0 right-0 opacity-0" onchange="toggleDarken('image{{ $i }}')">
            </label>
        @endfor
    </div>
    <button type="submit" class="mt-4 px-4 py-2 bg-red-500 text-white rounded">Eliminar imagenes seleccionadas</button>
</form>

<form method="POST" action="{{ route('admin.producto.uploadImages', [$producto->id]) }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" enctype="multipart/form-data">
    @csrf
    <input type="file" name="images[]" multiple class="mt-4">
    <button type="submit" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded">Subir nuevas imagenes</button>
</form>

</main>

<script>
    function toggleDarken(imageId) {
        var image = document.getElementById(imageId);
        image.classList.toggle('darken');
    }
</script>
@endsection