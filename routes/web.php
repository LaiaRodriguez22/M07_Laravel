<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SignController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*--PROVA HELLO AMB VARIABLES DES DE ROUTE MODULE COM ANGULAR--*/
Route::get('/hello', function () {
    $var = "variable des de Route Module";
    return view('mostra') -> with('nomUsuari', $var);
});

Route::get('/getNom/{nom}', function($nom){
    return 'Hello World ' . $nom;
});

//PROVA CLASSE
Route::get('/mostrar', function(){
    return view('mostra');
});

//EX 1----- SIGN IN, SIGN OUT
Route::get('/sign/signin', function(){
    return view('/sign/signin');
});

Route::get('/sign/signup', function(){
    return view('/sign/signup');
});


//AMB CONTROLADORS --- SIGN IN 
Route::get('/signin/{v1}/{v2}/{v3}/{v4}', [App\Http\Controllers\SignController::class, 'signIn']);

//AMB CONTROLADORS --- SIGN UP 
Route::get('/signup/{v1}/{v2}/{v3}', [App\Http\Controllers\SignController::class, 'signUp']);
