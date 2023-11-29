<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Retiros;

class RetirosController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function index()
    {
        return view('retiro.retiros');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->except('_token');

        $request->validate([
            'telefono' => 'required|numeric|digits:10',
            'monto' => 'required|numeric',
        ]);

        // Obtener el usuario actualmente autenticado
        $user = Auth::user();

        // Verificar si el usuario está autenticado y tiene un saldo inicial válido
        if (!$user || !$user->saldo_inicial) {
            return redirect()->back()->with('error', 'No se pudo obtener el saldo inicial del usuario.');
        }

        // Obtener el saldo inicial del usuario
        $saldoInicial = $user->saldo_inicial;

        // Calcular el saldo final restando el monto del retiro al saldo inicial
        $saldoFinal = $saldoInicial - $validatedData['monto'];

        // Verificar si el saldo final es menor que el saldo mínimo permitido
        if ($saldoFinal < 10000) {
            return redirect()->back()->with('error', 'No se puede realizar el retiro. El saldo final no puede ser menor que $10,000.');
        }

        // Crear un nuevo objeto Retiros y asignar los valores
        $retiro = new Retiros();
        $retiro->telefono = $validatedData['telefono'];
        $retiro->monto = $validatedData['monto'];
        $retiro->fecha_retiro = Carbon::now();
        $retiro->saldo_inicial = $saldoInicial;
        $retiro->saldo_final = $saldoFinal;

        // Guardar el retiro en la base de datos
        $retiro->save();

        // Actualizar el saldo inicial del usuario con el saldo final calculado
        $user->saldo_inicial = $saldoFinal;
        $user->save();

        return redirect()->back()->with('success', 'El retiro se realizó exitosamente.');
    }
}
