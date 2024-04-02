<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto; // Importa el modelo Producto

class HomeController extends Controller
{
    public function index()
    {
        $productos = Producto::all(); // Obtener todos los productos desde la base de datos
        return view('home', compact('productos')); // Pasar los productos a la vista
    }

    public function almacen()
    {
        return view('almacen');
    }

    public function carrito()
    {
        return view('carrito');
    }

    public function contacto()
    {
        return view('contacto');
    }

}
