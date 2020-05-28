<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::check()) {
            // The user is logged in...
            return view('home.'.Auth::user()->Rol->nombre);
        }else{
            return view('welcome');
        }
    }

    public function empresa(){
        return 'empresa';
    }
    public function gestor(){
        return 'gestor';
    }
    public function camarero(){
        return 'camarero';
    }
    public function cocinero(){
        return 'cocinero';
    }
}
