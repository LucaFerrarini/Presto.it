<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
   public function homepage() {
        return view('welcome');
    }

    public function register() {
        return view('Auth.register');
    }

    public function login() {
        return view('Auth.login');
    }
}
