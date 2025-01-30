<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFilmRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Film;
use Log;

class FilmController extends Controller
{

    /**
     * Read films from storage
     */
    public static function readFilms()
    {
        // $films = Storage::json('/public/films.json');
        $films = Film::all();
        return $films;
    }
    /**
     * List films older than input year 
     * if year is not infomed 2000 year will be used as criteria
     */
    public function listOldFilms($year = null)
    {
        if (is_null($year))
            $year = 2000;

        $title = "Colección de películas antiguas (antes de $year)";

        $old_films = Film::where('year', '<', $year)->get();

        return view('films.list', ["films" => $old_films, "title" => $title]);
    }

    /**
     * List films younger than input year
     * if year is not infomed 2000 year will be used as criteria
     */
    public function listNewFilms($year = null)
    {
        if (is_null($year))
            $year = 2000;

        $title = "Colección de películas nuevas (después de $year)";

        $new_films = Film::where('year', '>=', $year)->get();

        return view('films.list', ["films" => $new_films, "title" => $title]);
    }
    /**
     * Lista TODAS las películas (o filtra x año o categoría.)
     */
    public function listFilms()
    {
        $title = "Colección de todas las películas";
        $films = FilmController::readFilms();

        return view("films.list", ["films" => $films, "title" => $title]);
    }

    /**
     * Lista pelis por año
     * @param mixed $year
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function listFilmsByYear(Request $request)
    {
        $year = $request->input('year');

        $films_filtered = Film::where('year', '=', $year)->get();

        $title = "Colección de todas las películas filtradas por año de estreno";
        $films = FilmController::readFilms();

        //if year is null
        if (is_null($year)) {
            return view('films.list', ["films" => $films, "title" => $title]);
        }

        return view("films.list", ["films" => $films_filtered, "title" => $title]);
    }

    /**
     * Lista pelis por género
     * @param mixed $genre
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function listFilmsByGenre(Request $request)
    {
        $genre = $request->input('genre');

        //list based on genre informed
        $films_filtered = Film::where('genre', '=', $genre)->get();

        $title = "Colección de todas las películas filtradas por género cinematográfico";
        $films = FilmController::readFilms();

        //if genre is null
        if (is_null($genre)) {
            return view('films.list', ["films" => $films, "title" => $title]);
        }

        return view('films.list', ["films" => $films_filtered, "title" => $title]);
    }

    /**
     * Lista pelis ordenadas por año (más nuevo a más antiguo)
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function sortFilms()
    {
        $films_filtered = Film::orderByDesc('year')->get();

        $title = "Colección de todas las películas ordenadas por año";

        return view("films.list", ["films" => $films_filtered, "title" => $title]);
    }

    /**
     * Muestra la cuenta de pelis registradas
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function countFilms()
    {
        $count_films = Film::count();

        $title = "Galería de películas";
        $films = FilmController::readFilms();

        return view("films.counter", ["films" => $films, "countFilms" => $count_films, "title" => $title]);
    }

    public function isFilm(string $filmName)
    {
        return Film::where('name', $filmName)->exists();
    }

    public function showList()
    {
        return view('films.list');
    }

    public function showForm($filmId = null)
    {
        if ($filmId) {
            $film = Film::find($filmId);

            if (!$film) {
                Log::error('Error retrieving film with ID: ' . $filmId);

                // abort(404);

                // return redirect()->route('viewForm')
                //     ->with('error', 'No se ha encontrado esa película.');
            }

            return view('films.form', ['film' => $film]);
        }

        return view('films.form');
    }

    // I use the same method to create and edit films
    public function saveFilm(StoreFilmRequest $request)
    {
        $filmId = $request->query('filmId');
        if ($filmId) {
            $film = Film::find($filmId);

            // validate if film is found
            // if (!$film) {
            //     dd(1);
            //     Log::error('Error retrieving film with name: ' . $request->name);

            //     return redirect()->route('viewForm')
            //         ->withInput($request->all())
            //         ->with('error', 'No se ha encontrado esa película.');
            // }

            // form data
            $validated = $request->validated();

            $film->name = $validated['name'];
            $film->year = $validated['year'];
            $film->genre = $validated['genre'];
            $film->country = $validated['country'];
            $film->duration = $validated['duration'];
            $film->img_url = $validated['img_url'];

            try {
                $film->save();
                Log::info('Film updated successfully: ' . $request->name);

                return redirect()->route('listFilms')->with('success', 'Tu película ha sido editada.');
            } catch (\Exception $e) {
                Log::error('Failed saving film with data: ' . json_encode($request->all()));
            }

        } else {
            $validated = $request->validated();

            // validate if film exists
            if (!($this->isFilm($request->name))) {
                Film::create($validated);

                Log::info('Film created successfully: ' . $request->name);

                return redirect()->route('listFilms')->with('success', 'Tu película ha sido añadida.');
            } else {
                Log::error('Failed to save film with data: ' . json_encode($request->all()));

                return redirect()->route('viewForm')
                    ->withInput($request->all())
                    ->with('error', 'Ya hay una película con este título.');

                // It was more convenient to have the error in the form, not in the welcome page
                // return redirect()->route('welcome')->with('error', 'This film already exists.');
            }
        }
    }

    public function deleteFilm($filmId)
    {
        if ($filmId) {
            $film = Film::find($filmId);

            // validate if film is not found
            if (!$film) {
                return redirect()->route('listFilms');
            }

            $film->delete();
            return redirect()->route('listFilms')->with('success', 'La película ha sido eliminada.');
        }
    }
}
