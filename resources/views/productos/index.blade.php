@vite('resources/css/app.css')


@extends('layouts.app')

@section('content')

<main class="container mx-auto px-4 py-8">
<h1 class="text-3xl font-bold mb-8 text-white">Administrar Productos</h1>
    <!-- Botón para agregar nuevo producto -->
    <a href="{{ route('productos.create') }}" class="btn btn-primary mb-3">Agregar Nuevo Producto</a>
    <br>
    <!-- Tabla para mostrar los productos existentes -->
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-4 py-2">ID</th>
                    <th scope="col" class="px-4 py-2">Nombre</th>
                    <th scope="col" class="px-4 py-2">Precio</th>
                    <th scope="col" class="px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4">{{ $producto->id }}</td>
                    <td class="px-6 py-4">{{ $producto->nombre }}</td>
                    <td class="px-6 py-4">{{ $producto->precio }}</td>
                    <td class="px-6 py-4">
                        <!-- Botones de edición y eliminación para cada producto -->
                        <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-primary mr-2">Editar</a>
                        <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
@endsection
