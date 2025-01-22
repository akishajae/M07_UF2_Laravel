# Analysis
### 1. Routes
#### 1.1. What are they and their purpose?   
Routes are the web URLs that users can access in the application web.

They define the actions that have to be performed (what the application is supposed to do) when a URL is hit.
    
#### 1.2. Where are they defined?
In the "routes" folder in the _web.php_ file.
    
#### 1.3. How many are there?
There are 4 routes, right now:

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('oldFilms/{year?}',[FilmController::class, "listOldFilms"])->name('oldFilms');

    Route::get('newFilms/{year?}',[FilmController::class, "listNewFilms"])->name('newFilms');
    
    Route::get('films',[FilmController::class, "listFilms"])->name('listFilms');

#### 1.4. How do they group?
Using this code: 
    
    Route::group(['prefix'=>'filmout'], function(){ 
        // (Here you insert other routes) 
    });

#### 1.5. Which prefix do they use?
      Route::

#### 1.6. Which parameters do they use?
They use these parameters:
- year
- genre

Parameters in routes are defined like this (the _?_ means that it's optional):

Route::get('newFilms/<code>**{year?}**</code>',[FilmController::class, "listNewFilms"])->name('newFilms');

* * *

### 2. Middleware
#### 2.1. What are they and their purpose?
Middlewares are like filters for HTTP requests, this means that before accessing to the URL, it will go through the middleware that has been added first.

With a middleware it would be possible to intercept and modify a request [before or after](https://laravel.com/docs/11.x/middleware#middleware-and-responses) reaching the controller's action.

Before Middleware:

    class BeforeMiddleware
    {
        public function handle(Request $request, Closure $next): Response
        {
            // Perform action
            return $next($request);
        }
    }

After Middleware:

    class AfterMiddleware
    {
        public function handle(Request $request, Closure $next): Response
        {
            $response = $next($request);
            // Perform action
            return $response;
        }
    }

#### 2.2. Where are they defined?
They are defined in files that have to be put inside of a folder called _Middleware_. And to be able to use it, it's necessary to put it inside of the _Kernel.php_ file.

#### 2.3. How many are there?
There are 10 in total.

#### 2.4. Which parameters do they use?
The parameter that is being used is:

Route::middleware<code>('year')</code>->group(function() { ... }

Which is the name that has been put in the _Kernel.php_:

    protected $routeMiddleware = [
        // ...
        'year' => \App\Http\Middleware\ValidateYear::class
    ];

The middleware recieves Request and Closure objects (dependency injection).

#### 2.5. When are they invoked?
They are invoked on [HTTP requests](https://laravel.com/docs/10.x/middleware#registering-middleware). 

With Laravel, middlewares are invoked before or after an HTTP request.

- They can be assigned to routes
- Be a global middleware
- Create middleware groups
- It's also possible to exclude a middleware

* * *

### 3. Data
#### 3.1. Where are they defined?
Initially it's defined in _storage\app\public\films.json_.

#### 3.2. How are they read?
In the _FilmController.php_, using this function:

    /**
     * Read films from storage
     */
    public static function readFilms(): array
    {
        $films = Storage::json('/public/films.json');
        return $films;
    }

* * *

### 4. Controller
#### 4.1. What are they and their purpose?
Controllers are classes where it lets organize and group related request handling logic. It's the first one that recieves petitions and sends the data to a service.

Instead of defining all the request handling logic in the route files: with these controller classes you can have an organized and cleaner structure.

#### 4.2. Where are they defined?
They are in the _Controllers_ folder.

#### 4.3. How many are there?
There are 2 controllers:
- Controller
- FilmController

* * *

### 5. View
#### 5.1. What are they and their purpose?
Views are files that present data to the browser. In Laravel, views provide a way to place HTML in different files, it separates the controller logic from the presentation logic.

It's useful, since we don't have to put an entire HTML document strings in the routes and controllers files, it's more organized.

Views show the HTML (renderization).

#### 5.2. Where are they defined?
They are in the _\resources\views_ folder, usually they are files with the sufix _blade.php_, therefore it uses Blade templating language.

#### 5.3. How many are there?
There are 2 views, right now:
- _welcome.blade.php_
- _list.blade.php_

* * *

# Implementation
- [x] 1. add fields country(string) and duration(int) to current data and adapt all components required to list them.
- [x] 2. split current route 'films/{year?}/{genre?}' in two new routes filmsByYear and filmsByGenre, every one only receives its corresponding parameter
- [x] 3. adapt current function listFilms in FilmController to have listFilmsByYear and listFilmsByGenre for previous defined routes.
- [x] 4. create a new route 'sortFilms' to list all films sorted by year descending, from newest to oldest.
- [x] 5. create a new route 'countFilms' to return total number of films on a new view counter

