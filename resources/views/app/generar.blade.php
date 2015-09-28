@extends('layouts.master')
@section('title', 'Consulta tus notes')
@section('description','Aquí generar packs');
<?php
$vinculos = ["a" => "Tus packs"];
$hojas = ["registro", "dropzone"];
$scripts = ["dropzone", "dropzoneconfig"];
?>

@section('content')

<div class="container">

    <h1>Generación de packs</h1>

    <div class="caja-blanca  row">

        <form class="dropzone" id="my-awesome-dropzone">
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
