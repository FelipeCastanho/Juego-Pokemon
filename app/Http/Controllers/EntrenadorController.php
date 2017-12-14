<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Pokemon;
use App\Batalla;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class EntrenadorController extends Controller
{
    public function perfil(Request $request){
    	$entrenador = User::find(1);
    	$listaPokemon = Pokemon::all()->where('idEntrenador', 1);
    	$batallas = Batalla::all()->where('idEntrenadorHumano', 1);
    	//dd($entrenador);
        return view("Entrenador.perfil")->with('entrenador', $entrenador)->with('listaPokemon', $listaPokemon)->with('batallas', $batallas);
    }

    public function index(){
        return View('Entrenador.home');
    }
}
