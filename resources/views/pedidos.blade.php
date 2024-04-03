@extends('layouts.app')
@vite('resources/css/app.css')

@section('content')
<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Dirección
                </th>
                <th scope="col" class="px-6 py-3">
                    Referencia
                </th>
                <th scope="col" class="px-6 py-3">
                    RUC
                </th>
                <th scope="col" class="px-6 py-3">
                    Estado
                </th>
                <th scope="col" class="px-6 py-3">
                    N° de 
                </th>
                <th scope="col" class="px-6 py-3">
                    Productos
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($pedidos as $pedido)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $pedido->informacion_envio->direccion }}
                </td>
                <td class="px-6 py-4">
                    {{ $pedido->informacion_envio->referencias }}
                </td>
                <td class="px-6 py-4">
                    {{ $pedido->informacion_envio->ruc }}
                </td>
                <td class="px-6 py-4">
                    <div class="relative">
                        <button id="dropdownCheckboxButton" data-dropdown-toggle="dropdownDefaultCheckbox" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                            @if($pedido->estado === 'preparado')
                                Preparado
                            @elseif($pedido->estado === 'en_camino')
                                En Camino
                            @elseif($pedido->estado === 'entregado')
                                Entregado
                            @endif
                            <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdownDefaultCheckbox" class="z-10 hidden w-48 bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="p-3 space-y-3 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownCheckboxButton">
                                <li>
                                    <div class="flex items-center">
                                        <input id="checkbox-item-{{ $pedido->id }}-preparado" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" {{ $pedido->estado === 'preparado' ? 'checked' : '' }}>
                                        <label for="checkbox-item-{{ $pedido->id }}-preparado" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Preparado</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex items-center">
                                        <input id="checkbox-item-{{ $pedido->id }}-en-camino" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" {{ $pedido->estado === 'en_camino' ? 'checked' : '' }}>
                                        <label for="checkbox-item-{{ $pedido->id }}-en-camino" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">En Camino</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex items-center">
                                        <input id="checkbox-item-{{ $pedido->id }}-entregado" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" {{ $pedido->estado === 'entregado' ? 'checked' : '' }}>
                                        <label for="checkbox-item-{{ $pedido->id }}-entregado" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Entregado</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4">
                    {{ $pedido->productos()->count() }}
                </td>
                <td class="px-6 py-4">
                    <ul>
                        @foreach($pedido->productos as $producto)
                            <li>{{ $producto->nombre }}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection
