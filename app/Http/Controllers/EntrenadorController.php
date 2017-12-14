<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class EntrenadorController extends Controller
{
    public function perfil(Request $request){
    	$entrenador = User::find(1);
        return view("Entrenador.perfil")->with('entrenador', $entrenador);
    }

    public function index(){
        return View('Entrenador.home');
    }
}
