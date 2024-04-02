@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8">Agregar Nuevo Producto</h1>
        <form action="{{ route('productos.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre del Producto</label>
                <input type="text" name="nombre" id="nombre" class="mt-1 p-2 border rounded-md w-full" required>
            </div>
            <div class="mb-4">
                <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción del Producto</label>
                <textarea name="descripcion" id="descripcion" class="mt-1 p-2 border rounded-md w-full" required></textarea>
            </div>
            <div class="mb-4">
                <label for="precio" class="block text-sm font-medium text-gray-700">Precio del Producto</label>
                <input type="number" name="precio" id="precio" class="mt-1 p-2 border rounded-md w-full" required>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Guardar Producto</button>
        </form>
    </div>
@endsection
