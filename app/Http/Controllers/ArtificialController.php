<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
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
        
        return view("EntrenadorArtificial.lista");
    }
}
