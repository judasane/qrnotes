@extends('layouts.master')
@section('title', 'Sube un archivo')
@section('description','Aquí subir tus archivos');
@section('content')
 
    <form action="add" method="post" enctype="multipart/form-data">
        <input type="file" name="filefield">
        <input type="submit">
    </form>
 
 <h1> Pictures list</h1>
 
 <div class="row">
 
    <ul>
 @foreach($entries as $entry)
        <li>{{entry->filename}}</li>
 @endforeach
    </ul>
 </div>
 
@endsection