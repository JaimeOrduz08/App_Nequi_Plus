<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'phone_number' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            // Autenticación exitosa
            return redirect()->to('/');
        }

        // Autenticación fallida
        return back()->withErrors([
            'message' => 'Teléfono o contraseña incorrectos, verifique nuevamente.',
        ]);
    }

    public function destroy()
    {
        Auth::logout();

        return redirect()->to('/');
    }
}
