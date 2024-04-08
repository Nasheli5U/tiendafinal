@extends('layouts.app')

@section('content')

<main class="container mx-auto px-4 py-8">
<h1 class="text-3xl font-bold mb-8 text-white">Administrar Productos</h1>
    <!-- Botón para agregar nuevo producto -->
    <a href="{{ route('productos.create') }}" class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-4">Agregar Nuevo Producto</a>
    <!-- Botón para ver todos los pedidos -->
    <a href="{{ route('pedidos') }}" class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-4">Ver Pedidos</a>
    <!-- Botón para ver los mensajes -->
    <a href="{{ route('mensajes') }}" class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-4">Ver Mensajes</a>


    <!-- Tabla para mostrar los productos existentes -->
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-4 py-2">ID</th>
                    <th scope="col" class="px-4 py-2">Nombre</th>
                    <th scope="col" class="px-4 py-2">Imagen</th> <!-- Nueva columna para la imagen -->
                    <th scope="col" class="px-4 py-2">Descripcion</th> <!-- Nueva columna para la imagen -->

                    <th scope="col" class="px-4 py-2">Precio</th>
                    <th scope="col" class="px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4">{{ $producto->id }}</td>
                    <td class="px-6 py-4">{{ $producto->nombre }}</td>
                    <td class="px-6 py-4">
                        @if($producto->imagen)
                        <img src="{{ asset($producto->imagen) }}" alt="Imagen del producto" style="max-width: 150px; max-height: 150px;">
                        @else
                            Sin imagen
                        @endif
                    </td>
                    <td class="px-6 py-4">{{ $producto->descripcion }}</td>

                    <td class="px-6 py-4">{{ $producto->precio }}</td>
                    <td class="px-6 py-4">
                        <!-- Botones de edición y eliminación para cada producto -->
                        <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-primary mr-2 text-green-600 hover:text-green-900">Editar</a>
                        <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger text-red-600 hover:text-red-900">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
@endsection
