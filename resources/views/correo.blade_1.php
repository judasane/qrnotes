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
                <div class="panel-heading container"><h3>Regístrate aquí</h3></div>
                <div class="caja-blanca container row">
                    <form  method="POST" action="{{ url('/correo') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input value="{{ old('email') }}" placeholder="Tu correo institucional aquí" name="email" type="email" class="validate" id="email">
                                <label class="active" for="email">E-mail</label>
                            </div>
                        </div>
                        <div class="col s12 m6">
                            <button type="submit" class="btn btn-primary">
                                Envía un correo
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
