<?php

Route::get('/', 'HomeController@home');

Route::get('Auth/register', 'Auth\AuthController@getRegister');
Route::post('Auth/register', 'Auth\AuthController@postRegister');