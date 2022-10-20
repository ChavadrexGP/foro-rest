<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function index(){
        return Topic::paginate();
    }

    public function show($id){
        $topic = Topic::find($id);
        if(!$topic){
            return response()->json(["message"=>"failed"], 404);
        }
        return $topic;
    }

    public function store(Request $request){
        $topic = new Topic;
        $r = $topic->fill($request->all())->save();
        if(!$r){
            return response()->json(["message"=>"failed"], 404);
        }
        return $topic;
    }

    public function update(Request $request, $id){
        $topic = Topic::find($id);
        if(!$topic){
            return response()->json(["message"=>"failed"], 404);
        }
        $r = $topic->fill($request->all())->save();
        if(!$r){
            return response()->json(["message"=>"failed"], 404);
        }
        return $topic;
    }

    public function destroy($id){
        $topic = Topic::find($id);
        if(!$topic){
            return response()->json(["message"=>"failed"], 404);
        }
        $topic->delete();
        return response()->json(["message"=>"success"]);
    }
}