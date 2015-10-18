<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */
Route::get('logout', function()
{
    Auth::logout();
    return Redirect::to("/");
});
Route::get('/', 'WelcomeController@index');
Route::get('home', 'HomeController@index');
Route::controller("auth/password", 'Auth\PasswordController');
Route::controller("auth", 'Auth\AuthController');
Route::controller("packs", "PacksController");




Route::get("a/{numero}", "PacksController@getPack");
Route::get("a", "PacksController@getIndex");
Route::post("a", "PacksController@postPack");

Route::get("generar","PacksController@getGenerar");
Route::post("generar","PacksController@postGenerar");
//lleva al cartón para imprimir
Route::get("generar/impreso/{numero}","PacksController@getImpreso");

Route::get("arreglar","PacksController@arreglar");

Route::get("probando{prueba?}","PacksController@prueba");
Route::controller("a/{pack}/{note}","NotesController");


Route::get('app', function() {
    return view('master');
});



Route::get('fileentry', 'FileEntryController@index');
Route::get('fileentry/get/{filename}', [
	'as' => 'getentry', 'uses' => 'FileEntryController@get']);
Route::post('fileentry/add',[ 
        'as' => 'addentry', 'uses' => 'FileEntryController@add']);
//Generador de urls para el robot generador de imágenes
Route::get("urls/{cantidad}","PacksController@getUrls");

Route::controller("archivos","ArchivosController");


