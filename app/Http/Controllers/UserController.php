<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
class UserController extends Controller
{
    public function login(){
        return view('login');
    }

    public function goto(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');
        $users = DB::table('users')->get();
        foreach($users as $user){
            if($user->name == $username){
                $posts = DB::select('select * from posts');
                echo '<a href = "/insert_form">Insert POST</a>.' . "<br>";
                return view('lists_posts',['posts'=>$posts]);
            }
        }
    }

    public function logout(){
        return view('login');
    }

    public function getUser(){
        $flights = User::all();
        foreach ($flights as $flight) {
            echo $flight->name . "<br>";
        }
    }

    public function show(){
        dd(User::all());
    }
    public function search(){
        return view('find_user');
    }
    public function find(Request $request){
        $id = $request->input('id');
        $name = $request->input('name');
        $class = $request->input('class');
        $users = User::all(); 
        foreach ($users as $user) {
            if($user->id == $id && $user->name == $name && $user->class == $class){
                $rs = DB::table('users')->where('id', 'LIKE', $id)->orderByDesc('id')->get();
                foreach($rs as $val){
                    echo "ID: " . $val->id . "<br>";
                    echo "Username: " . $val->name . "<br>";
                    echo "Class: ". $val->class . "<br>";
                }
            }
        }
    }
}
