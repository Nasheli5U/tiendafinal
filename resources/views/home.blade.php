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
                    <a class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500" aria-current="page">Inicio</a>
                </li>
                <li>
                    <a class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent" href="{{ route('almacen') }}">Almacen</a>
                </li>
                <li>
                    <a href="{{ route('carrito') }}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent flex items-center">
                        <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 21">
                            <path d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z"/>
                        </svg>
                        <span>Carrito</span>
                        @if ($cantidadCarrito > 0)
                            <span class="bg-blue-500 text-white px-2 py-1 rounded-full text-xs" id="cantidad-carrito">{{ $cantidadCarrito }}</span>
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
    <h1 class="mb-4 text-3xl font-extrabold text-gray-900 dark:text-blue-100 md:text-5xl lg:text-6xl"><span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">PRODUCTOS</span> ROPAS.</h1>


    <div class="flex flex-wrap">
    @foreach($productos as $producto)
    <div class="max-w-sm p-6 mb-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mr-4">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $producto->nombre }}</h5>
        <div class="p-4">
            @if($producto->imagen)
            <img src="{{ asset($producto->imagen) }}" alt="Imagen del producto" class="w-full h-auto object-cover h-48">
            @else
            Sin imagen
            @endif
        </div>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">${{ $producto->precio }}</p>
        <form id="formAgregarCarrito{{ $producto->id }}" action="{{ route('carrito.agregar', $producto->id) }}" method="POST">
        
            @csrf

            <button data-producto-id="{{ $producto->id }}" type="button" class=" btnAgregarCarrito text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 21">
                <path d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z"/>
                </svg>
                Agregar            
            </button>


        </form>
    </div>
    @endforeach
    </div>

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
                // Actualizar la cantidad de productos en el carrito
                actualizarCantidadCarrito();
            },
            error: function(xhr, status, error) {
                // Maneja errores si es necesario
                console.error(error);
            }
        });
    });
});

// Función para actualizar la cantidad de productos en el carrito
function actualizarCantidadCarrito() {
    $.ajax({
        url: "{{ route('carrito.cantidad') }}", // Aquí usamos la ruta definida en tu archivo de rutas
        method: "GET",
        success: function(response) {
            $('#cantidad-carrito').text(response);
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}

// Llama a la función para actualizar la cantidad de productos en el carrito cuando se carga la página
$(document).ready(function() {
    actualizarCantidadCarrito();
});
</script>


</body>
</html>
