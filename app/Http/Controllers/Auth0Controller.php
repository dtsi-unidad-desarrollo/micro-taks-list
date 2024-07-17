<?php
namespace App\Http\Controllers;

use Auth0\SDK\Auth0;
use Illuminate\Http\Request;

class Auth0Controller extends Controller
{
    public function callback(Request $request)
    {
        $auth0 = new Auth0(config('auth0'));

        $userInfo = $auth0->getUser();

        if (!$userInfo) {
            return redirect('/login')->withErrors('Authentication failed.');
        }

        // Procesa la información del usuario y lo autentica

        return redirect()->intended('/dashboard');
    }

    public function logout()
    {
        $auth0 = new Auth0(config('auth0'));
        $auth0->logout();

        return redirect('/login');
    }
}
