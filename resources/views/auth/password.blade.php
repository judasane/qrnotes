@extends('layouts.master')
@section('title', 'Recuperación de contraseña')
@section('description','Si olvidaste tu contraseña de QRnotes, no te preocupes, acá puedes reiniciarla')
<?php
$hojas = ["registro"];
$vinculos = ["auth/register"=>"Regístrate acá","/"=>"Inicio"];
?>
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading container">
                    <h3>Olvidaste tu contraseña </h3>
                    <h5>Tranqui, aquí la puedes volver a generar</h5>
                </div>

                <div class="panel-body">
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="caja-blanca container row">
                        <form  method="POST" action="{{ url('/auth/password/email') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="row">
                                <div class="input-field col s12 m8">
                                    <input placeholder="Tu email aquí" name="email" type="email"  id="email" value="{{ old('email') }}">
                                    <label class="active" for="email">Tu correo electróncico</label>
                                </div>
                                <div class="col m4">
                                    <button type="submit" class="btn btn-primary" style="margin-top: 1.8rem">
                                        Solicita un reset
                                    </button>
                                </div>
                            </div>
                            
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection