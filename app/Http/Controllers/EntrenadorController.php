<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Pokemon;
use App\Entrenador;
use App\Batalla;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers;
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
        $id = Auth::User()->idEntrenador;
    	$entrenador = User::find(Auth::User()->id);
    	$batallas = Batalla::all()->where('idEntrenadorHumano', $id);
        $nickname = Entrenador::find($id)->nickname;
        $pokemons = Pokemon::entrenadorPokemon($id)->get();
        $urlsImagenes = array();
        $habilidades = array();
        foreach ($pokemons as $pokemon) {
            array_push($urlsImagenes, "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/".$pokemon->numeroPokemon.".png");
            array_push($habilidades,$pokemon->nombreHabilidad1);
            array_push($habilidades,$pokemon->nombreHabilidad2);
            array_push($habilidades,$pokemon->nombreHabilidad3);
            array_push($habilidades,$pokemon->nombreHabilidad4);
        }
        return view("Entrenador.perfil")->with('entrenador', $entrenador)->with('batallas', $batallas)->with('imagenes',$urlsImagenes)->with('habilidades', $habilidades)->with('pokemon',$pokemons)->with('nickname',$nickname)->with('id',$id)->with('batallasGanadas',$entrenador->cbg);
    }

     public function editar(Request $request){
        $id = Auth::User()->id;
        $entrenador = User::find($id);
        $entrenador->nombre = $request->nombre;
        $entrenador->edad = $request->edad;
        $entrenador->sexo = $request->sexo;
        $entrenador->pais = $request->pais;
        $estado = false;
        if($request->password == $request->confirm){
            $entrenador->password = bcrypt($request->password);
        }else{
            $estado = true;
        }
        $path = public_path() . '/img/perfiles/';
        if($request->file('imagenPerfil'))
        {
            $imagenPerfil = $request->file('imagenPerfil');
            $perfilNombre = 'perfilEntrenador_' . time() . '.' . $imagenPerfil->getClientOriginalExtension();
            $imagenPerfil->move($path, $perfilNombre);
            $entrenador->imagenPerfil = $perfilNombre;
        }
        $entrenador->save();

        if($estado){
            flash('Las contraseñas no coinciden')->warning()->important();
            return redirect('/entrenador/perfil');
        }else{
            flash('Perfil actualizado correctamente')->success()->important();
            return redirect('/entrenador/perfil');
        }
        
    }

    public function editarPokemon(Request $request){
        $usuario = User::find(Auth::User()->id);
        $pokemon = Pokemon::find($request->pokemon);
        $wins = $usuario->cbg;

        $numero = rand(1, 386);
        $data = file_get_contents('http://pokeapi.co/api/v2/pokemon/'.$numero.'/');
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
        $pokemon->numeroPokemon = $numero;
        $pokemon->nombreHabilidad1 = $movimientos[$movimientosSeleccionados[0]]->move->name;
        $pokemon->nombreHabilidad2 = $movimientos[$movimientosSeleccionados[1]]->move->name;
        $pokemon->nombreHabilidad3 = $movimientos[$movimientosSeleccionados[2]]->move->name;
        $pokemon->nombreHabilidad4 = $movimientos[$movimientosSeleccionados[3]]->move->name;
        $pokemon->tipo = $pokemondata->types[0]->type->name;
        $pokemon->nombre = $pokemondata->name;
        $pokemon->save();

        $usuario->cbg = $wins-10;
        $usuario->save();

        return redirect('/entrenador/perfil');
    }

    public function index(){
        return View('Entrenador.home');
    }

    public function acercade(){
        return View('Entrenador.acercade');
    }
}
