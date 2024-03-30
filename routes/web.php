<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
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


Route::post('/editor/save', 'EditorController@save')->name('editor.save');




Route::view('/', 'home')->name('home');
Route::view('/Ressources', 'Ressources')->name('Ressources');
Route::view('/Favoris', 'Favoris')->name('Favoris');
Route::view('/aboutus', 'aboutUs')->name('aboutus');

