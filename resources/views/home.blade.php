<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    @vite('resources/css/app.css')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
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
                        <a class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500" aria-current="page">Inicio</a>
                    </li>
                    <li>
                        <a class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent" href="{{ route('almacen') }}">Almacen</a>
                    </li>
                    <li>
                        <a class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent" href="{{ route('carrito') }}">
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
    </nav>
    <h1>¡Bienvenido a nuestra tienda!</h1>
    <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        @foreach($productos as $producto)
        <div>
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $producto->nombre }}</h5>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">${{ $producto->precio }}</p>
            <form id="formAgregarCarrito{{ $producto->id }}" action="{{ route('carrito.agregar', $producto->id) }}" method="POST">
                @csrf
                <button type="button" class="btnAgregarCarrito inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" data-producto-id="{{ $producto->id }}">
                    Agregar al carrito
                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </button>
            </form>
        </div>
        @endforeach
    </div>

    <script>
        $(document).ready(function() {
            $('.btnAgregarCarrito').click(function() {
                var productoId = $(this).data('producto-id');
                $.ajax({
                    url: $('#formAgregarCarrito' + productoId).attr('action'),
                    type: 'POST',
                    data: $('#formAgregarCarrito' + productoId).serialize(),
                    success: function(response) {
                        // Opcional: muestra un mensaje o realiza alguna acción en la interfaz de usuario para indicar que el producto se ha agregado al carrito
                        alert('Producto agregado al carrito');
                    },
                    error: function(xhr, status, error) {
                        // Maneja errores si es necesario
                        console.error(error);
                    }
                });
            });
        });
    </script>
</body>
</html>
