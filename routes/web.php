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


/**
 * Requette redirection de page
 */

Route::get('/', [EditorController::class, 'index'])->name('home');
Route::get('/Favoris', [LoginController::class, 'favoris'])->name('favoris');
Route::get('/ressources/{id}', [EditorController::class, 'show'])->name('ressource.show');
Route::post('/editor/save', [EditorController::class, 'save'])->name('editor.save');

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

Route::get('/forgot-password', function () {
    return view('forgot-password');
})->name('forgot-password');

/**
 * Requette POST
 */
Route::post('/postUser', [LoginController::class, 'postUser'])->name('postUser');
Route::post('/checkLogin', [LoginController::class, 'checkLogin'])->name('checkLogin');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/Forgotpassword', [LoginController::class, 'Forgotpassword'])->name('Forgotpassword');
Route::post('/add-to-favorites', [EditorController::class, 'addToFavorites'])->name('addtofavorites');

/**
 * Requette GET
 */


Route::get('/ressources/{id}/edit', [EditorController::class, 'edit'])->name('ressource.edit');
Route::get('/getMail/{mail}', [LoginController::class, 'getMail'])->name('getMail');
Route::get('/check-favorite/{id}', [EditorController::class, 'checkFavorite'])->name('check.favorite');

/**
 * Requette PUT
 */
Route::put('/ressources/{id}', [EditorController::class, 'update'])->name('ressource.update');
/**
 * Requette DELETE
 */
Route::delete('/ressources/{id}', [EditorController::class, 'destroy'])->name('ressource.destroy');


