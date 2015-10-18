@extends('layouts.master')
@section('title', 'Crea tu nota acá')
@section('description','Escaneaste tu código, ahora es hora de vincular un archivo')
<?php
$vinculos = ["a" => "Tus packs"];
$hojas = ["registro", "dropzone","subir_note"];
$scripts = ["dropzone", "dropzone_note"];
?>

@section('content')

<div class="container">

    <h1>Sube tu archivo aquí</h1>

    <div class="caja-blanca  row">

        <form class="dropzone" id="my-awesome-dropzone" action="#">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
        <!--        <form  method="POST"  action="{{ url('generar') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">
                        <input type="file" name="file" />
                        
            <div class="col s5 m2">
                            <button type="submit" class="btn btn-primary">
                                Generar
                            </button>
                        </div>
                    </div>
        
                </form>-->
    </div>
</div>
@stop
