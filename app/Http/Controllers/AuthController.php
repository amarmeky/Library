<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registerForm()
    {
        return view('Auth.register');
    }
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed'
        ]);
        $data['password'] = bcrypt($data['password']);
        User::create($data);
        return redirect(route('login.form'));
    }
    public function loginForm()
    {
        return view('Auth.login');
    }
    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            return redirect(route('books.all'));
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function logout(){
        Auth::logout();
    return redirect(route('login.form'));
    }
    public function allusers(){
        dd(User::all());
    }
}
