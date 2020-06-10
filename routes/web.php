<?php

use Illuminate\Support\Facades\Route;
use App\User;
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
Route::get('/insert_posts', function(){
    DB::table('posts')->insert([
        [
            'title' => 'hello world',
            'content' => 'Content: xin chao the gioi' 
        ],
        [
            'title' => 'goodbye world',
            'content' => 'Content: tam biet the gioi' 
        ],
    ]);
});

Route::get('/update_posts', function(){
    DB::table('posts')->where('id', '=', 2)->update(['title' => 'xin chao the gioi 2']);
});
Route::get('/delete_posts', function(){
    DB::table('posts')->where('id', '=', 2)->delete();
});



Route::get('/first_posts', function(){
    $posts = DB::table('posts')->first();
    dd($posts);
});

Route::get('/select_posts', function(){
    $posts = DB::table('posts')->select('id', 'title', 'content')->get();
    dd($posts);
});

Route::get('/join_posts', function(){
    $posts = DB::table('posts')->join('comments', 'posts.id', '=', 'comments.post_id')->
    select('title', 'content', 'content_comment', 'posts.id')->get();
    dd($posts);
});

Route::get('/where', function(){
    $posts = DB::table('posts')->where('title', 'LIKE', '%hello%')
    ->where('id', 3)->get(); //and where. ->orwhere() || wherein('',[]): orwhere
    dd($posts);
});
Route::get('/orderBy', function(){
    $posts = DB::table('posts')->orderByDesc('title')->get();
    dd($posts);
});
Route::get('/insert_form', 'ListPostController@insertform');
Route::post('/create_posts', 'ListPostController@insert');

Route::get('/list_posts','ListPostController@index');
Route::get('delete/{id}','ListPostController@destroy');
Route::get('comment/{id}','ListPostController@comment');

Route::get('update/{id}','ListPostController@show');
Route::post('update/{id}','ListPostController@update');

Route::get('/loginto', 'UserController@login');
Route::post('/goto', 'UserController@goto');
Route::get('/logout','UserController@logout');

Route::get('/get_name', 'UserController@getUser');
Route::get('/get_user', 'UserController@show');
Route::get('/search', 'UserController@search');
Route::post('/find', 'UserController@find');

Route::get('/get1', function(){
    return User::find(1);
});