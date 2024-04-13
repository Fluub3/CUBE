<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EditorController;


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

Route::get('/', [EditorController::class, 'index'])->name('home');
Route::get('/ressources/{id}', [EditorController::class, 'show'])->name('ressource.show');
Route::post('/editor/save', [EditorController::class, 'save'])->name('editor.save');
Route::get('/', function () {
    return view('welcome');
});
 

Route::get('/test', function () {
    return view('jesaispas');
})->name('test');

Route::get('/test/route/helloword', function () {
    return view('/layout/app');
})->name('test.helloworld');

Route::get('/editor', function () {
    return view('/layout/editor');
})->name('editor');

Route::get('/Register', function () {
    return view('Register');
})->name('register');

Route::get('/Connection', function () {
    return view('Connection');
})->name('connection');

Route::get('/getMail/{mail}', [LoginController::class, 'getMail'])->name('getMail');
Route::post('/postUser', [LoginController::class, 'postUser'])->name('postUser');
Route::post('/checkLogin', [LoginController::class, 'checkLogin'])->name('checkLogin');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/ressources/{id}/edit', [EditorController::class, 'edit'])->name('ressource.edit');
Route::put('/ressources/{id}', [EditorController::class, 'update'])->name('ressource.update');
Route::delete('/ressources/{id}', [EditorController::class, 'destroy'])->name('ressource.destroy');


Route::get('/Register', function () {
    return view('/Register');
});

Route::view('/', 'home')->name('home');
Route::view('/Ressources', 'Ressources')->name('Ressources');
Route::view('/Favoris', 'Favoris')->name('Favoris');
Route::view('/aboutus', 'aboutUs')->name('aboutus');

Route::get('/getMail/{mail}', [LoginController::class, 'getMail']);
Route::post('/postUser', [LoginController::class, 'postUser']);

//Route::get('/getPassword/{pass}', [FrontController::class, 'getPassword']);
  
Route::get('/comment_layout', function () {
    return view('comment');

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

});

