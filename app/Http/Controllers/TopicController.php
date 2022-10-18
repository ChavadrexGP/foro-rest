<?php

namespace App\Http\Controllers;

use App\Models\Topic;
//use Illuminate\Support\Facades\DB;

class TopicController extends Controller
{
    public function index(){
        return Topic::paginate();
        //return DB::select("SELECT * FROM users");
    }
}