<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() 
    {
        return view ('register.index',[
            'tittle' => 'Register',
            'active' => 'register'
        ]);
    }
    public function store( Request $request)
    {
       $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required','min:3','max:200','unique:users'],
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:100'

        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        //$validatedData['password'] = bycript($validatedData['passoword']);
        User::create($validatedData);

        // $request->session()->flash('success','Register successfull!, Please Login');
        return redirect('/login')->with('success','Register successfull!, Please Login');
    }
}
