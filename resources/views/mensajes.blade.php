@extends('layouts.app')

@section('content')

<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-4 py-2">ID</th>
                <th scope="col" class="px-4 py-2">Nombre</th>
                <th scope="col" class="px-4 py-2">Correo electrónico</th>
                <th scope="col" class="px-4 py-2">Teléfono</th>
                <th scope="col" class="px-4 py-2">Mensaje</th>
                <th scope="col" class="px-4 py-2"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($mensajes as $mensaje)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">{{ $mensaje->id }}</td>
                <td class="px-6 py-4">{{ $mensaje->name }}</td>
                <td class="px-6 py-4">{{ $mensaje->email }}</td>
                <td class="px-6 py-4">{{ $mensaje->tel }}</td>
                <td class="px-6 py-4">{{ $mensaje->message }}</td>
                <td class="px-6 py-4">
                    <!-- Botones de edición y eliminación para cada mensaje -->
                    <!-- Puedes agregar aquí los botones de edición y eliminación si lo deseas -->
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<br>
<a href="{{ route('admin') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-4 rounded-lg mr-2">Regresar</a>

@endsection
