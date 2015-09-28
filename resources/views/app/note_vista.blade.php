@extends('layouts.master')
@section('title', $note->titulo)
@section('description','Escaneaste tu código, ahora es hora de vincular un archivo')
<?php
$vinculos = ["a" => "Tus packs"];
$hojas = ["registro"];
//$scripts = ["dropzone", "dropzone_note"];
?>

@section('content')

<div class="container">

    <h1>{{$note->titulo}}</h1>
    
    <div class="caja-blanca  row">
        <p>{{$note->descripcion}}</p>
        <img class="responsive-img" src="{{$note->contenido}}">
    </div>
</div>
@stop
