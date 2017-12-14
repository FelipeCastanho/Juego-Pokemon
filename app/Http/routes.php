<?php

Route::get('/', 'HomeController@home');


Route::post('Auth/register', 'Auth\AuthController@postRegister');

Route::get('entrenador/', 'EntrenadorController@index');

Route::get('entrenador/perfil', 'EntrenadorController@perfil');

Route::get('artificial/perfil', 'ArtificialController@perfil');