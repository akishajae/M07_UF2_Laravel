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

#### 2.2. Where are they defined?

#### 2.3. How many are there?
There are 10 in total.

#### 2.4. Which parameters do they use?

#### 2.5. When are they invoked?

* * *

### 3. Data
#### 3.1. Where are they defined?

#### 3.2. How are they read?

* * *

### 4. Controller
#### 4.1. What are they and their purpose?

#### 4.2. Where are they defined?
They are in the _Controllers_ folder.

#### 4.3. How many are there?
There are 2 controllers:
- Controller
- FilmController

* * *

### 5. View
#### 5.1. What are they and their purpose?

#### 5.2. Where are they defined?
They are in the _\resources\views_ folder, usually they are files with the sufix _blade.php_.

#### 5.3. How many are there?
There are 2 views, right now:
- welcome.blade.php
- list.blade.php

* * *

# Implementation
- [x] 1. add fields country(string) and duration(int) to current data and adapt all components required to list them.
- [x] 2. split current route 'films/{year?}/{genre?}' in two new routes filmsByYear and filmsByGenre, every one only receives its corresponding parameter
- [x] 3. adapt current function listFilms in FilmController to have listFilmsByYear and listFilmsByGenre for previous defined routes.
- [x] 4. create a new route 'sortFilms' to list all films sorted by year descending, from newest to oldest.
- [x] 5. create a new route 'countFilms' to return total number of films on a new view counter

