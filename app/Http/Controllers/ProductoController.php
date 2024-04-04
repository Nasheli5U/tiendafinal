<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all(); // Obtener todos los productos desde la base de datos
        return view('admin', compact('productos')); // Pasar los productos a la vista
    }
    
    public function create()
    {
        $productos = Producto::all();
        return view('productos.create', compact('productos'));
    }
    

    public function store(Request $request)
{
    try {
        // Define las reglas de validación para los campos del formulario
        $rules = [
            'nombre' => 'required',
            'precio' => 'required|numeric',
            'descripcion' => 'nullable',
            'imagen_url' => 'nullable|url', // Agrega la regla de validación para la URL de la imagen
        ];

        // Realiza la validación de los datos del formulario
        $request->validate($rules);

        // Si se proporciona un enlace de imagen, guárdalo en la base de datos
        $uriFoto = $request->input('imagen_url');

        // Crea una nueva instancia de Producto y guarda los datos en la base de datos
        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->descripcion = $request->descripcion;
        $producto->imagen = $uriFoto; // Guarda la URL de la imagen directamente

        $producto->save();

        return redirect()->route('admin')->with('success', 'Producto agregado correctamente.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error al guardar el producto: ' . $e->getMessage());
    }
}



    public function edit(Producto $producto)
    {
        // Mostrar el formulario de edición de producto
        return view('productos.edit', compact('producto'));
    }

    public function update(Request $request, Producto $producto)
{
    // Primero, realiza la validación de los datos del formulario
    $request->validate([
        'nombre' => 'required',
        'precio' => 'required|numeric',
        'descripcion' => 'nullable',
        'imagen_url' => 'nullable|url', // Agrega la regla de validación para la URL de la imagen
    ]);

    // Actualiza los datos del producto con los valores del formulario
    $producto->nombre = $request->nombre;
    $producto->precio = $request->precio;
    $producto->descripcion = $request->descripcion;
    $producto->imagen = $request->input('imagen_url'); // Actualiza la URL de la imagen directamente

    // Guarda los cambios en la base de datos
    $producto->save();

    // Redirige a alguna vista o ruta después de actualizar el producto
    return redirect()->route('admin')->with('success', 'Producto actualizado correctamente.');
}


    public function destroy(Producto $producto)
    {
        // Eliminar el producto de la base de datos
        $producto->delete();

        // Redirigir a alguna vista o ruta después de eliminar el producto
        return redirect()->route('admin')->with('success', 'Producto eliminado correctamente.');
    }
}