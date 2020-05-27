<?php

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
})->name('welcome');

//Route::get('/prueba',function(){
//    $user = \App\User::find(1);
//    dd($user->establecimiento->nombre);
//});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
