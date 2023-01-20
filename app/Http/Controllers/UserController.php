<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    //
    public function index(){
        return 'Hello World';
    }
    public function login(){
        if (View::exists('user.login')) {
           return view('user.login');
        }
        // return response()->view('errors.404');
        return abort(404);
    }
    public function register(){
        return view('user.register');
    }

    public function show($id){
        return $id;
    }
}
