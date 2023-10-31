@extends ('layouts.main')
@section('body')

<h1 class="text-2xl font-medium text-gray-900 my-2" inline>The Nisha proyect!</h1>

<div class="grid grid-rows-3 gap-4 items-center ">
    <div class="grid grid-cols-2 gap-4">
        <div>Producto 1
            <img class="h-6 w-1/2" src="https://i.pinimg.com/564x/c4/d7/b8/c4d7b8e922bc57d5b8bbace635838bd9.jpg" alt="">
        </div>
        <div>Producto 2
            <img class="h-6 w-1/2" src="https://i.pinimg.com/564x/c4/d7/b8/c4d7b8e922bc57d5b8bbace635838bd9.jpg" alt="">
        </div>
    </div>
    <div class="flex items-center justify-center">
        <div>Producto 3
            <img class="w-full" src="https://i.pinimg.com/564x/c4/d7/b8/c4d7b8e922bc57d5b8bbace635838bd9.jpg" alt="">
        </div>
    </div>
    <div class="grid grid-cols-2 gap-4">
        <div>Producto 4
            <img class="h-6 w-1/2" src="https://i.pinimg.com/564x/c4/d7/b8/c4d7b8e922bc57d5b8bbace635838bd9.jpg" alt="">
        </div>
        <div>Producto 5
            <img class="h-6 w-1/2" src="https://i.pinimg.com/564x/c4/d7/b8/c4d7b8e922bc57d5b8bbace635838bd9.jpg" alt="">
        </div>
    </div>
</div>

@endsection