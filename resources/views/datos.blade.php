<!-- Agrega el archivo CSS de Bootstrap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

@extends('layouts.app')

@section('title', 'Perfil de usuario')

@section('content')
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


    <div class="block mx-auto my-12 p-8 bg-white w-1/50 border border-gray-200 rounded-lg shadow-lg">
        <h1 class="font-semibold py-3 px-4">Perfil de usuario</h1>
            <form method="POST" action="{{ route('user.update') }}" enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="primer_nombre" class="form-label">Primer Nombre</label>
                                <input type="text" class="form-control" name="primer_nombre" id="primer_nombre" value="{{ Auth::user()->primer_nombre }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="segundo_nombre" class="form-label">Segundo Nombre</label>
                                <input type="text" class="form-control" name="segundo_nombre" id="segundo_nombre" value="{{ Auth::user()->segundo_nombre }}" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="primer_apellido" class="form-label">Primer Apellido</label>
                                <input type="text" class="form-control" name="primer_apellido" id="primer_apellido" value="{{ Auth::user()->primer_apellido }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="segundo_apellido" class="form-label">Segundo Apellido</label>
                                <input type="text" class="form-control" name="segundo_apellido" id="segundo_apellido" value="{{ Auth::user()->segundo_apellido }}" readonly>
                            </div> 
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                                <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" value="{{ Auth::user()->fecha_nacimiento }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="tipo_documento" class="form-label">Tipo de Documento</label>
                                <input type="text" class="form-control" name="tipo_documento" id="tipo_documento" value="{{ Auth::user()->tipo_documento }}" readonly>
                            </div> 
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="n_documento" class="form-label">Número de Documento</label>
                                <input type="text" class="form-control" name="n_documento" id="n_documento" value="{{ Auth::user()->n_documento }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="fecha_expedicion" class="form-label">Fecha de Expedición</label>
                                <input type="date" class="form-control" name="fecha_expedicion" id="fecha_expedicion" value="{{ Auth::user()->fecha_expedicion }}" readonly>
                            </div> 
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="direccion" class="form-label">Dirección</label>
                                <input type="text" class="form-control" name="direccion" id="direccion" value="{{ Auth::user()->direccion }}">
                            </div>
                            <div class="col-md-6">
                                <label for="departamento" class="form-label">Departamento</label>
                                <input type="text" class="form-control" name="departamento" id="departamento" value="{{ Auth::user()->departamento }}">
                            </div> 
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="ciudad" class="form-label">Ciudad</label>
                                <input type="text" class="form-control" name="ciudad" id="ciudad" value="{{ Auth::user()->ciudad }}">
                            </div>

                            <div class="col-md-6">
                                <label for="fotografia" class="form-label">Fotografía</label>
                                <input type="file" class="form-control" name="fotografia" id="fotografia">
                                @if($datosUsuario->fotografia)
                                    <div class="mb-3" style="width: 300px; height: 300px; overflow: hidden;">
                                        <img src="{{ asset('storage'). '/' . $datosUsuario->fotografia }}" alt="Fotografía" style="width: 100%; height: auto;">
                                    </div>
                                @else
                                    <p>No se ha cargado ninguna fotografía.</p>
                                @endif
                            </div>





                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </div>
                    </form>
    
</div>

<!-- Agrega los archivos JavaScript de Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

@endsection
