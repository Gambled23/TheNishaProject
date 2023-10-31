@extends ('layouts.main')
@section('body')

<h1>Bienvenid@ al centro de cuwuentas de Nisha</h1>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500">
        <tbody>
            <tr class="bg-white border-b">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                <i class="fa-solid fa-paw fa-xl pr-10" style="color: #000000;"></i>
                    Nombre de la cuenta:
                </th>
                <td class="px-6 py-4">
                    {{ Auth::user()->name }}
                </td>
            </tr>
            <tr class="border-b bg-gray-50 ">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    <i class="fa-solid fa-paw fa-xl pr-10" style="color: #000000;"></i>
                    Correo electrónico:
                    <td class="px-6 py-4">
                        {{ Auth::user()->email }}
                    </td>
                </th>
            </tr>
            <tr class="bg-white border-b ">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    <i class="fa-solid fa-paw fa-xl pr-10" style="color: #000000;"></i>
                    Datos de facturación:
                </th>
                <td class="px-6 py-4">
                    placeholder
                </td>
            </tr>
        </tbody>
    </table>
</div>

<x-button onclick="">Eliminar cuenta</x-button>
@endsection