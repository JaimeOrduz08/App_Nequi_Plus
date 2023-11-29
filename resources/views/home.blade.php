<!-- Agrega el archivo CSS de Bootstrap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<!-- Agrega los archivos JavaScript de Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

@extends('layouts.app')

@section('title', 'Inicio')

@section('content')

<div class="container-fluid">
    <div class="row">
        @if(Auth::check())
            <div class="col-md-3 ml-auto">
                <div class="sidebar mt-4">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="{{ url('/datos') }}">Mis Datos</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ url('/retiros') }}">Retiros</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ url('/depositos') }}">Depósitos</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ url('/movimientos') }}">Movimientos</a>
                        </li>
                    </ul>
                </div>
            </div>
        @endif

        <div class="col-md-9">
            <div class="block mx-auto my-4 p-8 bg-white border border-gray-200 rounded-lg shadow-lg">
                <div class="clearfix">
                    @if (Auth::check())
                        <h1 class="font-semibold py-3 px-4">Bienvenido, {{ Auth::user()->primer_nombre }} {{ Auth::user()->primer_apellido }}</h1>
                        <p>Saldo Inicial: {{ Auth::user()->saldo_inicial }}</p>
                    @else
                        <h1 class="font-semibold py-3 px-4">Bienvenido</h1>
                        <p>No has iniciado sesión.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>






@endsection
