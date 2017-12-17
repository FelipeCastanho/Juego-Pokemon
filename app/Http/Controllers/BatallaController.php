<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Pokemon;
use App\Entrenador;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class BatallaController extends Controller
{
    public function index(){

    	$pokemons = Pokemon::entrenadorPokemon(Auth::User()->idEntrenador)->get();
    	$urlsImagenes = array();
    	foreach ($pokemons as $pokemon) {
            array_push($urlsImagenes, "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/".$pokemon->numeroPokemon.".png");
        }
        return View('Batallas.index')->with('imagenes',$urlsImagenes);
    }
}