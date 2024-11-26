<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function showLoginForm ()
    {
        return view('auth.login');
    }

    public function showRegisterForm ()
    {
        return view('auth.register');
    }

    public function login (Request $request)
    {
        if (Auth::attempt($request->only('email', 'password')))
        {
            $request->session()->regenerate();
            return redirect()->intended();
        }

        return back()->withErrors([
            'email' => 'Les information d’identification ne correspondent pas.'
        ]);
    }

    public function register (Request $request)
    {

        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|unique:users,email',
            'password' => 'required|string|min:8',
        ]);


        $user = User::create([
            'name' => $validatedData['nom'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        return redirect('/login')->with(['successRegister', 'Vous Pouvez Connecter maintenant .']);
    }

    public function logout (Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('showLoginForm');
    }
}
