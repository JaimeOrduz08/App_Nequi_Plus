<!-- Agrega el archivo CSS de Bootstrap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

@extends('layouts.app')

@section('title', 'Retiros')

@section('content')
<div class="row">
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
 
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <div class="block mx-auto my-12 p-8 bg-white w-1/3 border border-gray-200 rounded-lg shadow-lg">
                <h1 class="font-semibold py-3 px-4 text-center">REALIZAR RETIRO</h1>
            <form method="POST" action="{{ route('retiros.store') }}">
                @csrf
                <div class="form-group">
                    <label for="telefono">Teléfono:</label>
                    <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Ingrese su número telefónico" pattern="[0-9]{10}" maxlength="10" required>
                    @error('telefono')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mt-4">
                    <label for="monto">Monto:</label>
                    <input type="number" name="monto" id="monto" class="form-control" placeholder="Ingrese valor a retirar" required min="10000">
                    @error('monto')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary btn-block">Confirmar retiro</button>
                </div>
            </form>
        </div>
    </div>
    
</div>
@endsection
