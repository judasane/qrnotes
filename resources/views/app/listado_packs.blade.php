@extends('layouts.master')
@section('title', 'Todos tus packs aquí')
@section('description','Todos tus packs de QRnotes aquí')
<?php

$vinculos = ["auth/register" => "Tus packs"];
$hojas = ["listado_packs"];
?>

@section('content')

<div class="container">
    <h1>Listado de todos tus packs</h1>
    @include('app.packs')
    
</div>




@endsection