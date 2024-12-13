<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies List</title>

    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Include any additional stylesheets or scripts here -->
</head>

<body class="container">

    <h1 class="mt-4">Lista de Peliculas</h1>
    <ul>
        <li><a href=/filmout/oldFilms>Pelis antiguas</a></li>
        <li><a href=/filmout/newFilms>Pelis nuevas</a></li>
        <li><a href=/filmout/films>Pelis</a></li>
        <li><a href=/filmout/sortFilms>Pelis ordenadas por año</a></li>
        <li><a href=/filmout/countFilms>Total de pelis</a></li>
    </ul>
    <!-- Add Bootstrap JS and Popper.js (required for Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- Include any additional HTML or Blade directives here -->
    <h1 class="mt-4">Añadir Pelicula</h1>
    <form>
        <label for="name">Nombre</label>
        <input type="text" id="name">

        <br>

        <label for="year">Año</label>
        <input type="number" id="year">

        <br>

        <label for="year">Género</label>
        <input type="text" id="year">

        <br>

        <label for="">País</label>
        <input type="text">

        <br>

        <label for="">Duración</label>
        <input type="text">

        <br>

        <label for="">Imagen URL</label>
        <input type="text">

        <br>

        <button type="submit">Enviar</button>

    </form>

</body>

</html>