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
Route::controller("packs", "PacksController");




Route::get("a/{numero}", "PacksController@getPack");
Route::get("a", "PacksController@getIndex");
Route::post("a", "PacksController@postPack");


Route::get('app', function() {
    return view('master');
});