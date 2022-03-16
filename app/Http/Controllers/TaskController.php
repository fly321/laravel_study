<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class TaskController extends Controller
{
    public function index($id){
        echo Route::currentRouteAction(); //App\Http\Controllers\TaskController@index
        return "hello:".$id;
    }

    public function url(){
        return redirect()->route('task.index',['id'=>10]);
    }

}
