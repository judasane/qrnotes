<!--Plantilla que muestra todos los notes de un pack-->
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


    <?php $i = 0 ?>
    @foreach($notes as $note)
    <?php
    $contenido = $note->contenido;
    if ($contenido != 'http://www.qrnotes.co/img/upload.png') {
        $filename = substr(strrchr($contenido, "/"), 1);
        $contenido = "http://www.qrnotes.co/archivos/foto/$filename/250";
    }
    ?>
    @if($i%4==0)
    <div class="row">
        @endif
        <div class="col m3 s12 prueba" >
            <a href="c{{\App\Classes\Numeracion::codificar($note->pack->id)}}/{{$note->numero}}"><div class="card  " >
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="{{$contenido}}">
                    </div></a>
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
    @if(($i+1)%4==0)
</div><!--hola-->
@endif
<?php $i++ ?>
@endforeach



</div>




@endsection