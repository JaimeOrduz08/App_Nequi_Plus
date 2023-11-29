<!-- Agrega el archivo CSS de Bootstrap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<!-- Agrega los archivos JavaScript de Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>


@extends('layouts.app')

@section('title', 'Register')

@section('content')

<di class="block mx-auto my-12 p-8 bg-white w-1/50 border border-gray-200 rounded-lg shadow-lg">
    <h1 class="font-semibold py-3 px-4">Registro de usuario</h1>
    
    <form method="POST" action="" enctype="multipart/form-data" autocomplete="off">
                        @csrf 

                        <div class="row mb-3">
                            <div class="col-md-6">
                            <label for="password" >{{ __('Primer nombre *') }}</label>
                                <input type="text" class="form-control"  name="primer_nombre" id="primer_nombre" placeholder="Ingrese primer nombre" required <br>
                            </div>
                            <div class="col-md-6">
                            <label for="password" >{{ __('Segundo nombre *') }}</label>
                                <input type="text" class="form-control"  name="segundo_nombre" id="segundo_nombre" placeholder="Ingrese segundo nombre" required<br>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                            <label for="password" >{{ __('Primer apellido *') }}</label>
                                <input type="text" class="form-control"  name="primer_apellido" id="primer_apellido" placeholder="Ingrese primer apellido" required<br>
                            </div>
                            <div class="col-md-6">
                            <label for="password" >{{ __('Segundo apellido *') }}</label>
                                <input type="text" class="form-control"  name="segundo_apellido" id="segundo_apellido" placeholder="Ingrese segundo apellido" required <br>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                            <label for="password" >{{ __('Fecha de nacimiento *') }}</label>
                                <input type="date" class="form-control"  name="fecha_nacimiento" id="fecha_nacimiento" required <br>
                            </div>
                            <div class="col-md-6">
                                <select class="input-field" name="tipo_documento" id="tipo_documento">
                                    <option value="" disabled selected>Elija su tipo de documento</option>
                                    <option value="Cedula">Cedula</option>
                                    <option value="Cc de extranjeria">Cc de extranjeria</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                            <label for="number" >{{ __('Numero de documento *') }}</label>
                                <input type="text" class="form-control"  name="n_documento" id="n_documento" placeholder="Ingrese numero de documento" pattern="[0-9]{10}" maxlength="10" required>
                            </div>
                            <div class="col-md-6">
                            <label for="password" >{{ __('Fecha de expedicion *') }}</label>
                                <input type="date" class="form-control"  name="fecha_expedicion" id="fecha_expedicion" required <br>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                            <label for="password" >{{ __('Direccion *') }}</label>
                                <input type="text" class="form-control"  name="direccion" id="direccion" placeholder="Ingrese su direccion" required<br>
                            </div>
                            <div class="col-md-6">
                            <label for="password" >{{ __('Departamento *') }}</label>
                                <input type="text" class="form-control"  name="departamento" id="departamento" placeholder="Ingrese su departamento" required<br>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                            <label for="password" >{{ __('Ciudad *') }}</label>
                                <input type="text" class="form-control"  name="ciudad" id="ciudad" placeholder="Ingrese su ciudad" required<br>
                            </div>

                            <div class="col-md-6">
                            <label for="password" >{{ __('Saldo inicial *') }}</label>
                                <input type="number" class="form-control"  name="saldo_inicial" id="saldo_inicial" placeholder="Ingrese monto inicial" required<br>
                            </div>
                        
                            <div class="col-md-6">
                            <label for="password" >{{ __('Fotografia *') }}</label>
                                <input type="file" class="form-control"  name="fotografia" id="fotografia">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                            <label for="password" >{{ __('Numero telefonico *') }}</label>
                                <input type="number" class="form-control"  name="phone_number" id="phone_number" placeholder="Ingrese su numero de telefono" pattern="[0-9]{10}" maxlength="10" required<br>
                            </div>
                            <div class="col-md-6">
                            <label for="password" >{{ __('Contraseña *') }}</label>
                                <input type="text" class="form-control"  name="password" id="password" placeholder="Ingrese una nueva contraseña" required<br>
                            </div>
                        </div>

                        <div class="col-md-6">
                        <a href="{{url('home/')}}" class="btn btn-success"> Volver </a>

                        <button type="submit" class="btn btn-success">
                                {{ __('Register') }}
                            </button>
                        </div>
        </form>
</di>

@endsection