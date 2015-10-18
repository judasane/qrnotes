<!--Plantilla que muestra una note-->
@extends('layouts.master')
@section('title', $note->titulo)
@section('description','Escaneaste tu código, ahora es hora de vincular un archivo')
<?php

$vinculos = ["a" => "Tus packs","a/c".$note->pack->id=>"Vuelta al pack"];
$hojas = ["registro"];
//$scripts = ["dropzone", "dropzone_note"];
?>

@section('content')

<div class="container">

    <h1>{{$note->titulo}}</h1>
    
    <div class="caja-blanca  row">
        <p>{{$note->descripcion}}</p>
        <a href="{{$note->contenido}}" title="Acceso a la imagen en tamaño completo"><img class="responsive-img" alt="$note->titulo" src="{{$note->contenido}}"></a>
    </div>
</div>
@stop
