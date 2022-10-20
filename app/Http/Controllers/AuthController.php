<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request){
        $this -> validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

        $u = User::where('username', $request -> username) -> first();

        if(!Hash::check($request -> password, $u -> password)){
            return response() -> json(['msg' => 'error'], 401);
        }

        $token = JWT::create($u, env('JWT_SECRET_KEY'), env('JWT_EXPIRE'));
        return response() -> json(['user' => $u, 'token' => $token]);

    }
}