<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(){
        $age = request('age');
        $location = request('location');
        $name = request('name');

        if($age && $location && $name){
            $users = User::with('posts')->where('age', $age)->where('location', $location)->where('name', $name)->get();
        }elseif($age && $location){
            $users = User::with('posts')->where('age', $age)->where('location', $location)->get();
        }elseif($age && $name){
            $users = User::with('posts')->where('age', $age)->where('name', $name)->get();
        }elseif($location && $name){
            $users = User::with('posts')->where('location', $location)->where('name', $name)->get();
        }
        elseif($age){
            $users = User::with('posts')->where('age', $age)->get();
        }elseif($location){
            $users = User::with('posts')->where('location', $location)->get();
        }elseif($name){
            $users = User::with('posts')->where('name', $name)->get();
        }else{
            $users = User::all();
        }
        return $users;
    }
}
