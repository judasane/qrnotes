@extends('layouts.master')
@section('title', 'Cambio de contraseña')
<?php
$hojas = ["registro"];
?>
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading container">
                    <h5>Acá podrás cambiar tu contraseña</h5>
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
                        <form  method="POST" action="{{ url('/auth/password/reset') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="token" value="{{ $token }}">



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

                            <div class="row">
                                <div class="input-field col s12 m6">
                                    <input placeholder="Tu correo electrónico" name="email" type="email"  id="email">
                                    <label class="active" for="email">Escribe tu email aquí</label>
                                </div>
                                <div class="col s12 m6" style="margin-top: 1.7rem">
                                    <button type="submit" class="btn btn-primary">
                                        Crea tu nueva contraseña
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















































<form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="token" value="{{ $token }}">

    <div class="form-group">
        <label class="col-md-4 control-label">E-Mail Address</label>
        <div class="col-md-6">
            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label">Password</label>
        <div class="col-md-6">
            <input type="password" class="form-control" name="password">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label">Confirm Password</label>
        <div class="col-md-6">
            <input type="password" class="form-control" name="password_confirmation">
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                Reset Password
            </button>
        </div>
    </div>
</form>
</div>
</div>
</div>
</div>
</div>
@endsection
