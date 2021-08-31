<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Events\NewUserWasRegistered;
use App\Http\Controllers\Controller;
use App\Src\DataBase\CheckConnection;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        
        $user = new User;
        $user->name = strtoupper($data['name']);
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->type_user_id = 1;
        /**
         * TODO 
         * Corregir en como asignar la compañía a la cual
         * pertenece el Usuario - Hacerlo dinánico
         */
        $user->company_id = 1;
        $user->save();
        $user->refresh();

        $user->addDefaultAvatar();
        
        $user->thumb = $user->getMedia('avatar')->first()->getUrl();

        $user->image = $user->getMedia('avatar')->first()->getUrl('thumb');
        
        return $user;

    }

    public function create_remote_user($data)
    {
        $user = new User;

        $user->setConnection('mysql2');
        $user->name = strtoupper($data['name']);
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->type_user_id = 1;
        
        $user->company_id = 1;
        $user->save();

    }

    public function register(Request $request)
    {
        $validation = $this->validator($request->all());

        if ($validation->fails()) {
            return response()->json($validation->errors(), 200);

        }
        
        $user = $this->create($request->all());
        
        $checkConnection = new CheckConnection;

        if ($checkConnection->hasConnectionWithMsql2()) {
            
            $this->create_remote_user($request->all());
        }
        
        event(new Registered($user));
        event(new NewUserWasRegistered($user));

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }

    public function registered(Request $request, $user)
    {
        return Redirect::route('login')->with( ['authenticated' => "Ingrese sus credenciales para sus primer inicio de sesión."] );
    }
}
