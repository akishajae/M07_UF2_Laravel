<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Films</title>

  <!-- Add Bootstrap CSS link -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link href="https://unpkg.com/@webpixels/css@1.2.6/dist/index.css" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Gloock&display=swap" rel="stylesheet">

  <!-- Include any additional stylesheets or scripts here -->
  <style>
    .footer-image {
      width: 100%;
      max-width: 100vw;
      height: auto;
    }
  </style>
</head>

<body class="d-flex flex-column min-vh-100">

  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-0 py-3">
      <div class="container-xl">
        <!-- Logo -->
        <a class="navbar-brand" href="{{ route('welcome') }}">
          <!-- <img src="https://preview.webpixels.io/web/img/logos/clever-light.svg" class="h-8" alt="..."> -->
          <img src="{{ asset('img/films-logo.png') }}" class="h-8" alt="Films Logo">
        </a>
        <!-- Navbar toggle -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <!-- Nav -->
          <div class="navbar-nav mx-lg-auto">
            <a class="nav-item nav-link rounded m-2 py-2 {{ Route::currentRouteName() == 'welcome' ? 'active' : '' }}" href="{{ route('welcome') }}">Principal</a>
            <a class="nav-item nav-link rounded m-2 py-2 
            @switch (Route::currentRouteName())
              @case ('listFilms')
              @case ('oldFilms')
              @case ('newFilms')
              @case ('sortFilms')
              @case ('filmsByYear')
              @case ('filmsByGenre')
              active
            @endswitch
            " href="{{ route('listFilms') }}">Listas</a>
            <a class="nav-item nav-link rounded m-2 py-2 {{ Route::currentRouteName() == 'countFilms' ? 'active' : '' }}" href="{{ route('countFilms') }}">Contador</a>
          </div>
          <!-- Right navigation -->
          <div class="navbar-nav ms-lg-4"></div>
          <!-- Action -->
          <div class="d-flex align-items-lg-center mt-3 mt-lg-0">
            <a href="{{ route('viewForm') }}" class="btn btn-sm btn-danger w-full w-lg-auto">Añadir película</a>
          </div>
        </div>
      </div>
    </nav>
  </header>

  {{ $slot }}

  <footer class="mt-auto">
    <img src="{{ asset('img/cinema-seats.png') }}" alt="Seats Decoration" class="footer-image mt-auto">
    <div class="text-center p-3 bg-dark">
      © 2025 Copyright
      <a class="text-white" href="#">Films, Akisha Angeles</a>
    </div>
  </footer>

  <!-- Add jQuery and Bootstrap JS at the end of the body for better performance -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>