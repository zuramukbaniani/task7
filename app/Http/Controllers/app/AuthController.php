<?php

namespace App\Http\Controllers\app;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\User;
use Auth;

class AuthController extends Controller
{
    public function register(Request $request){
        $validateData = $request->validate([
            'name' => 'required|string|max:20',
            'email' => 'required|email|max:40|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);
        $validateData['password'] = bcrypt($request->password);
        $user = User::create($validateData);
        $accsessToken = $user->createToken('authToken')->accessToken;
        return response(['user' => $user, 'accessToken' => $accsessToken]);
    }
    public function login(Request $request){
        $loginData = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (!Auth()->attempt($loginData)){
            return response([
                'message' => 'invalid mail or password'
            ]);
        }
        $accsessToken = Auth::user()->createToken('authToken')->accessToken;
        return response(['user' => Auth::user(), 'access_token' => $accsessToken]);
    }
}
