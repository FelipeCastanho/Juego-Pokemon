<?php

Route::get('/', 'HomeController@home');

Route::post('Auth/register', 'Auth\AuthController@postRegister');