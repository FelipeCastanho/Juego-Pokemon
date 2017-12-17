<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Entrenador;
use App\EntrenadorArtificial;
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
        return view("EntrenadorArtificial.lista")->with('lista',$ea);
    }

    public function registrar(Request $request){
        $entrenador = new Entrenador();
        $entrenador->nickname = $request->nombre;
        $entrenador->save();

        //$this->pokemonTeam($entrenador->id); Aqui vas tú :v
        $id = Auth::User()->idEntrenador;
        $ea = new EntrenadorArtificial();
        $ea->dificultad = $request->dificultad;
        $ea->idEntrenador = $entrenador->id;
        $ea->idDueno = $id;
        $ea->save();
        return redirect('artificial/registro');
    }
}
