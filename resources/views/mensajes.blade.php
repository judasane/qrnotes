@extends('layouts.master')
@section('title', 'Algo salió mal')
@section('description',$mensaje)

<?php
$vinculos = ["a" => "Tus packs"];
$hojas = ["registro"];
//$scripts = ["dropzone", "dropzone_note"];
?>
@section('content')
<div class="container">

    <h1>{{$mensaje}}</h1>

    <div class="caja-blanca  row">
        <p>{{$descripcion}}</p>
    </div>
</div>
@stop