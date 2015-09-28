@extends('layouts.master')
@section('title', 'Consulta tus notes')
@section('description','Aquí puedes ver todas tus notes')
<?php
$vinculos = ["a" => "Tus packs"];
$hojas = ["pack"];
?>

@section('content')

<div class="container">
    <h1>Listado de las notes en tu pack</h1>
    

    <div class="row">
        @foreach($notes as $note)
        <div class="col m3 s6 prueba" >
            <div class="card  " >
            <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" src="{{$note->contenido}}">
            </div>
            <div class="card-content ">
                <span class="card-title activator grey-text text-darken-4">{{$note->titulo}}<i class="material-icons right">more_vert</i></span>
                <p><a href="{{$note->contenido}}">Ver el archivo</a></p>
            </div>
            <div class="card-reveal">
                <span class="card-title grey-text text-darken-4">{{$note->titulo}}<i class="material-icons right">close</i></span>
                <p>{{$note->descripcion}}</p>
            </div>
        </div>
        </div>
        
        @endforeach
    </div>
    

</div>




@endsection