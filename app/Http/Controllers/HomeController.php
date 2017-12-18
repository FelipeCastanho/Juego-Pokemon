<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;

class HomeController extends Controller
{
    public function __construct(){
    	$this->middleware('guest');
    }

    public function home(){
        return View('Home.Home');
    }

    public function acercade(){
        return View('Home.acercade');
    }
}
