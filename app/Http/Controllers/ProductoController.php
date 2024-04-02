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
    $request->validate([
        'nombre' => 'required',
        'precio' => 'required|numeric',
        'descripcion' => 'nullable', // Se puede incluir la validación para la descripción si es necesario
    ]);

    $producto = new Producto();
    $producto->nombre = $request->nombre;
    $producto->precio = $request->precio;
    $producto->descripcion = $request->descripcion; // Asigna la descripción si se proporciona
    $producto->save();

    return redirect()->route('admin')->with('success', 'Producto agregado correctamente.');
}

    public function edit(Producto $producto)
    {
        // Mostrar el formulario de edición de producto
        return view('productos.edit', compact('producto'));
    }

    public function update(Request $request, Producto $producto)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric',
            // Agrega aquí más reglas de validación según tus necesidades
        ]);

        // Actualizar el producto con los datos del formulario
        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        // Actualiza más atributos según sea necesario

        // Guardar los cambios en la base de datos
        $producto->save();

        // Redirigir a alguna vista o ruta después de actualizar el producto
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