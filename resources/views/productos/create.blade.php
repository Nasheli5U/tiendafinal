@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8 text-gray-100">Agregar Nuevo Producto</h1>
        <form action="{{ route('productos.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="nombre" class="block text-sm font-medium text-gray-100">Nombre del Producto</label>
                <input type="text" name="nombre" id="nombre" class="mt-1 p-2 border rounded-md w-full" required>
            </div>
            <div class="mb-4">
                <label for="descripcion" class="block text-sm font-medium text-gray-100">Descripción del Producto</label>
                <textarea name="descripcion" id="descripcion" class="mt-1 p-2 border rounded-md w-full" required></textarea>
            </div>
            <div class="mb-4">
                <label for="precio" class="block text-sm font-medium text-gray-100">Precio del Producto</label>
                <input type="number" name="precio" id="precio" class="mt-1 p-2 border rounded-md w-full" required>
            </div>
            <div class="mb-4">
                <label for="imagen_url" class="block text-sm font-medium text-gray-100">URL de la Imagen del Producto</label>
                <input type="url" name="imagen_url" id="imagen_url" class="mt-1 p-2 border rounded-md w-full" required>
            </div>
            <a href="{{ route('admin') }}" class="bg-red-300 hover:bg-red-300 text-gray-800 font-semibold py-2 px-4 rounded-lg mr-2">Cancelar</a>

            <button type="submit" class="bg-green-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Guardar Producto</button>
        </form>
    </div>
@endsection
