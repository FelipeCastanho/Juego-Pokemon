<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Entrenador;
use App\Pokemon;
use App\Batalla;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(){
		return view("API.api");
    }

    public function store(Request $request){}

    public function show(Request $request){
		$entrenador = Entrenador::find($request->entrenador);
		$user = User::findUser($request->entrenador)->get();
		$pokemon = Pokemon::EntrenadorPokemon($request->entrenador)->get();
        $batallas = Batalla::EntrenadorHumano($request->entrenador)->get();
        if($entrenador){
            return response()->json(['Entrenador'=> $entrenador, 'Usuario'=>$user, 'Pokemon'=> $pokemon, 'Batallas' => $batallas], 200);
        }else{
            return response()->json('Usuario no encontrado', 404);
        }
    }

    public function update(){}

    public function destroy($id){}

}
