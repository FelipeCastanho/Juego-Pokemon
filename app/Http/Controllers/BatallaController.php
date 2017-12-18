<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Batalla;
use App\Pokemon;
use App\Entrenador;
use App\EntrenadorArtificial;
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
    public function interaccion(Request $request){
    	$usuario = Auth::User();
    	$id = $usuario->idEntrenador;
    	$jugadas = [$request->p1, $request->p2, $request->p3, $request->p4,
    				$request->p5, $request->p6];
    	$jugadasCompletas = true;
    	$dificultad = $request->dificultad;
    	if($dificultad == "") {
    		$dificultad = "Aprendiz";
    	}
    	/*for($i = 0; $i < 6; $i++){
    		if($jugadas[$i]==0){
    			$jugadasCompletas = false;
    			break;
    		}
    	}*/
    	if($jugadasCompletas){
    		//Se escoge contrincante
    		$contrincantes = EntrenadorArtificial::all()->where('dificultad',$dificultad);
    		$indice = rand(1,sizeof($contrincantes))-1;
    		$contador = 0;
    		$contrincanteSeleccionado = null;
    		foreach ($contrincantes as $contrincante) {
    			if($contador == $indice){
    				$contrincanteSeleccionado = $contrincante;
    				break;
    			}
    			$contador = $contador +1;
    		}
    		//dd($contrincanteSeleccionado->Entrenador->nickname);
    		//Se escogen jugadas del contrincante -> Por ahora aleatorio hasta que Aleja lo haga

    		$jugadasArtificial = [rand(1,3),rand(1,3),rand(1,3),rand(1,3),rand(1,3),rand(1,3)];
    		//Se valida ganador
    		$resultado = 0;
    		for($j = 0; $j < 6; $j++){
    			$resultado = $resultado + $this->validar($jugadas[$j], $jugadasArtificial[$j]);
    		}
    		//Se guarda el registro
    		$batalla = new Batalla();
    		$batalla->idEntrenadorHumano = $id;
    		$batalla->idEntrenadorArtificial = $contrincanteSeleccionado->entrenador->id;
    		$batalla->fecha = date("Y-m-d H:i:s", time());
    		$stringResultado = "";
    		if($resultado > 0){
    			$stringResultado = "Ganaste";
    			$usuario->cbg = $usuario->cbg + 1;
    			$usuario->save();
    		} 
    		else if($resultado < 0) $stringResultado = "Perdiste";
    		else $stringResultado = "Empataste";
    		$batalla->resultado = $stringResultado;
    		$batalla->save();
    		//Se informa
			dd($resultado);
    	}
    	else{
    		flash('Todos los Pokemon deben tener una opción')->warning()->important();
            return redirect('/batalla');
    	}
    	
    }

    public function validar($jugadaJ1, $jugadaJ2){
    	if($jugadaJ1==$jugadaJ2)return 0;
    	else if($jugadaJ1 == 1 && $jugadaJ2 == 3) return 1;
    	else if($jugadaJ1 == 1 && $jugadaJ2 == 2) return -1;
    	else if($jugadaJ1 == 2 && $jugadaJ2 == 1) return 1;
    	else if($jugadaJ1 == 2 && $jugadaJ2 == 3) return -1;
    	else if($jugadaJ1 == 3 && $jugadaJ2 == 2) return 1;
    	else if($jugadaJ1 == 3 && $jugadaJ2 == 1) return -1;
    	return 0;
    	//Si se pierde devuelve un -1 si se gana devuelve un 1, si es empate devuelve un 0
    }
}