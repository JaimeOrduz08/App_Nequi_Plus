<?php

namespace App\Http\Controllers;
use App\Models\Depositos;
use App\Models\Retiros;
use Carbon\Carbon;

use Illuminate\Http\Request;

class MovimientosController extends Controller
{


    public function index()
    {
        // Obtener el mes actual
        $mesActual = Carbon::now()->format('m');

        // Obtener los depósitos del mes actual
        $depositos = Depositos::whereMonth('fecha_deposito', $mesActual)->get();

        // Obtener los retiros del mes actual
        $retiros = Retiros::whereMonth('fecha_retiro', $mesActual)->get();

        // Calcular el saldo final para el mes actual
        $saldoFinal = Depositos::whereMonth('fecha_deposito', $mesActual)->sum('monto') - Retiros::whereMonth('fecha_retiro', $mesActual)->sum('monto');

        // Contar el número de transacciones de depósitos y retiros
        $numDepositos = $depositos->count();
        $numRetiros = $retiros->count();

        // Pasar los datos a la vista
        return view('movimientos.index', compact('depositos', 'retiros', 'saldoFinal', 'numDepositos', 'numRetiros'));
    }
}