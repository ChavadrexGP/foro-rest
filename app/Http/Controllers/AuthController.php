<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $r){
        $this->validate($r, [
            'username' => 'required',
            'password' => 'required'
        ]);

        $u = User::where('username', $r->username)->first();
        
        if(!Hash::check($r->password, $u->password)){
            return response()->json(['msg' => 'error'],401);
        }
        $token = JWT::create($u, env('JWT_SECRET_KEY'), env('JWT_EXPIRE'));
        return response()->json(['user'=>$u, 'token'=>$token]);
    }
}