Analysis
1. Routes
    1.1. What are they and their purpose?
    1.2. Where are they defined?
    1.3. How many are there?
    1.4. How do they group?
    1.5. Which prefix do they use?
    1.6. Which parameters do they use?
2. Middleware
    2.1. What are they and their purpose?
    2.2. Where are they defined?
    2.3. How many are there?
    2.4. Which parameters do they use?
    2.5. When are they invoked?
3. Data
    3.1. Where are they defined?
    3.2. How are they read?
4. Controller
    4.1. What are they and their purpose?
    4.2. Where are they defined?
    4.3. How many are there?
5. View
    5.1. What are they and their purpose?
    5.2. Where are they defined?
    5.3. How many are there?

Implementation
1. add fields country(string) and duration(int) to current data and adapt all components required to list them.
2. split current route 'films/{year?}/{genre?}' in two new routes filmsByYear and filmsByGenre, every one only receives its corresponding parameter
3. adapt current function listFilms in FilmController to have listFilmsByYear and listFilmsByGenre for previous defined routes.
4. create a new route 'sortFilms' to list all films sorted by year descending, from newest to oldest.
5. create a new route 'countFilms' to return total number of films on a new view counter

