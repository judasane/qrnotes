@extends('layouts.master')
@section('title', 'Regístrate aquí')
<?php
$hojas = ["registro"];
?>
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading container">
                    <h3>Hola </h3>
                    <h5>Acá podrás loguearte en nuestra aplicación</h5>
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
                        <form  method="POST" action="{{ url('/auth/login') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="row">
                                <div class="input-field col s12 m6">
                                    <input placeholder="Tu email aquí" name="email" type="email"  id="email">
                                    <label class="active" for="email">Tu correo electróncico</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <input placeholder="Digita tu contraseña" name="password" type="password"  id="password">
                                    <label class="active" for="password">Contraseña</label>
                                </div>
                            </div>
                            <div class="row">


                                <div class="col m2">
                                    <button type="submit" class="btn btn-primary">
                                        Inicia sesión
                                    </button>
                                </div>
                                <div class="col s12 m3">
                                    <input type="checkbox"  id="filled-in-box" checked="checked" />
                                    <label for="filled-in-box">Mantenerte logueado</label>
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
