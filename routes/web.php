<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SignController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LoginControllerP04;
use GuzzleHttp\Psr7\Request;

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

/*
//AMB CONTROLADORS --- SIGN IN 
Route::get('/signin/{v1}/{v2}/{v3}/{v4}', [SignController::class, 'signIn']);

//AMB CONTROLADORS --- SIGN UP 
Route::get('/signup/{v1}/{v2}/{v3}', [SignController::class, 'signUp']);
*/

/*---------P02 - POSTMAN MÉS MIDDLEWARE---------*/

//AMB CONTROLADORS --- LOGIN PROFE 

Route::get('/loginprofessorat/{v1}', [LoginController::class, 'professor']);

//AMB CONTROLADORS --- LOGIN ALUMNE 
Route::get('/loginalumne/{v1}', [LoginController::class, 'alumne']);

//AMB CONTROLADORS --- LOGIN CENTRE 
Route::get('/logincentre/{v1}', [LoginController::class, 'centre']); 


/*---------POSTMAN---------*/

//AMB CONTROLADORS --- LOGIN  
Route::post('/loginprofessor', [LoginController::class, 'professor']); 
Route::post('/logincentre', [LoginController::class, 'centre']); 
Route::post('/loginalumne', [LoginController::class, 'alumne']); 

//Route::post('/login', [LoginController::class, 'loginGeneral']); 
Route::post('/login', [LoginController::class, 'loginGeneral'])->middleware('login'); 

/*--------- P02 - GET ---------*/
Route::get('/error', [LoginController::class, 'error'])->name('errorAcces'); 


/*------------ P03 - SIGN IN I SIGN OUT -------*/
Route::get('/signin', [SignController::class, 'signIn'])->name('signin');
Route::get('/signup', [SignController::class, 'signUp'])->name('signup');

/*------------ P04 - MIGRACIONS, MODELS, ETC -------*/

Route::group(['prefix' => 'p04'], function () {
    Route::get('/login', [LoginControllerP04::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginControllerP04::class, 'login']);
    Route::get('/signup', [LoginControllerP04::class, 'showSignupForm'])->name('signup');
    Route::post('/signup', [LoginControllerP04::class, 'signup']);
    Route::post('/logout', [LoginControllerP04::class, 'logout'])->name('logout');
});