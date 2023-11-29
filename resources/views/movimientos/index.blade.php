<!-- Agrega el archivo CSS de Bootstrap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

@extends('layouts.app')

@section('title', 'Movimientos')

@section('content')

<div class="container-fluid">

<div class="row">
    @if(Auth::check())
        <div class="col-md-12">
            <ul class="list-group list-group-horizontal">
                <li class="list-group-item">
                    <a href="{{ url('/') }}">Pagina principal</a>
                </li>
                <li class="list-group-item{{ request()->is('datos') ? ' active' : '' }}">
                    <a href="{{ url('/datos') }}">Mis Datos</a>
                </li>
                <li class="list-group-item{{ request()->is('retiros') ? ' active' : '' }}">
                    <a href="{{ url('/retiros') }}">Retiros</a>
                </li>
                <li class="list-group-item{{ request()->is('depositos') ? ' active' : '' }}">
                    <a href="{{ url('/depositos') }}">Depósitos</a>
                </li>
                <li class="list-group-item{{ request()->is('movimientos') ? ' active' : '' }}">
                    <a href="{{ url('/movimientos') }}">Movimientos</a>
                </li>
            </ul>
        </div>
    @endif
</div>

<div class="font-semibold py-1 px-2">
    <h1>Informe de Movimientos</h1>
    <h2>Mes Actual: {{ Carbon\Carbon::now()->format('F Y') }}</h2>
</div>


<div class="container">
    <div class="row">
            <div class="block mx-auto my-12 p-8 bg-white border border-gray-200 rounded-lg shadow-lg">
                <h3 class="font-semibold py-3 px-4">DEPOSITOS</h3>
                <ul>
                    @foreach($depositos as $deposito)
                        <li>{{ $deposito->telefono }} - Monto: ${{ $deposito->monto }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="block mx-auto  p-8 bg-white border border-gray-100 rounded-lg shadow-lg">
                <h3 class="font-semibold py-3 px-4">RETIROS</h3>
                <ul>
                    @foreach($retiros as $retiro)
                        <li>{{ $retiro->telefono }} - Monto: ${{ $retiro->monto }}</li>
                    @endforeach
                </ul>
            </div>

            <div class="block mx-auto my-12 p-8 bg-white border border-gray-200 rounded-lg shadow-lg">
                <h3 >Saldo Final del Mes: ${{ $saldoFinal }}</h3>
                <h3>Número de Depósitos: {{ $numDepositos }}</h3>
                <h3>Número de Retiros: {{ $numRetiros }}</h3>
            </div>
    </div>
</div>



    
</div>

@endsection
