@extends ('layouts.admin')
@section('body')
<main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-50 min-h-screen transition-all main">


<?php
$pagina = "Informacion de Tag"
?>

<x-admin.upper-bar :$pagina/>

<body>
<h1 class="text-center mb-10 text-2xl font-mono"><br>Tag {{$tag->id}}</h1>
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full text-left text-sm font-light">
                        <thead class="border-b font-medium dark:border-neutral-500">
                            <tr>
                                <th scope="col" class="px-6 py-4">Nombre</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                                
                                <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $tag->nombre }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</main>
@endsection