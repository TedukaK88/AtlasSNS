<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function profile(){
        $user = auth()->user();
        return view('users.profile',['user'=>$user]);
    }
    public function search(){
        $user = auth()->user();
        return view('users.search',['user'=>$user]);
    }

    //logout
    public function getLogout(){
        Auth::logout();
        return redirect()->view('login');
    }
}
