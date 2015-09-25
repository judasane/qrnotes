@extends('layouts.master')
@section('title', 'Registra tu pack acá')
@section('description','Ya compraste tu pack de QRnotes, ahora puedes registrarlo aquí para empezar a usarlos')
<?php
$hojas = ["registro"];
$vinculos = ["auth/register" => "Tus packs"];
?>
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading container">
                    <h3>Registra aquí tu pack de QRnotes</h3>
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
                        <form  method="POST" action="{{ url('/a') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            @if(isset($numero))
                            <input type="hidden" name="numero" value="{{$numero}}">
                            @endif
                            <div class="row">
                                <div class="input-field col s12 m3">
                                    <input placeholder="El número de tu pack" name="numero" type="text"  id="numero" @if(isset($numero)) value="{{$numero}}" disabled @endif>
                                           <label class="active" for="numero">Número de pack</label>
                                </div>
                                <div class="input-field col s12 m3">
                                    <input placeholder="Código de seguridad" name="codigo" type="text"  id="codigo">
                                    <label class="active" for="codigo">Código de seguridad</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <input placeholder="Alias del pack" name="alias" type="text"  id="alias">
                                    <label class="active" for="alias">Si quieres, un alias para tu pack</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s5 m2">
                                    <button type="submit" class="btn btn-primary">
                                        Registrar
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
