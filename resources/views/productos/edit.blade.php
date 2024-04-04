@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8">Editar Producto</h1>
        <form action="{{ route('productos.update', $producto->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre del Producto</label>
                <input type="text" name="nombre" id="nombre" class="mt-1 p-2 border rounded-md w-full" value="{{ $producto->nombre }}" required>
            </div>
            <div class="mb-4">
                <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción del Producto</label>
                <textarea name="descripcion" id="descripcion" class="mt-1 p-2 border rounded-md w-full" required>{{ $producto->descripcion }}</textarea>
            </div>
            <div class="mb-4">
                <label for="precio" class="block text-sm font-medium text-gray-700">Precio del Producto</label>
                <input type="number" name="precio" id="precio" class="mt-1 p-2 border rounded-md w-full" value="{{ $producto->precio }}" required>
            </div>
            <div class="mb-4">
                <label for="imagen_url" class="block text-sm font-medium text-gray-700">URL de la Imagen del Producto</label>
                <input type="url" name="imagen_url" id="imagen_url" class="mt-1 p-2 border rounded-md w-full" >
            </div>
            <div class="mb-4">
                <img id="imagen_preview" src="{{ $producto->imagen }}" class="mt-1 p-2 border rounded-md max-w-full h-auto" alt="Vista Previa">
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Guardar Producto</button>
        </form>
    </div>
@endsection
