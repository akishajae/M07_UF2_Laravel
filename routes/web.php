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
});

Route::middleware('year')->group(function() {
    Route::group(['prefix'=>'filmout'], function(){
        // Routes included with prefix "filmout"
        Route::get('oldFilms/{year?}',[FilmController::class, "listOldFilms"])->name('oldFilms');
        Route::get('newFilms/{year?}',[FilmController::class, "listNewFilms"])->name('newFilms');
        Route::get('films',[FilmController::class, "listFilms"])->name('listFilms');
        
        // split in two new routes
        Route::get('filmsByYear/{year?}',[FilmController::class, "listFilmsByYear"])->name('filmsByYear');
        Route::get('filmsByGenre/{genre?}',[FilmController::class, "listFilmsByGenre"])->name('filmsByGenre');
    
        // new route 'sortFilms'
        Route::get('sortFilms', [FilmController::class, "sortFilms"])->name('sortFilms');
   
        // new route 'countFilms'
        Route::get('countFilms', [FilmController::class, "countFilms"])->name('countFilms');
    });
});

Route::middleware('url')->group(function() {
    Route::group(['prefix' => 'filmin'], function() {
        Route::post('createFilm', [FilmController::class, "createFilm"])->name('createFilm');
    });
});

