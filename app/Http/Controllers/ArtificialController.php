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
        $entrenador = Entrenador::find($request->id);
        $pokemons = Pokemon::entrenadorPokemon($request->id)->get();
        $urlsImagenes = array();
        $habilidades = array();
        foreach ($pokemons as $pokemon) {
            array_push($urlsImagenes, "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/".$pokemon->numeroPokemon.".png");
            array_push($habilidades,$pokemon->nombreHabilidad1);
            array_push($habilidades,$pokemon->nombreHabilidad2);
            array_push($habilidades,$pokemon->nombreHabilidad3);
            array_push($habilidades,$pokemon->nombreHabilidad4);
        }
        return view("EntrenadorArtificial.perfil")->with('imagenes',$urlsImagenes)->with('habilidades',$habilidades)->with('pokemon',$pokemons)->with('entrenador',$entrenador);
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

        if(sizeof($request->chose) == 6){
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
        }else{
            flash('Debe escoger exactamente 6 pokemon')->warning()->important();
            return redirect('artificial/registro')->withInput();
        }
    }

    public function modificar(Request $request){
        $artificial = EntrenadorArtificial::find($request->idArtificial);
        $artificial->dificultad = $request->dificultad;
        $artificial->save();
        flash('Entrenador artificial modificado satisfactoriamente')->warning()->important();
        return redirect('artificial/registro')->withInput();
    }
}

