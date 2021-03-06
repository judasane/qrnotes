@extends('layouts.master')
@section('title', 'Regístrate aquí')
@section('description','Regístrate acá en la aplicación que cambiará la forma de tomar apuntes. Nunca usar stickers fue tan útil')
<?php
$hojas = ["registro"];
$vinculos = ["auth/login" => "Inicia sesión", "/" => "Inicio"];
?>
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading container"><h3>Regístrate aquí</h3></div>
                <div class="panel-body">
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Ups!!</strong> Hubo algunos problemas con los datos que ingresaste.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="caja-blanca container row">
                        <form  method="POST" action="{{ url('/auth/register') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">



                            <div class="row">
                                <div class="input-field col s12 m6">
                                    <input value="{{ old('nombre') }}" placeholder="Tu nombre aquí" name="nombre" type="text" class="validate" id="nombre">
                                    <label class="active" for="nombre">Nombre</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <input value="{{ old('apellido') }}" placeholder="Tu apellido aquí" name="apellido" type="text" class="validate" id="apellido">
                                    <label class="active" for="apellido">Apellido</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12 m6">
                                    <select id="genero" name="genero" >
                                        <option value="" disabled selected>¿Eres chico o chica?</option>
                                        <option value="femenino">Chica</option>
                                        <option value="masculino">Chico</option>
                                    </select>
                                    <label for="genero">Género</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <input value="{{ old('email') }}" placeholder="Tu correo institucional aquí" name="email" type="email" class="validate" id="email">
                                    <label class="active" for="email">E-mail</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12 m6">
                                    <input value="{{ old('carrera') }}" placeholder="¿Qué estudias?" name="carrera" type="text" class="validate" id="carrera">
                                    <label class="active" for="carrera">Carrera</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <input value="{{ old('nacimiento') }}" placeholder="¿Cuándo naciste?" name="nacimiento" type="date" class=" validate" id="apellido">
                                    <label class="active" for="apellido">Fecha de nacimiento</label>
                                </div>
                            </div>



                            <div class="col m6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Regístrate
                                </button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
