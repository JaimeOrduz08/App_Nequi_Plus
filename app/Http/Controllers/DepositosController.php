<?php

namespace App\Http\Controllers;

use App\Models\Depositos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DepositosController extends Controller
{

    public function index()
    {
        return view('deposito.depositos');
    }

    public function store(Request $request)
{
    // Validar los datos del formulario
    $validatedData = $request->except('_token');

    $request->validate([
        'telefono' => 'required|numeric|digits:10',
        'monto' => 'required|numeric',
        'saldo_inicial' => 'required|numeric',
    ]);

    // Obtener el usuario actualmente autenticado
    $user = Auth::user();

    // Verificar si el usuario está autenticado
    if (!$user) {
        return redirect()->back()->with('error', 'El usuario no está autenticado.');
    }

    // Obtener el saldo inicial del formulario
    $saldoInicial = $validatedData['saldo_inicial'];

    // Calcular el saldo final sumando el monto del depósito al saldo inicial
    $saldoFinal = $saldoInicial + $validatedData['monto'];

    // Crear un nuevo objeto Depositos y asignar los valores
    $deposito = new Depositos();
    $deposito->telefono = $validatedData['telefono'];
    $deposito->monto = $validatedData['monto'];
    $deposito->fecha_deposito = Carbon::now('America/Bogota');
    $deposito->saldo_final = $saldoFinal;

    // Guardar el depósito en la base de datos
    $deposito->save();

    // Actualizar el saldo inicial del usuario con el saldo final calculado
    $user->saldo_inicial = $saldoFinal;
    $user->save();

    return redirect()->back()->with('success', 'El depósito se realizó exitosamente.');
}

}
