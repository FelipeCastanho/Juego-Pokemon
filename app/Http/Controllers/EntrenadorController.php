<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Pokemon;
use App\Batalla;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class EntrenadorController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $userActual = Auth::User();
        if($userActual == null){
                flash('No tiene los permisos necesarios')->error()->important();
                return redirect('/');
        }
    }

    public function perfil(Request $request){
        $id = Auth::User()->idEntrenador;
    	$entrenador = User::find(Auth::User()->id);
    	$batallas = Batalla::all()->where('idEntrenadorHumano', $id);

        $pokemons = Pokemon::entrenadorPokemon($id)->get();
        $urlsImagenes = array();
        $habilidades = array();
        foreach ($pokemons as $pokemon) {
            array_push($urlsImagenes, "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/".$pokemon->numeroPokemon.".png");
            array_push($habilidades,$pokemon->nombreHabilidad1);
            array_push($habilidades,$pokemon->nombreHabilidad2);
            array_push($habilidades,$pokemon->nombreHabilidad3);
            array_push($habilidades,$pokemon->nombreHabilidad4);
        }

        return view("Entrenador.perfil")->with('entrenador', $entrenador)->with('batallas', $batallas)->with('imagenes',$urlsImagenes)->with('habilidades', $habilidades);
    }

    public function index(){
        return View('Entrenador.home');
    }
}
