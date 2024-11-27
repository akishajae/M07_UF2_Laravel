Analysis
1. Routes
   <br>
    1.1. What are they and their purpose?
   
   <br>
    1.2. Where are they defined?
   <br>
    1.3. How many are there?
   <br>
    1.4. How do they group?
   <br>
    1.5. Which prefix do they use?
   <br>
    1.6. Which parameters do they use?
3. Middleware
   <br>
    2.1. What are they and their purpose?
   <br>
    2.2. Where are they defined?
   <br>
    2.3. How many are there?
   <br>
    2.4. Which parameters do they use?
   <br>
    2.5. When are they invoked?
   <br>
5. Data
   <br>
    3.1. Where are they defined?
   <br>
    3.2. How are they read?
   <br>
7. Controller
   <br>
    4.1. What are they and their purpose?
   <br>
    4.2. Where are they defined?
   <br>
    4.3. How many are there?
   <br>
9. View
    <br>
    5.1. What are they and their purpose?
   <br>
    5.2. Where are they defined?
   <br>
    5.3. How many are there?

Implementation
1. add fields country(string) and duration(int) to current data and adapt all components required to list them.
2. split current route 'films/{year?}/{genre?}' in two new routes filmsByYear and filmsByGenre, every one only receives its corresponding parameter
3. adapt current function listFilms in FilmController to have listFilmsByYear and listFilmsByGenre for previous defined routes.
4. create a new route 'sortFilms' to list all films sorted by year descending, from newest to oldest.
5. create a new route 'countFilms' to return total number of films on a new view counter

