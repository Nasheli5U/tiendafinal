<?php

namespace App\Http\Controllers;
use App\Models\ContactMessage;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function showContactForm()
    {
        return view('contacto');
    }

    public function submitContactForm(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'tel' => 'required|string|max:20',
            'message' => 'required|string',
        ]);

        ContactMessage::create($request->all());

        return redirect()->route('contacto')->with('success', '¡Mensaje enviado correctamente!');
    }

    public function index()
    {
        $mensajes = ContactMessage::all();        
        return view('mensajes', ['mensajes' => $mensajes]); // Renderizar la vista 'mensajes.index' y pasar los mensajes como datos a la vista
    }

    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'tel' => 'nullable|string|max:20',
            'mensaje' => 'required|string|max:1000',
        ]);

        // Crear un nuevo mensaje de contacto
        $mensaje = new ContactMessage();
        $mensaje->nombre = $request->nombre;
        $mensaje->email = $request->email;
        $mensaje->tel = $request->tel;
        $mensaje->mensaje = $request->mensaje;
        $mensaje->save();

        // Redirigir con un mensaje de éxito
        return redirect()->route('contacto')->with('success', '¡Tu mensaje ha sido enviado con éxito!');
    }
}
