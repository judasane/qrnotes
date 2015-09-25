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
                    <h3>Hola {{$nombre}}</h3>
                    <h5>Acá podrás terminar tu registro</h5>
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
                        <form  method="POST" action="{{ url('/auth/verificar') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="id" value="{{ $id }}">



                            <div class="row">
                                <div class="input-field col s12 m6">
                                    <input placeholder="Digita tu contraseña" name="password" type="password"  id="password">
                                    <label class="active" for="password">Contraseña</label>
                                </div>

                                <div class="input-field col s12 m6">
                                    <input placeholder="Confirma tu contraseña" name="password_confirmation" type="password"  id="password_confirmation">
                                    <label class="active" for="password_confirmation">Confirma tu contraseña</label>
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
