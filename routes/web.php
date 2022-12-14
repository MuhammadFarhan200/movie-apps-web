<?php

use App\Http\Controllers\CastingController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\GenreFilmController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ReviewController;
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

// Route::get('/', function () {
//     return view('welcome');
// })->name('welcome');

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'isAdmin']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('admin');
    Route::get('profile', function () {
        return view('admin.pages.profile');
    });
    Route::resource('tahun-rilis', TahunRilisController::class);
    Route::resource('genre-film', GenreFilmController::class);
    Route::resource('casting', CastingController::class);
    Route::resource('movie', MovieController::class);
    Route::resource('reviewer', ReviewController::class);
});

Route::get('/errors', function () {
    return view('errors.403');
});

// Route Front
Route::get('/', [FrontController::class, 'index'])->name('guest_home');
Route::get('/movies', [FrontController::class, 'movie'])->name('movies');
// Route::get('/genre', [FrontController::class, 'genre'])->name('genre');
Route::get('/about', [FrontController::class, 'about'])->name('about');
Route::get('/movies/{id}', [FrontController::class, 'detailMovie']);
Route::post('/sendReview', [FrontController::class, 'sendReview'])->name('kirimReview');
Route::get('cast', [FrontController::class, 'cast']);
