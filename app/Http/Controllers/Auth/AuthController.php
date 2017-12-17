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

    /**
     * Redirect the user to the OAuth Provider.
     *
     * @return Response
     */
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from provider.  Check if the user already exists in our
     * database by looking up their provider_id in the database.
     * If the user exists, log them in. Otherwise, create a new user then log them in. After that 
     * redirect them to the authenticated users homepage.
     *
     * @return Response
     */
    public function Callback($provider)
    {
        $user = Socialite::driver($provider)->user();

        $authUser = $this->findOrCreateUser($user, $provider);
        Auth::login($authUser, true);
        return redirect($this->redirectTo);
    }

    /**
     * If a user has registered before using social auth, return the user
     * else, create a new user object.
     * @param  $user Socialite user object
     * @param $provider Social auth provider
     * @return  User
     */
    public function findOrCreateUser($user, $provider)
    {
        $authUser = User::where('provider_id', $user->id)->first();
        if ($authUser) {
            return $authUser;
        }
        return User::create([
            'name'     => $user->name,
            'email'    => $user->email,
            'provider' => $provider,
            'provider_id' => $user->id
        ]);
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

    public function pokemonTeam($idEntrenador){
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
        $entrenador = Entrenador::entrenadorNickname($request->nickname)->get()->first();

        if(sizeOf($entrenador) == 0){
            $entrenador = new Entrenador();
            $entrenador->nickname = $request->nickname;
            $entrenador->save();

            $this->pokemonTeam($entrenador->id);

            $user = new User();
            $user->password = bcrypt($request->password);
            $user->idEntrenador = $entrenador->id;
            $user->imagenPerfil = 'pikachu-profile.jpg';
            $user->save();
            if (Auth::attempt(
                    [
                        'idEntrenador' => $entrenador->id,
                        'password' => $request->password,
                    ], true
                    )){
                return redirect('entrenador/perfil');
            }else{
                flash('Registro exitoso, por favor inicie sesión')->warning()->important();
                return redirect('/');
            }
        }else{
            flash('El usuario ya se encuentra registrado')->warning()->important();
            return redirect('/');
        }
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
