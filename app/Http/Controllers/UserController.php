<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Entrenador;
use App\Pokemon;
use App\Batallas;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(){
		$entrenadores = Entrenador::all();
    	return response()->json($entrenadores);
    }

    public function store(Request $request){}

    public function show($id){
		$entrenador = Entrenador::find($id);
		$user = User::findUser($id)->get();
		$pokemon = Pokemon::EntrenadorPokemon($id)->get();
        if($entrenador){
            return response()->json(['Entrenador'=> $entrenador, 'Usuario'=>$user, 'Pokemon'=> $pokemon], 200);
        }else{
            return response()->json('Usuario no encontrado', 404);
        }
    }

    public function update(){}

    public function destroy($id){}

}
