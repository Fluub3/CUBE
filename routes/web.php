<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ReponseCommentaireController;


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
 * Request redirection de page
 */

Route::get('/', [EditorController::class, 'index'])->name('home');
Route::get('/Favoris', [LoginController::class, 'favoris'])->name('favoris');
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

Route::get('/forgot-password', function () {
    return view('forgot-password');
})->name('forgot-password');

Route::get('/Admin', function () {
    return view('Administrator');
})->name('Admin');




/**
 * Request POST
 */
Route::post('/postUser', [LoginController::class, 'postUser'])->name('postUser');
Route::post('/checkLogin', [LoginController::class, 'checkLogin'])->name('checkLogin');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/Forgotpassword', [LoginController::class, 'Forgotpassword'])->name('Forgotpassword');
Route::post('/add-to-favorites', [EditorController::class, 'addToFavorites'])->name('addtofavorites');
Route::post('/ressources/{ressource_id}/commentaire', [CommentController::class, 'store'])->name('comment.store');
Route::post('/reponse_commentaires', [ReponseCommentaireController::class, 'store'])->name('reponse_commentaire.store');
Route::post('/ressource/{id}/generate-link', [EditorController::class, 'generateLink'])->name('generate.link');
Route::post('/AdminChange', [LoginController::class, 'updateUserPerm'])->name('AdminChange');

/**
 * Request GET
 */


Route::get('/ressources/{id}/edit', [EditorController::class, 'edit'])->name('ressource.edit');
Route::get('/getMail/{mail}', [LoginController::class, 'getMail'])->name('getMail');
Route::get('/check-favorite/{id}', [EditorController::class, 'checkFavorite'])->name('check.favorite');
Route::get('/commentaires/{id}/edit', [CommentController::class, 'edit'])->name('commentaire.edit');


/**
 * Request PUT
 */
Route::put('/ressources/{id}', [EditorController::class, 'update'])->name('ressource.update');
Route::put('/commentaires/{id}', [CommentController::class, 'update'])->name('commentaire.update');

/**
 * Request DELETE
 */
Route::delete('/ressources/{id}', [EditorController::class, 'destroy'])->name('ressource.destroy');
Route::delete('/commentaires/{id}', [CommentController::class, 'destroy'])->name('commentaire.destroy');


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

