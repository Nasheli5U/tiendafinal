@extends('layouts.app')
@vite('resources/css/app.css')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <div class="py-8">
        <div class="sm:px-0">
            <h2 class="text-2xl font-semibold leading-tight text-gray-900">Editar Estado del Pedido</h2>
            <div class="mt-5 shadow-md bg-white overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <form action="{{ route('pedido.actualizar_estado', $pedido->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-4">
                                <label for="estado" class="block text-sm font-medium text-gray-700">Estado</label>
                                <select id="estado" name="estado" autocomplete="estado" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    <option value="preparado" {{ $pedido->estado === 'preparado' ? 'selected' : '' }}>Preparado</option>
                                    <option value="en_camino" {{ $pedido->estado === 'en_camino' ? 'selected' : '' }}>En Camino</option>
                                    <option value="entregado" {{ $pedido->estado === 'entregado' ? 'selected' : '' }}>Entregado</option>
                                </select>
                            </div>
                        </div>

                        <div class="flex justify-end mt-4">
                            <a href="{{ route('pedidos') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-4 rounded-lg mr-2">Cancelar</a>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
