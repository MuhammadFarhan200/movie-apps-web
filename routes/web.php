<?php

use App\Http\Controllers\DurasiFilmController;
use App\Http\Controllers\GenreFilmController;
use App\Http\Controllers\TahunRilisController;
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

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'isAdmin']], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');
    Route::get('profile', function () {
        return view('admin.pages.profile');
    });
    Route::resource('tahun-rilis', TahunRilisController::class);
    Route::resource('durasi-film', DurasiFilmController::class);
    Route::resource('genre-film', GenreFilmController::class);
});

Route::get('/errors', function () {
    return view('errors.403');
});
