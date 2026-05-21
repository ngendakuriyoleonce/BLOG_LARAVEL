<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
public function ShowSingUp(){
    if(Auth::check()){
        return redirect()->route('dashboard');

    }
        return view('auth.register');
}
public function SignUp(Request $request){  
$request->validate([
'name'=>'required|string|max:255',
'email'=>'required|email|unique:users,email',
'password'=>'required|min:6|confirmed',
]);
User::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>Hash::make($request->password),

        ]);
        return back()->with('success',"Inscription reussi ! e-mail de bienvenu a ete envoye");
}

public function ShowForLOGIN(){
    if(Auth::check()){
        return redirect()->route('dashboard');

    }
        return view('auth.login');
}
  public function login(request $request){
  $request->validate([
'email'=>'required|email',
'password'=>'required|string',
]);
    if (Auth::attempt($request->only("email","password"))) {
            $request->session()->regenerate();
 
            return redirect()->intended('dashboard');
        }
        return back()->withErrors([
            'email' =>'The provided credentials do not match our records.']);
  }

public function lougout(){
    Auth::logout();

    return redirect()->route('home');
}

}
