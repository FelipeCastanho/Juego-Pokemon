<?php

Route::get('/', 'HomeController@home');
Route::get('/home', 'HomeController@home');


Route::post('Auth/register', 'Auth\AuthController@postRegister');
Route::get('Auth/register', 'Auth\AuthController@getRegister');

Route::get('Auth/login', 'Auth\AuthController@getLogin');
Route::post('Auth/login', 'Auth\AuthController@postLogin');
Route::get('Auth/logout', 'Auth\AuthController@getLogout');

Route::get('entrenador/', 'EntrenadorController@index');

Route::get('entrenador/perfil', 'EntrenadorController@perfil');
Route::post('entrenador/editar', 'EntrenadorController@editar');
Route::get('entrenador/editarPokemon/{pokemon}', [ 'uses' => 'EntrenadorController@editarPokemon', 'as' => 'entrenador/editarPokemon']);

Route::post('artificial/perfil', 'ArtificialController@perfil');
Route::get('artificial/perfil', 'ArtificialController@perfil');
Route::post('artificial/modificar', 'ArtificialController@modificar');

Route::get('artificial/registro', 'ArtificialController@registro');
Route::post('artificial/registrar', 'ArtificialController@registrar');

Route::get('Auth/{provider}', 'Auth\AuthController@redirectToProvider');
Route::get('Auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');

Route::get('batalla', 'BatallaController@index');

Route::resource('api/users', 'UserController');