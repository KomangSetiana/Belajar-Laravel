<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index ()
    {
        return view ('login.index',[
        'tittle' => 'Login',
        'active' => 'login'
        ]);
    }
public function authenticate(Request $request)
{
    $credencials = $request->validate([
        'email'=> 'required|email',
        'password' => 'required'
    ]);

    if(Auth::attempt($credencials)) {
        $request->session()->regenerate();
        return redirect()->intended('/dasboard');
    }

    return back()->with('LoginError','Login Failed!');
}
public function logout( Request $request)
{
Auth::logout();
$request->session()->invalidate();
$request->session()->regenerateToken();
return redirect('/');
}
}
