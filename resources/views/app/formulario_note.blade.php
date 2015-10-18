@extends('layouts.master')
@section('title', 'Crea tu nota acá')
@section('description','Escaneaste tu código, ahora es hora de vincular un archivo')
<?php
$vinculos = ["a" => "Tus packs"];
$hojas = ["registro"];
//$scripts = ["dropzone", "dropzone_note"];
?>

@section('content')

<div class="container">

    <h1>Actualiza la información de tu note</h1>

    <div class="caja-blanca  row">

        <form  method="POST"  action="">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="input-field col s12 m3">
                    <input placeholder="Título" name="titulo" type="text"  id="titulo">
                    <label class="active" for="titulo">Título</label>
                </div>
                <div class="input-field col s12 m7">
                    <input placeholder="Descripción" name="descripcion" type="text"  id="descripcion">
                    <label class="active" for="codigo">Descripción de tu note</label>
                </div>

                <div class="col s5 m2">
                    <button type="submit" class="btn btn-primary">
                        Generar
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>
@stop
