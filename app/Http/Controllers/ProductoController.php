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
        ];

        // Si se proporciona una imagen, agrega la regla de validación correspondiente
        if ($request->hasFile('imagen')) {
            $rules['imagen'] = 'image|mimes:jpeg,png,jpg,gif|max:2048';
        }

        // Realiza la validación de los datos del formulario
        $request->validate($rules);

        // Guarda la imagen y obtén la ruta (si se proporciona una imagen)
        $uriFoto = $request->hasFile('imagen') ? $request->file('imagen')->store('public/imagenes_productos') : null;

        // Crea una nueva instancia de Producto y guarda los datos en la base de datos
        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->descripcion = $request->descripcion;
        
        // Si se proporciona una imagen, ajusta la ruta de la imagen para que coincida con el enlace simbólico
        if ($uriFoto) {
            $producto->imagen = str_replace('public/', 'storage/', $uriFoto);
        }

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
        'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Puedes agregar validación para la imagen si es necesaria
    ]);

    // Actualiza los datos del producto con los valores del formulario
    $producto->nombre = $request->nombre;
    $producto->precio = $request->precio;
    $producto->descripcion = $request->descripcion;

    // Si se proporciona una nueva imagen, guarda y actualiza la ruta de la imagen
    if ($request->hasFile('imagen')) {
        $uriFoto = $request->file('imagen')->store('public/imagenes_productos');
        $producto->imagen = str_replace('public/', 'storage/', $uriFoto); // Ajusta la ruta de la imagen para que coincida con el enlace simbólico
    }

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