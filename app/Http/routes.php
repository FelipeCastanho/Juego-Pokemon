<?php

Route::get('/', 'HomeController@home');


Route::post('Auth/register', 'Auth\AuthController@postRegister');

Route::post('Auth/login', 'Auth\AuthController@postLogin');
Route::get('Auth/logout', 'Auth\AuthController@getLogout');

Route::get('entrenador/', 'EntrenadorController@index');

Route::get('entrenador/perfil', 'EntrenadorController@perfil');
Route::get('entrenador/login', 'EntrenadorController@login');

Route::get('artificial/perfil', 'ArtificialController@perfil');

Route::get('artificial/registro', 'ArtificialController@registro');