@extends ('layouts.admin')
@section('body')
<main class="md:w-[calc(100%-256px)] md:ml-64 bg-gray-50 min-h-screen transition-all main">


<?php
$pagina = "Productos"
?>

<x-admin.upper-bar :$pagina/>


<div class="p-6">
<form method="POST" action="{{ route('admin.producto.store') }}" enctype="multipart/form-data">
    <div class="w-full">
        <div class="flex flex-row justify-center"> <!-- Div de parte superior -->

            @csrf
            <div class="px-4 py-4 my-4 bg-violet-50 rounded-lg shadow-md flex flex-col md:flex-row mx-auto"> <!-- Div información derecha -->

                <div class="w-full md:w-1/2 md:pr-4">
                    <label class="h-full shadow appearance-none border rounded w-full py-4 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-white flex justify-center items-center cursor-pointer">
                        <input required type="file" class="hidden" name="image[]" id="image" onchange="updateFileName(this)" multiple>
                        @error('image')
                        <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>{{ $message }}
                        </div>
                        @enderror
                        <span id="fileName">Subir Imagen</span>
                    </label>

                    <script>
                        function updateFileName(input) {
                            var fileNames = Array.from(input.files).map(file => file.name).join(', ');
                            document.getElementById('fileName').textContent = fileNames;
                        }
                    </script>
                </div>

                <div class="w-full md:w-1/2">

                    <h1 class="text-4xl font-bold">
                        <input required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-2" type="text" name="nombre" id="nombre" placeholder="Nombre" value="{{old('nombre')}}">
                        @error('nombre')
                        <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>{{ $message }}
                        </div>
                        @enderror
                    </h1>

                    <h2 class="my-2">
                        <input required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-2" type="text" name="precio" id="precio" placeholder="$" value="{{old('precio')}}">
                        @error('precio')
                        <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>{{ $message }}
                        </div>
                        @enderror
                    </h2>

                    <h3>
                        <input required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-2" type="text" name="disponibles" id="disponibles" placeholder="Stock" value="{{old('disponibles')}}">
                        @error('disponibles')
                        <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>{{ $message }}
                        </div>
                        @enderror
                    </h3>

                    <p class="my-1">
                        <input required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-2" type="text" name="descripcion" id="descripcion" placeholder="Descripcion" value="{{old('descripcion')}}">
                        @error('descripcion')
                    <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
                        <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>{{ $message }}
                    </div>
                    @enderror
                    </p>
                    <br>
                    <div class="form-group">
                        <label class="text-gray-600" for="variacions">Variaciones</label>
                        
                        @include('Producto.partials.variations')

                        @if($errors->has('variacions'))
                            <div class="invalid-feedback">
                                {{ $errors->first('variacions')->withInput(); }}
                            </div>
                        @endif
                    </div>
                    <br>
                    <div class="mb-4">
                        <label class="text-gray-600">Tags</label>
                        <div class="grid grid-cols-2 gap-4">
                            @foreach ($tags as $id => $tags)
                                <div class="flex items-center">
                                    <input type="checkbox" id="tags" name="tags[]"
                                        value="{{ $id }}" class="mr-2 rounded p-2">
                                    <label for="{{ $id }}">{{ $tags }}</label>
                                </div>
                            @endforeach
                            @error('tags')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <div class="flex justify-center items-center mt-1">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
            Crear producto
        </button>
    </div>
</form>

</main>

<style>
    @media (min-width: 768px) {
        .px-4 {
            padding-left: 2rem;
            padding-right: 2rem;
        }
    }
</style>

@endsection