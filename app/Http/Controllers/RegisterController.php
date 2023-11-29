<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $datosUsuario = $request->except('_token');

        if ($request->hasFile('fotografia')) {
            $rutaImagen = $request->file('fotografia')->store('uploads', 'public');
            $datosUsuario['fotografia'] = $rutaImagen;
        }
        

        $datosUsuario['password'] = Hash::make($request->input('password'));

        User::create($datosUsuario);

        return redirect('login')->with('mensaje', 'Usuario creado');
    }
 
    public function datos()
{
    $datosUsuario = Auth::user();

    return view('datos')->with('datosUsuario', $datosUsuario);
}


public function update(Request $request)
{
    $user = Auth::user();
    $user->direccion = $request->input('direccion');
    $user->departamento = $request->input('departamento');
    $user->ciudad = $request->input('ciudad');

    if ($request->hasFile('fotografia')) {
        // Procesar la nueva fotografía y actualizar el campo correspondiente en la base de datos
        $fotografia = $request->file('fotografia')->store('uploads', 'public');
        $user->fotografia = $fotografia;
    }

    $user->save();

    // Redireccionar a la página de perfil o mostrar un mensaje de éxito
    return redirect()->route('datos')->with('success', 'Los datos se han actualizado correctamente.');
}







    
}

    
