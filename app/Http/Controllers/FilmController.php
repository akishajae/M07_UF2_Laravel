<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFilmRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Film;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class FilmController extends Controller
{

    /**
     * Read films from storage
     */
    public static function readFilms()
    {
        // $films = Storage::json('/public/films.json');
        try {
            DB::listen(function ($query) {
                Log::info('Get all films | SQL Query executed successfully: ' . $query->sql);
            });

            $films = Film::all();
            return $films;
        } catch (\Exception $e) {
            Log::warning(__FUNCTION__ . '() | SQL Query failed: ' . $e->getMessage());

            abort(500);
        }
    }
    /**
     * List films older than input year 
     * if year is not infomed 2000 year will be used as criteria
     */
    public function listOldFilms($year = null)
    {
        try {
            if (is_null($year))
                $year = 2000;

            $query = Film::where('year', '<', $year);

            $sql = $query->toSql();
            Log::info(__FUNCTION__ . '() | SQL Query executed successfully: ' . $sql . ' (' . $year . ')');

            $title = "Colección de películas antiguas (antes de $year)";
            $old_films = $query->get();

            return view('films.list', ["films" => $old_films, "title" => $title]);
        } catch (\Exception $e) {
            Log::warning(__FUNCTION__ . '() | SQL Query failed: ' . $e->getMessage());

            abort(500);
        }
    }

    /**
     * List films younger than input year
     * if year is not infomed 2000 year will be used as criteria
     */
    public function listNewFilms($year = null)
    {
        try {
            if (is_null($year))
                $year = 2000;

            $query = Film::where('year', '>=', $year);

            $sql = $query->toSql();
            Log::info(__FUNCTION__ . '() | SQL Query executed successfully: ' . $sql . ' (' . $year . ')');

            $title = "Colección de películas nuevas (después de $year)";
            $new_films = $query->get();

            return view('films.list', ["films" => $new_films, "title" => $title]);
        } catch (\Exception $e) {
            Log::warning(__FUNCTION__ . '() | SQL Query failed: ' . $e->getMessage());

            abort(500);
        }
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
        try {
            $year = $request->input('year');

            $query = Film::where('year', '=', $year);

            $sql = $query->toSql();
            Log::info(__FUNCTION__ . '() | SQL Query executed successfully: ' . $sql . ' (' . $year . ')');

            $films_filtered = $query->get();

            $title = "Colección de todas las películas filtradas por año de estreno";
            $films = FilmController::readFilms();

            //if year is null
            if (is_null($year)) {
                return view('films.list', ["films" => $films, "title" => $title]);
            }

            return view("films.list", ["films" => $films_filtered, "title" => $title]);
        } catch (\Exception $e) {
            Log::warning(__FUNCTION__ . '() | SQL Query failed: ' . $e->getMessage());

            abort(500);
        }
    }

    /**
     * Lista pelis por género
     * @param mixed $genre
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function listFilmsByGenre(Request $request)
    {
        try {
            $genre = $request->input('genre');

            $query = Film::where('genre', '=', $genre);

            $sql = $query->toSql();
            Log::info(__FUNCTION__ . '() | SQL Query executed successfully: ' . $sql . ' (' . $genre . ')');

            //list based on genre informed
            $films_filtered = $query->get();

            $title = "Colección de todas las películas filtradas por género cinematográfico";
            $films = FilmController::readFilms();

            //if genre is null
            if (is_null($genre)) {
                return view('films.list', ["films" => $films, "title" => $title]);
            }

            return view('films.list', ["films" => $films_filtered, "title" => $title]);
        } catch (\Exception $e) {
            Log::warning(__FUNCTION__ . '() | SQL Query failed: ' . $e->getMessage());

            abort(500);
        }
    }

    /**
     * Lista pelis ordenadas por año (más nuevo a más antiguo)
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function sortFilms()
    {
        try {
            // throw new \Exception('Unable to retrieve films.');

            $query = Film::orderByDesc('year');

            $sql = $query->toSql();
            Log::info(__FUNCTION__ . '() | SQL Query executed successfully: ' . $sql);

            // list of sorted films by year
            $films_filtered = $query->get();

            $title = "Colección de todas las películas ordenadas por año";

            return view("films.list", ["films" => $films_filtered, "title" => $title]);
        } catch (\Exception $e) {
            Log::warning(__FUNCTION__ . '() | SQL Query failed: ' . $e->getMessage());

            abort(500);
        }
    }

    /**
     * Muestra la cuenta de pelis registradas
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function countFilms()
    {
        try {
            // throw new \Exception('Unable to retrieve films.');

            DB::listen(function ($query) {
                Log::info('SQL Query about to be executed: ' . $query->sql);
            });

            // get number of films
            $count_films = Film::count();
            Log::info(__FUNCTION__ . '() | SQL Query executed successfully. Number of films retrieved: ' . $count_films);

            $title = "Galería de películas";
            $films = FilmController::readFilms();

            return view("films.counter", ["films" => $films, "countFilms" => $count_films, "title" => $title]);
        } catch (\Exception $e) {
            Log::warning(__FUNCTION__ . '() | SQL Query failed: ' . $e->getMessage());

            abort(500);
        }
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
                Log::error(__FUNCTION__ . '() | Error retrieving film with ID: ' . $filmId);

                abort(404);
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
            try {
                // throw new \Exception('Unable to update film due to missing information.');

                Log::info(__FUNCTION__ . '() | Starting film update for: ' . $request->name);

                $film = Film::find($filmId);

                // validate if film is found
                if (!$film) {
                    Log::error(__FUNCTION__ . '() | Error retrieving film with ID: ' . $filmId);

                    abort(404);
                }

                // form data
                $validated = $request->validated();

                if (!($this->isFilm($request->name))) {
                    $film->name = $validated['name'];
                    $film->year = $validated['year'];
                    $film->genre = $validated['genre'];
                    $film->country = $validated['country'];
                    $film->duration = $validated['duration'];
                    $film->img_url = $validated['img_url'];

                    $film->save();

                    Log::info(__FUNCTION__ . '() | Film updated successfully. Film ID: ' . $film->id);

                    return redirect()->route('listFilms')->with('success', 'Tu película ha sido editada.');
                } else {
                    return redirect()->route('viewForm')
                        ->withInput($request->all())
                        ->with('error', 'Ya hay una película con este título.');
                }
            } catch (\Exception $e) {
                Log::error(__FUNCTION__ . '() | Failed to update film. Error: ' . $e->getMessage());
                // REDIRECT
            }
        } else {
            try {
                // throw new \Exception('Unable to create film due to missing information.');

                Log::info('Starting film creation for: ' . $request->name);

                $validated = $request->validated();

                // validate if film exists
                if (!($this->isFilm($request->name))) {
                    $film = Film::create($validated);

                    Log::info(__FUNCTION__ . '() | Film created successfully. Film ID: ' . $film->id);

                    return redirect()->route('listFilms')->with('success', 'Tu película ha sido añadida.');
                } else {
                    return redirect()->route('viewForm')
                        ->withInput($request->all())
                        ->with('error', 'Ya hay una película con este título.');

                    // It was more convenient to have the error in the form, not in the welcome page
                    // return redirect()->route('welcome')->with('error', 'This film already exists.');
                }
            } catch (\Exception $e) {
                Log::error(__FUNCTION__ . '() | Failed to create film. Error: ' . $e->getMessage());
                // REDIRECT
            }
        }
    }

    public function deleteFilm($filmId)
    {
        try {
            // throw new \Exception('Unable to delete film.');

            if ($filmId) {
                $film = Film::find($filmId);

                Log::info(__FUNCTION__ . '() | Starting film deletion for: ' . $film->name);

                // validate if film is not found
                if (!$film) {
                    Log::error(__FUNCTION__ . '() | Error retrieving film with ID: ' . $filmId);

                    abort(404);
                }

                Log::info(__FUNCTION__ . '() | Film deleted successfully. Film ID: ' . $film->id);

                $film->delete();

                return redirect()->route('listFilms')->with('success', 'La película ha sido eliminada.');
            }
        } catch (\Exception $e) {
            Log::error(__FUNCTION__ . '() | Failed to delete film. Error: ' . $e->getMessage());
            // REDIRECT
        }
    }
}
