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
});

Route::get('/comment_layout', function () {
    return view('comment');
});
<<<<<<< Updated upstream
=======
Route::get('/test/route/helloword', function () {
    return view('/layout/app');
});

Route::get('/Register', function () {
    return view('/Register');
});

Route::view('/', 'home')->name('home');
Route::view('/Ressources', 'Ressources')->name('Ressources');
Route::view('/Favoris', 'Favoris')->name('Favoris');
Route::view('/aboutus', 'aboutUs')->name('aboutus');

Route::get('/getMail/{mail}', [LoginController::class, 'getMail']);
Route::get('/checkLogin/{mail}', [LoginController::class, 'checkLogin']);

Route::post('/postUser', [LoginController::class, 'postUser']);

//Route::get('/getPassword/{pass}', [FrontController::class, 'getPassword']);



>>>>>>> Stashed changes
