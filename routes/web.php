<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/test', function () {
    return view('jesaispas');
});
Route::get('/test/route/helloword', function () {
    return view('/layout/app');
});

Route::get('/editor', function () {
    return view('/layout/editor');
});

Route::get('/Register', function () {
    return view('Register');
});

Route::get('/Connection', function () {
    return view('Connection');
});

Route::get('/', function () {
    return view('home');
})->name('home');

Route::post('/editor/save', [EditorController::class, 'save']);



