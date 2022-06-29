<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        $error = $request->session()->get('error');
        return view('admin.login', compact('error'));
    }

    public function loginAction(Request $request)
    {
        $creds = $request->only('email', 'password');

        if (Auth::attempt($creds)) {
            return redirect()->route('admin.index');
        } else {
            $request->session()->flash('error', 'E-mail e/ou senha inválidos!');
            return redirect()->route('login');
        }
    }

    public function register(Request $request)
    {
        $error = $request->session()->get('error');
        return view('admin.register', compact('error'));
    }

    public function registerAction(Request $request)
    {
        $creds = $request->only('name', 'email', 'password');
        $hasEmail = User::where('email', $creds['email'])->count();

        if ($hasEmail !== 0) {
            $request->session()->flash('error', 'E-mail já cadastrado!');
            return redirect()->route('admin.register');
        }

        $newUser = new User();
        $newUser->name = $creds['name'];
        $newUser->email = $creds['email'];
        $newUser->password = password_hash($creds['password'], PASSWORD_DEFAULT);
        $newUser->save();

        Auth::login($newUser);
        return redirect()->route('admin.index');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.index');
    }

}
