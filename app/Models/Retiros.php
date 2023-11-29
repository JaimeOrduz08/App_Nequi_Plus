<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retiros extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'telefono',
        'monto',
        'fecha_retiro',
        'saldo_inicial',
        'saldo_final',
    ];
}









