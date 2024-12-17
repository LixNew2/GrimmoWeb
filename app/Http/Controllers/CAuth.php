<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Str;

class CAuth extends Controller
{
    //Get
    public function show_login(){
        return view('login.login');
    }

    public function show_signup(){
        return view('signup.signup');
    }

    //Post
    public function login(Request $request){
        $user = User::where('email', $request->email_input)->first();

        if ($user && Hash::check($request->password_input, $user->password)) {
            Auth::login($user);
            $request->session()->regenerate();

            session(['user_last_name' => $user->name]);
            session(['user_first_name' => $user->prenom]);
            session(['user_uuid' => $user->uuid]);
            session(['user_type' => $user->type]);

            return redirect('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function signup(Request $request){

        $uuid4 = Str::uuid();
        $name = $request->input('last_name');
        $prenom = $request->input('first_name');
        $email = $request->input('email_input');
        $tel = $request->input('tel_input');
        $password = $request->input('password_input');

        User::create([
            'name' => $name,
            'prenom' => $prenom,
            'email' => $email,
            'password' => bcrypt($password),
            'tel' => $tel,
            'uuid' => $uuid4,
            'type' => 1
        ]);

        return redirect('/login');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
