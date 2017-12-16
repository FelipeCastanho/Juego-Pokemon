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
        ini_set('max_execution_time', 180);
        $id = Auth::User()->idEntrenador;
    	$entrenador = User::find(Auth::User()->id);
    	$batallas = Batalla::all()->where('idEntrenadorHumano', $id);

        $base = 'http://pokeapi.co/api/v2/';
        $pokemons = Pokemon::entrenadorPokemon($id)->get();
        $urlsImagenes = array();
        $habilidades = array();
        foreach ($pokemons as $pokemon) {
            $data = file_get_contents($base.'pokemon/'.$pokemon->numeroPokemon.'/');
            $pokemondata = json_decode($data);
            $imagenes = $pokemondata->sprites;
            array_push($urlsImagenes, $imagenes->front_default);

            $movedata = file_get_contents($base.'move/'.$pokemon->idHabilidad1.'/');
            $hability = json_decode($movedata);
            array_push($habilidades, $hability->name);

            $movedata = file_get_contents($base.'move/'.$pokemon->idHabilidad2.'/');
            $hability = json_decode($movedata);
            array_push($habilidades, $hability->name);

            $movedata = file_get_contents($base.'move/'.$pokemon->idHabilidad3.'/');
            $hability = json_decode($movedata);
            array_push($habilidades, $hability->name);

            $movedata = file_get_contents($base.'move/'.$pokemon->idHabilidad4.'/');
            $hability = json_decode($movedata);
            array_push($habilidades, $hability->name);
        }

        return view("Entrenador.perfil")->with('entrenador', $entrenador)->with('batallas', $batallas)->with('imagenes',$urlsImagenes)->with('habilidades',$habilidades);
    }

    public function index(){
        return View('Entrenador.home');
    }
}
