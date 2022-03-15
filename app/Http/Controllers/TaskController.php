<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index($id){
        return "hello:".$id;
    }

    public function url(){
        return route('task.index',['id'=>10]);
    }

}
