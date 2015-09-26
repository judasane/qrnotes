@extends('layouts.master')
@section('title', 'Consulta tus notes')
@section('description','Aquí puedes ver todas tus notes');
<?php
$vinculos = ["a" => "Tus packs"];
$hojas = ["registro"];
?>

@section('content')

<div class="container">

    <h1>Generación de packs</h1>

    <div class="caja-blanca  row">
        <form  method="POST" action="{{ url('generar') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="col m6">
                    Genera acá tus packs, posteriormente imprime desde chrome
                </div>

                <div class="col m2">
                    <input name="tipo" type="radio" id="test1" value="muestra" />
                    <label for="test1">Muestra</label>

                </div>

                <div class="col m2">
                    <input name="tipo" type="radio" id="test2" value="venta" />
                    <label for="test2">Venta</label>

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