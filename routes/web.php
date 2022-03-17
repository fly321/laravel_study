<?php

use App\Http\Controllers\Blog;
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

/**
 *
|        | GET|HEAD  | blog                | blog.index      | App\Http\Controllers\Blog@index                            | web                                      |
|        | POST      | blog                | blog.store      | App\Http\Controllers\Blog@store                            | web                                      |
|        | GET|HEAD  | blog/{blog}         | blog.show       | App\Http\Controllers\Blog@show                             | web                                      |
|        | PUT|PATCH | blog/{blog}         | blog.update     | App\Http\Controllers\Blog@update                           | web                                      |
|        | DELETE    | blog/{blog}         | blog.destroy    | App\Http\Controllers\Blog@destroy                          | web                                      |

 */
// Route::apiResource('blog',Blog::class);

// 资源路由嵌套
/**
|        | GET|HEAD  | blog/{blog}/nba            | blog.nba.index   | App\Http\Controllers\Nba@index                             | web                                      |
|        | POST      | blog/{blog}/nba            | blog.nba.store   | App\Http\Controllers\Nba@store                             | web                                      |
|        | GET|HEAD  | blog/{blog}/nba/create     | blog.nba.create  | App\Http\Controllers\Nba@create                            | web                                      |
|        | GET|HEAD  | blog/{blog}/nba/{nba}      | blog.nba.show    | App\Http\Controllers\Nba@show                              | web                                      |
|        | PUT|PATCH | blog/{blog}/nba/{nba}      | blog.nba.update  | App\Http\Controllers\Nba@update                            | web                                      |
|        | DELETE    | blog/{blog}/nba/{nba}      | blog.nba.destroy | App\Http\Controllers\Nba@destroy                           | web                                      |
|        | GET|HEAD  | blog/{blog}/nba/{nba}/edit | blog.nba.edit    | App\Http\Controllers\Nba@edit                              | web                                      |
|        | GET|HEAD  | index                      | localhost.index  | Closure                                                    | web                                      |

 */
// Route::resource('blog.nba',\App\Http\Controllers\Nba::class);

/**
|        | GET|HEAD  | blog/{blog}/nba        | blog.nba.index  | App\Http\Controllers\Nba@index                             | web                                      |
|        | POST      | blog/{blog}/nba        | blog.nba.store  | App\Http\Controllers\Nba@store                             | web                                      |
|        | GET|HEAD  | blog/{blog}/nba/create | blog.nba.create | App\Http\Controllers\Nba@create                            | web                                      |
|        | GET|HEAD  | index                  | localhost.index | Closure                                                    | web                                      |
|        | GET|HEAD  | nba/{nba}              | nba.show        | App\Http\Controllers\Nba@show                              | web                                      |
|        | PUT|PATCH | nba/{nba}              | nba.update      | App\Http\Controllers\Nba@update                            | web                                      |
|        | DELETE    | nba/{nba}              | nba.destroy     | App\Http\Controllers\Nba@destroy                           | web                                      |
|        | GET|HEAD  | nba/{nba}/edit         | nba.edit        | App\Http\Controllers\Nba@edit                              | web                                      |
 */
// Route::resource('blog.nba',\App\Http\Controllers\Nba::class)->shallow();

/**
|        | GET|HEAD  | blog/{blog}/nba        | a.b.c           | App\Http\Controllers\Nba@index                             | web                                      |
|        | POST      | blog/{blog}/nba        | blog.nba.store  | App\Http\Controllers\Nba@store                             | web                                      |
|        | GET|HEAD  | blog/{blog}/nba/create | blog.nba.create | App\Http\Controllers\Nba@create                            | web                                      |
|        | GET|HEAD  | index                  | localhost.index | Closure                                                    | web                                      |
|        | GET|HEAD  | nba/{nba}              | nba.show        | App\Http\Controllers\Nba@show                              | web                                      |
|        | PUT|PATCH | nba/{nba}              | nba.update      | App\Http\Controllers\Nba@update                            | web                                      |
|        | DELETE    | nba/{nba}              | nba.destroy     | App\Http\Controllers\Nba@destroy                           | web                                      |
|        | GET|HEAD  | nba/{nba}/edit         | nba.edit        | App\Http\Controllers\Nba@edit                              | web                                      |

 */
// Route::resource('blog.nba',\App\Http\Controllers\Nba::class)->shallow()->name('index','a.b.c');


# parameters blog/{blog}/nba 是前面的blog 不是{blog}
/**
|        | GET|HEAD  | blog/{bid}/nba        | a.b.c           | App\Http\Controllers\Nba@index                             | web                                      |
|        | POST      | blog/{bid}/nba        | blog.nba.store  | App\Http\Controllers\Nba@store                             | web                                      |
|        | GET|HEAD  | blog/{bid}/nba/create | blog.nba.create | App\Http\Controllers\Nba@create                            | web                                      |
|        | GET|HEAD  | index                 | localhost.index | Closure                                                    | web                                      |
|        | GET|HEAD  | nba/{nid}             | nba.show        | App\Http\Controllers\Nba@show                              | web                                      |
|        | PUT|PATCH | nba/{nid}             | nba.update      | App\Http\Controllers\Nba@update                            | web                                      |
|        | DELETE    | nba/{nid}             | nba.destroy     | App\Http\Controllers\Nba@destroy                           | web                                      |
|        | GET|HEAD  | nba/{nid}/edit        | nba.edit        | App\Http\Controllers\Nba@edit                              | web                                      |
 */
/*Route::resource('blog.nba',\App\Http\Controllers\Nba::class)->shallow()
    ->name('index','a.b.c')
    ->parameters([
        'blog'=>'bid',
        'nba'=>'nid'
    ]);*/



Route::get('nba/gg',[\App\Http\Controllers\Nba::class,'gg']);
Route::match(['post','put'],'nba/pp',[\App\Http\Controllers\Nba::class,'pp']);
