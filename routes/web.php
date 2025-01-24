<?php

use App\Http\Controllers\FilmController;
use App\Http\Middleware\ValidateYear;
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

Route::middleware('year')->group(function () {
    Route::group(['prefix' => 'filmout'], function () {
        // Routes included with prefix "filmout"
        Route::get('oldFilms/{year?}', [FilmController::class, "listOldFilms"])->name('oldFilms');
        Route::get('newFilms/{year?}', [FilmController::class, "listNewFilms"])->name('newFilms');
        Route::get('films', [FilmController::class, "listFilms"])->name('listFilms');

        // delete film
        Route::get('films/{id}', [FilmController::class, "deleteFilm"])->name('deleteFilm');

        // split in two new routes
        Route::get('filmsByYear', [FilmController::class, "listFilmsByYear"])->name('filmsByYear');
        Route::post('filmsByYear/{year?}', [FilmController::class, "listFilmsByYear"])->name('filmsByYear');
        Route::get('filmsByGenre/{genre?}', [FilmController::class, "listFilmsByGenre"])->name('filmsByGenre');
        Route::post('filmsByGenre/{genre?}', [FilmController::class, "listFilmsByGenre"])->name('filmsByGenre');

        // new route 'sortFilms'
        Route::get('sortFilms', [FilmController::class, "sortFilms"])->name('sortFilms');

        // new route 'countFilms'
        Route::get('countFilms', [FilmController::class, "countFilms"])->name('countFilms');

        // show list
        Route::get('list', [FilmController::class, "showList"])->name('viewList');
    });
});

Route::middleware('url')->group(function() {
    Route::group(['prefix' => 'filmin'], function() {
        // view form
        Route::get('form/{id?}', [FilmController::class, "showForm"])->name('viewForm');

        // create and edit film
        Route::post('filmEditor', [FilmController::class, "saveFilm"])->name('saveFilm');
    });
});
