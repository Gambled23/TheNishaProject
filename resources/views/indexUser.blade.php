@extends ('layouts.main')
@section('body')

<h1>Bienvenid@ al centro de cuwuentas de Nisha</h1>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500">
        <tbody>
            <tr class="bg-white border-b">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                <i class="fa-solid fa-paw fa-xl pr-10" style="color: #3730a3;"></i>
                    Nombre de la cuenta:
                </th>
                <td class="px-6 py-4">
                    {{ Auth::user()->name }}
                </td>
            </tr>
            <tr class="border-b bg-gray-50 ">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    <i class="fa-solid fa-paw fa-xl pr-10" style="color: #312e81;"></i>
                    Correo electrónico:
                    <td class="px-6 py-4">
                        {{ Auth::user()->email }}
                    </td>
                </th>
            </tr>
            <tr class="bg-white border-b ">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    <i class="fa-solid fa-paw fa-xl pr-10" style="color: #3730a3;"></i>
                    Datos de facturación:
                </th>
                <td class="px-6 py-4">
                    placeholder
                </td>
            </tr>
            <tr class="border-b bg-gray-50 ">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    <i class="fa-solid fa-paw fa-xl pr-10" style="color: #312e81;"></i>
                    placeholder:
                    <td class="px-6 py-4">
                        placeholder
                    </td>
                </th>
            </tr>
        </tbody>
    </table>
</div>

<div class="flex mt-4">
    <div class="ml-auto mr-12">
        <form method="post" action="{{ route('logout') }}">
            @csrf
            <button class="bg-gray-500 text-white rounded-lg px-6 hover:bg-gray-600 transition ease-in-out delay-50" onclick="">Cerrar sesión</button>
        </form>
    </div>
    <?php $user = Auth::user(); ?>
<form action="{{route('user.destroy', $user)}}" method="POST">
@csrf
@method('DELETE')
<button class="bg-red-600 text-white rounded-lg px-6 hover:bg-red-700 transition ease-in-out delay-50" onclick="" type="submit">Eliminar cuenta</button>
</form>
    
</div>



@endsection