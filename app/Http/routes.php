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
Route::get('/', 'WelcomeController@index');
Route::get('home', 'HomeController@index');
Route::controller("auth/password", 'Auth\PasswordController');
Route::controller("auth", 'Auth\AuthController');
Route::controller("packs","CartonesController");




Route::get("a/{numero}","CartonesController@getPack");
Route::get("a","CartonesController@getIndex");
Route::post("a","CartonesController@postPack");


Route::get('app', function() {
    return view('master');
});

Route::get('pruebas', function()
{
    return view("carton");
});

// Route::get('a', function()
// {
//     return view("app.registro_cartones");
// });

