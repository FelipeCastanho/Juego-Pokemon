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
    		//Se escogen jugadas del contrincante 
    		//$jugadasArtificial = [rand(1,3),rand(1,3),rand(1,3),rand(1,3),rand(1,3),rand(1,3)];
    		$imprimir = [0,0,0,0,0,0];
    		for($k = 0; $k < 6; $k++){
	    		$imprimir[$k] = $this->jugadasSegunNivel($this->posicionVentaja($jugadas[$k]),$dificultad);
	    	}
	    	$jugadasArtificial = $imprimir;
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
			flash('Tu contrincante fue: ' . $contrincanteSeleccionado->entrenador->nickname . ' y '. $stringResultado 
		/*. ' Jugada 1 ' . $jugadas[0] . ' vs ' . $jugadasArtificial[0]
		. ' Jugada 2 ' . $jugadas[1] . ' vs ' . $jugadasArtificial[1]
		. ' Jugada 3 ' . $jugadas[2] . ' vs ' . $jugadasArtificial[2]
		. ' Jugada 4 ' . $jugadas[3] . ' vs ' . $jugadasArtificial[3]
		. ' Jugada 5 ' . $jugadas[4] . ' vs ' . $jugadasArtificial[4]
		. ' Jugada 6 ' . $jugadas[5] . ' vs ' . $jugadasArtificial[5]*/)->warning()->important();
            return redirect('/batalla');
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
    public function posicionVentaja($jugadaJ1){
    	if($jugadaJ1 == 1) return 2;
    	else if($jugadaJ1 == 2 ) return 3;
    	else if($jugadaJ1 == 3 ) return 1;
    	return 0;
    	//Si se pierde devuelve un -1 si se gana devuelve un 1, si es empate devuelve un 0
    }
    
    public function jugadasSegunNivel($posicionVentaja, $dificultad){
    	$intervalo = 0.3333;
    	if($dificultad == "Aprendiz") $intervalo -= -0.1;
    	if($dificultad == "Aficionado") $intervalo -= 0.05;
    	if($dificultad == "Profesional") $intervalo -= 0.1;
    	if($dificultad == "Leyenda") $intervalo -= 0.13;
    	$intervalos = [0,0];
    	if($posicionVentaja == 1) $intervalos[0] = 1 - (2*$intervalo);
    	else $intervalos[0] = $intervalo;
    	if($posicionVentaja == 2) $intervalos[1] = 1 - (2*$intervalo) + $intervalos[0];
    	else $intervalos[1] = $intervalo;
    	$randomFloat = rand(0, 10000) / 10000;
    	if($randomFloat < $intervalos[0]) return 1;
    	else if ($randomFloat <= $intervalos[1]) return 2;
    	else return 3;
    }
}