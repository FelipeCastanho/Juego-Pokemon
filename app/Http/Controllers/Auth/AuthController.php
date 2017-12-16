<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Entrenador;
use App\Pokemon;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Mail;
use Auth;
use Illuminate\Http\Request;
use Session;
use Input;
use Redirect;
use Socialite;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Log;
class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'getLogout']);
    }

    public function pokemonHabilities($idPokemon, $idEntrenador){
        $base = 'http://pokeapi.co/api/v2/pokemon/';
        $data = file_get_contents($base.$idPokemon.'/');
        $pokemondata = json_decode($data);
        $movimientos = $pokemondata->moves;

        $numbers = range(1, sizeof($movimientos)-1);
        shuffle($numbers);
        $movimientosSeleccionados = array_slice($numbers, 0, 4);

        $habilidades = array();

        foreach ($movimientosSeleccionados as $movimientoSeleccionado) {
            $url = $movimientos[$movimientoSeleccionado]->move->url;
            $split = preg_split('[/]', $url);
            $habilidad = $split[6];
            array_push($habilidades, $habilidad);
        }

        $pokemon = new Pokemon();
        $pokemon->idEntrenador = $idEntrenador;
        $pokemon->numeroPokemon = $idPokemon;
        $pokemon->idHabilidad1 = $habilidades[0];
        $pokemon->idHabilidad2 = $habilidades[1];
        $pokemon->idHabilidad3 = $habilidades[2];
        $pokemon->idHabilidad4 = $habilidades[3];
        $pokemon->save();
    }

    public function pokemonTeam($idEntrenador){
        $base = 'http://pokeapi.co/api/v2/pokemon/';
        $numbers = range(1, 386);
        shuffle($numbers);
        $pokemons = array_slice($numbers, 0, 5);
        array_push($pokemons, 25);

        foreach ($pokemons as $pokemon) {
            $this->pokemonHabilities($pokemon,$idEntrenador);
        }
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

     public function postRegister(Request $request){
        $entrenador = new Entrenador();
        $entrenador->nickname = $request->nickname;
        $entrenador->save();

        $this->pokemonTeam($entrenador->id);

        $user = new User();
        $user->password = bcrypt($request->password);
        $user->idEntrenador = $entrenador->id;
        $user->save();
        return redirect("entrenador/perfil");
    }

    

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function postLogin(Request $request){

        if($request->nickname != null && $request->password != null){

            $entrenador = Entrenador::entrenadorNickname($request->nickname)->get()->first();

            if(sizeOf($entrenador) != 0){

                if (Auth::attempt(
                        [
                            'idEntrenador' => $entrenador->id,
                            'password' => $request->password,
                        ], true
                        )){
                    return redirect('entrenador/perfil');
                }else{
                    flash('Contraseña incorrecta, intente de nuevo')->warning()->important();
                    return redirect('/');
                }

            }else{
                flash('El nombre de usuario o contraseña son incorrectos')->warning()->important();
                return redirect('/');
            }
        }else{
            flash('Debe ingresar los campos de nombre de usuario y contraseña')->error()->important();
            return redirect('/');
        }
    }
}
