<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function create(){
        return view('Auth.register');
    }
    public function loginForm(){
        return view('Auth.login');
    }

    public function register(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/login');
    }
    public function login(Request $request){

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        // $credentials = [
        //     'email' => $request->email,
        //     'password' => $request->password
        // ];
        if(Auth::attempt($request->only(['email','password']))){
            if(auth()->user()->isAdmin){
                return redirect('/admin');
            }
            return redirect('/');
        }
        return redirect('/login')->withErrors('error', 'login details are  not valid');
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }



}
