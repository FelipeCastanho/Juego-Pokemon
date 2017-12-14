<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArtificialController extends Controller
{
    public function perfil(Request $request){
        
        return view("EntrenadorArtificial.perfil");
    }
}
