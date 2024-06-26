<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')

    <title>Carrito de Compras</title>
    <!-- Aquí incluye tus estilos y scripts necesarios -->
</head>
<body class="bg-white"> <!-- Establece el fondo blanco por defecto -->
<nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="{{ route('home') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Tienda HEN</span>
        </a>
            <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent" href="{{ route('home') }}">Inicio</a>
                    </li>
                    <li>
                        <a class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent" href="{{ route('almacen') }}">Almacen</a>
                    </li>
                    <li>
                        <a  class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500" href="{{ route('carrito') }}">
                            Carrito
                            @if (session('carrito'))
                                <span class="bg-blue-500 text-white px-2 py-1 rounded-full text-xs">{{ count(session('carrito')) }}</span>
                            @endif
                        </a>        
                    </li>
                    <li>
                        <a class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent" href="{{ route('contacto') }}">Contactanos</a>
                    </li>
                </ul>
            </div>
        </div>
        <h1>Carrito de Compras</h1>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-16 py-3">
                    <span class="sr-only">Image</span>
                </th>
                <th scope="col" class="px-6 py-3">
                    Product
                </th>
                <th scope="col" class="px-6 py-3">
                    Qty
                </th>
                <th scope="col" class="px-6 py-3">
                    Price
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($carritoProductos as $carritoProducto)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="p-4">
                    <img src="{{ $carritoProducto->producto->imagen }}" class="w-16 md:w-32 max-w-full max-h-full" alt="{{ $carritoProducto->producto->nombre }}">
                </td>
                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                    {{ $carritoProducto->producto->nombre }}
                </td>
                
                
                <td class="px-6 py-4">
                  <form action="{{ route('carrito.actualizarCantidad', $carritoProducto->id) }}" method="POST">
                      @csrf
                      @method('PUT')
                      <div class="flex items-center">
                          <!-- Botón para reducir cantidad -->
                          <button type="button" onclick="decrementQuantity(this)" class="inline-flex items-center justify-center p-1 me-3 text-sm font-medium h-6 w-6 text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                              <span class="sr-only">Reducir Cantidad</span>
                              <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                              </svg>
                          </button>
                          <!-- Input para ingresar la cantidad -->
                          <div>
                              <input type="number" name="cantidad" value="{{ $carritoProducto->cantidad }}" class="bg-gray-50 w-14 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="1" required>
                          </div>
                          <!-- Botón para incrementar cantidad -->
                          <button type="button" onclick="incrementQuantity(this)" class="inline-flex items-center justify-center h-6 w-6 p-1 ms-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                              <span class="sr-only">Incrementar Cantidad</span>
                              <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                              </svg>
                          </button>
                      </div>
                      <!-- Botón de enviar formulario oculto -->
                      <button type="submit" class="hidden">Actualizar Cantidad</button>
                  </form>
              </td>

                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                    ${{ $carritoProducto->producto->precio }}
                </td>
                <td class="px-6 py-4">
                        <form action="{{ route('carrito.eliminar', $carritoProducto->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline">Eliminar</button>
                        </form>
                    </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr class="font-semibold text-gray-900 dark:text-white">
                <th scope="row" class="px-6 py-3 text-base">Total</th>
                <td class="px-6 py-3"></td>
                <td id="totalCantidad" class="px-6 py-3">{{ $totalCantidad }}</td>
                <td id="totalPrecio" class="px-6 py-3">${{ $totalPrecio }}</td> <!-- Mostrar el total del precio aquí -->
            </tr>
        </tfoot>
    </table>
</div>

</nav>




<!-- component -->

<section class="py-1 bg-blueGray-50">
    <div class="w-full lg:w-8/12 px-4 mx-auto mt-6">
        <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
            <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                <form action="{{ route('carrito.pagar') }}" method="POST">
                    @csrf
                    <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                        Información para entrega 
                    </h6>
        <div class="flex flex-wrap">
          <div class="w-full lg:w-6/12 px-4">
            <div class="relative w-full mb-3">
              <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                Email 
              </label>
              <input type="email" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="jesse@example.com">
            </div>
          </div>
          <div class="w-full lg:w-6/12 px-4">
            <div class="relative w-full mb-3">
              <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                Nombres              </label>
              <input type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Lucky">
            </div>
          </div>
          <div class="w-full lg:w-6/12 px-4">
            <div class="relative w-full mb-3">
              <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                Apellidos
              </label>
              <input type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Jesse">
            </div>
          </div>
        </div>

        <hr class="mt-6 border-b-1 border-blueGray-300">
 
</div>

<h2>Información de ENTREGA</h2>
<form action="{{ route('carrito.guardarInformacionEnvio') }}" method="POST">
    @csrf
    <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">Información de contacto</h6>
    <div class="flex flex-wrap">
        <!-- Dirección -->
        <div class="w-full lg:w-12/12 px-4">
            <div class="relative w-full mb-3">
                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="direccion">Dirección</label>
                <input type="text" id="direccion" name="direccion" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09" required>
            </div>
        </div>
        <!-- País -->
        <div class="w-full lg:w-4/12 px-4">
            <div class="relative w-full mb-3">
                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="pais">País</label>
                <input type="text" id="pais" name="pais" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Perú" required>
            </div>
        </div>
        <!-- Departamento -->
        <div class="w-full lg:w-4/12 px-4">
            <div class="relative w-full mb-3">
                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="departamento">Departamento</label>
                <input type="text" id="departamento" name="departamento" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Arequipa"required>
            </div>
        </div>
        <!-- Ciudad -->
        <div class="w-full lg:w-4/12 px-4">
            <div class="relative w-full mb-3">
                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="ciudad">Ciudad</label>
                <input type="text" id="ciudad" name="ciudad" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Camana" required>
            </div>
        </div>
    </div>
  
    <hr class="mt-6 border-b-1 border-blueGray-300">
  
    <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">Referencias</h6>
    <div class="flex flex-wrap">
        <!-- Referencias -->
        <div class="w-full lg:w-12/12 px-4">
            <div class="relative w-full mb-3">
                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="referencias">Dirección de referencia o algún contacto</label>
                <textarea id="referencias" name="referencias" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" rows="4" placeholder="Referencias ejm. Cerca al mercado, número para comunicarse"></textarea>
            </div>
        </div>
    </div>

    <!-- Campo para ingresar RUC -->
    <div id="ruc" class="w-full lg:w-4/12 px-4">
        <label for="ruc" class="block uppercase text-blueGray-600 text-xs font-bold mb-2">DNI (en caso de FACTURA ingrese su RUC):</label>
        <input type="text" id="ruc" name="ruc" placeholder="12345678" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" required>
    </div>

     <div class="flex justify-end mt-4">

     
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                            Pagar ${{ $totalPrecio }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


<script>
    // Función para incrementar la cantidad
    function incrementQuantity(button) {
        var input = button.parentElement.querySelector('input[type="number"]');
        input.stepUp();
        updateTotalQuantity();
    }

    // Función para reducir la cantidad
    function decrementQuantity(button) {
        var input = button.parentElement.querySelector('input[type="number"]');
        input.stepDown();
        updateTotalQuantity();
    }

    // Función para actualizar el total de la cantidad de productos
    function updateTotalQuantity() {
        var totalCantidadElement = document.getElementById('totalCantidad');
        var totalCantidad = 0;
        var cantidadInputs = document.querySelectorAll('input[name="cantidad"]');
        cantidadInputs.forEach(function(input) {
            totalCantidad += parseInt(input.value);
        });
        totalCantidadElement.textContent = totalCantidad;
    }
</script>

</body>
</html>