<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\TipoUsuario;
use App\User;
use Socialite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SocialAuthController extends Controller
{
    // Metodo encargado de la redireccion a Facebook
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
    
    // Metodo encargado de obtener la información del usuario
    public function handleProviderCallback($provider)
    {
        // Obtenemos los datos del usuario
        $social_user = Socialite::driver($provider)->user(); 
        // Comprobamos si el usuario ya existe
        if ($user = User::where('email', $social_user->email)->first()) { 
            return $this->authAndRedirect($user); // Login y redirección
        } else {  

            $tipo = TipoUsuario::where('nombre', 'Usuario')->first();
            // En caso de que no exista creamos un nuevo usuario con sus datos.
            $user                  = New User();
            $user->nombre          = $social_user->name;
            $user->username        = str_random(6);
            $user->email           = $social_user->email;
            $user->tipo_usuario_id = $tipo->id;
            
            $user->save();


            return $this->authAndRedirect($user); // Login y redirección
        }
    }

    // Login y redirección
    public function authAndRedirect($user)
    {
        Auth::login($user);

        return redirect()->to('/');
    }
}