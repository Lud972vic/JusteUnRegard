<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your main screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/main';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function loginJur(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            //recuperer l 'utlisateur connecté
            $user = Auth::user();

            if ($user->hasRole('Administrateur')) {
                //Si l utilisateur est admin, redirection vers le bakcend
                return redirect()->route('gestiondesutilisateurs');
            } else {
                //Si l'utilisateur n'est pas admin
                return redirect()->route('index');
            }
        } else {
            return redirect()->route('login')->with('messages', 'Impossible de vous identifer !');
        }
    }
}
