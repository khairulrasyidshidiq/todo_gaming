<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request) 
    {   
        
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
            
        ]);
        

 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard')->with('oop','a');
        }
 

        return back()->with('error','a');   
    }

    // disini euy
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        alert()->warning('Success','Berhasil logout!');
        return redirect('/');

    }
}
