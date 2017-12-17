<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Entrenador;
use App\EntrenadorArtificial;
use App\Pokemon;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArtificialController extends Controller
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
        
        return view("EntrenadorArtificial.perfil");
    }

    public function registro(Request $request){
        $id = Auth::User()->idEntrenador;
        $ea = EntrenadorArtificial::all()->where('idDueno', $id);

        $nombres = array();
        $data = file_get_contents('http://pokeapi.co/api/v2/pokemon/?limit=386');
        $pokemondata = json_decode($data);
        $pokemonsinfo = $pokemondata->results;

        $contador = 1;
        foreach ($pokemonsinfo as $pokemoninfo) {
            array_push($nombres, [$contador,$pokemoninfo->name]);
            $contador += 1;
        }

        return view("EntrenadorArtificial.lista")->with('lista',$ea)->with('nombres',$nombres);
    }

    public function pokemonHabilities($idPokemon, $idEntrenador){
        ini_set('max_execution_time', 180);
        $base = 'http://pokeapi.co/api/v2/pokemon/';
        $data = file_get_contents($base.$idPokemon.'/');
        $pokemondata = json_decode($data);
        $movimientos = $pokemondata->moves;

        $max = sizeof($movimientos)-1;
        $x = 0;
        $movimientosSeleccionados = array();
        while ($x<4) {
          $num_aleatorio = rand(1,$max);
          if (!in_array($num_aleatorio,$movimientosSeleccionados)) {
            array_push($movimientosSeleccionados,$num_aleatorio);
            $x++;
          }
        }
        $pokemon = new Pokemon();
        $pokemon->idEntrenador = $idEntrenador;
        $pokemon->numeroPokemon = $idPokemon;
        $pokemon->nombreHabilidad1 = $movimientos[$movimientosSeleccionados[0]]->move->name;
        $pokemon->nombreHabilidad2 = $movimientos[$movimientosSeleccionados[1]]->move->name;
        $pokemon->nombreHabilidad3 = $movimientos[$movimientosSeleccionados[2]]->move->name;
        $pokemon->nombreHabilidad4 = $movimientos[$movimientosSeleccionados[3]]->move->name;
        $pokemon->tipo = $pokemondata->types[0]->type->name;
        $pokemon->nombre = $pokemondata->name;
        $pokemon->save();
    }

    public function pokemonTeam($idPokemons,$idEntrenador){

        foreach ($idPokemons as $idPokemon) {
            $this->pokemonHabilities($idPokemon,$idEntrenador);
        }
    }

    public function registrar(Request $request){
        $entrenador = new Entrenador();
        $entrenador->nickname = $request->nombre;
        $entrenador->save();

        $this->pokemonTeam($request->chose,$entrenador->id); 

        $id = Auth::User()->idEntrenador;
        $ea = new EntrenadorArtificial();
        $ea->dificultad = $request->dificultad;
        $ea->idEntrenador = $entrenador->id;
        $ea->idDueno = $id;
        $ea->save();

        return redirect('artificial/registro');
    }
}
