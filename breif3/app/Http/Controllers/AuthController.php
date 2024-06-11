<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function getRegister()
    {
        return view('register'); // Retournez la vue d'inscription
    }

    public function postRegister(Request $request)
    {
        // Validez et créez l'utilisateur
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:8|max:255|confirmed',
        ]);

        // Créer l'utilisateur
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Connectez l'utilisateur après son inscription
        Auth::login($user);

        // Redirigez vers la page de tableau de bord ou une autre page
        return redirect()->route('login');
    }

    public function getLogin()
    {
        return view('welcome'); // Retournez la vue de connexion
    }

    public function postLogin(Request $request)
    {
        // Validez les informations d'identification
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Connectez l'utilisateur
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            // Redirigez vers la page de tableau de bord ou une autre page
            return redirect()->intended('dashboard');
        }

        // Si l'authentification échoue, redirigez vers la page de connexion avec un message d'erreur
        return back()->withErrors([
            'email' => 'Les informations d\'identification fournies ne correspondent pas à nos enregistrements.',
        ]);
    }

    public function logout()
    {
        Auth::logout(); // Déconnectez l'utilisateur
        return redirect()->route('auth.getLogin'); // Redirigez vers la page de connexion
    }
}
