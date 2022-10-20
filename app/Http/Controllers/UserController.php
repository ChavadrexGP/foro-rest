<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return User::paginate();
    }

    public function show($id){
        $user = User::find($id);
        if(!$user){
            return response()->json(["message"=>"failed"], 404);
        }
        return $user;
    }

    public function store(Request $request){
        $user = new User;
        $r = $user->fill($request->all())->save();
        if(!$r){
            return response()->json(["message"=>"failed"], 404);
        }
        return $user;
    }

    public function update(Request $request, $id){
        $user = User::find($id);
        if(!$user){
            return response()->json(["message"=>"failed"], 404);
        }
        $r = $user->fill($request->all())->save();
        if(!$r){
            return response()->json(["message"=>"failed"], 404);
        }
        return $user;
    }

    public function destroy($id){
        $user = User::find($id);
        if(!$user){
            return response()->json(["message"=>"failed"], 404);
        }
        $user->delete();
        return response()->json(["message"=>"success"]);
    }
}