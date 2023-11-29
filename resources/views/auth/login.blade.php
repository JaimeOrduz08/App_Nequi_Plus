<!-- Agrega el archivo CSS de Bootstrap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<!-- Agrega los archivos JavaScript de Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

@extends('layouts.app')

@section('title', 'Login')

@section('content')

<div class="block mx-auto my-12 p-8 bg-white w-1/3 border border-gray-200 rounded-lg shadow-lg">
    <h1 class="text-5xl text-center pt-2">Inicio de sesión</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="mt-4" method="POST" action="">
        @csrf

        <div class="mb-3">
            <label for="phone_number" class="form-label">Número de teléfono</label>
            <input type="tel" class="form-control" id="phone_number" name="phone_number" placeholder="Ingrese número de teléfono" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese contraseña" required>
        </div>

        <button type="submit" class="btn btn-primary">Iniciar sesión</button>
    </form>
</div>

@endsection
