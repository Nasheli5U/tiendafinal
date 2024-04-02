<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <!-- Aquí incluye tus estilos y scripts necesarios -->
</head>
<body>
    <h1>Carrito de Compras</h1>
    <ul>
        @foreach($carritoProductos as $carritoProducto)
            <li>
                Producto: {{ $carritoProducto->producto->nombre }} <br>
                Precio: ${{ $carritoProducto->producto->precio }} <br>
                <!-- Puedes mostrar más detalles del producto aquí -->
            </li>
        @endforeach
    </ul>
</body>
</html>
