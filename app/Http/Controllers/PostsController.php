<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    // //register
    // public function register(){
    //     return view('auth.register');
    // }

    //home
    public function home(){
        return view('auth.login');
    }

    public function index(){
        return view('posts.index');
    }


    public function followList(){
        return view('posts.follow-list');
    }


    public function followerList(){
        return view('posts.follower-list');
    }
}
