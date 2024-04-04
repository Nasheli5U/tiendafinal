@extends('layouts.app')
@vite('resources/css/app.css')



@section('content')
<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">Dirección</th>
                <th scope="col" class="px-6 py-3">Referencia</th>
                <th scope="col" class="px-6 py-3">RUC</th>
                <th scope="col" class="px-6 py-3">Estado</th>
                <th scope="col" class="px-6 py-3">N° de Productos</th>
                <th scope="col" class="px-6 py-3">Productos</th>
                <th scope="col" class="px-6 py-3">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pedidos as $pedido)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $pedido->informacion_envio->direccion }}
                </td>
                <td class="px-6 py-4">{{ $pedido->informacion_envio->referencias }}</td>
                <td class="px-6 py-4">{{ $pedido->informacion_envio->ruc }}</td>
                <td class="px-6 py-4">{{ $pedido->estado }}</td>
                <td class="px-6 py-4">{{ $pedido->productos()->count() }}</td>
                <td class="px-6 py-4">
                    <ul>
                        @foreach($pedido->productos as $producto)
                        <li>{{ $producto->nombre }}</li>
                        @endforeach
                    </ul>
                </td>                  
                
                <td class="px-6 py-4">
                    <form action="{{ route('pedido.editar_estado', $pedido->id) }}" method="GET">
                        @csrf
                        <button type="submit" class="text-green-600 hover:text-green-900">Editar</button>
                    </form>
                    <!-- Botón de eliminación del pedido -->


                    <form action="{{ route('pedido.eliminar', $pedido->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-900">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
