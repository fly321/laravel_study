<?php

use App\Http\Controllers\TaskController as TaskControllerAlias;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('index/{id}',\App\Http\Controllers\TaskController::class.'@index')->where('id','[0-9]+');
// Route::get('task/index/{id}',\App\Http\Controllers\TaskController::class.'@index')->name('task.index');
// Route::get('task/url',\App\Http\Controllers\TaskController::class.'@url')->name('task.url');

Route::name('task.')->prefix('task/')->group(function(){
    Route::get('index/{id}',[TaskControllerAlias::class,'index'])->name('index');
    Route::get('url',[TaskControllerAlias::class,'url'])->name('url');
});

Route::get('index',function(){
    // dump(Route::current());
    // return Route::currentRouteName(); //localhost.index
})->name('localhost.index');



