<x-layout>
    <h1 class="mx-auto mt-10 text-danger" style="font-family: 'Gloock', serif">{{ $title }}</h1>

    <ul class="nav nav-tabs d-flex justify-content-center align-items-center m-12">
        <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteName() == 'listFilms' ? 'active' : '' }}""
                href=" {{ route('listFilms') }}">Todas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteName() == 'oldFilms' ? 'active' : '' }}""
                href=" {{ route('oldFilms') }}">Más antiguas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteName() == 'newFilms' ? 'active' : '' }}""
                href=" {{ route('newFilms') }}">Más nuevas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteName() == 'sortFilms' ? 'active' : '' }}""
                href=" {{ route('sortFilms') }}">Ordenadas por año</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteName() == 'filmsByYear' ? 'active' : '' }}""
                href=" {{ route('filmsByYear') }}">Filtradas por año</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteName() == 'filmsByGenre' ? 'active' : '' }}""
                href=" {{ route('filmsByGenre') }}">Filtradas por género</a>
        </li>
    </ul>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show bg-opacity-30 bg-success text-success m-12"
            role="alert">
            <strong>Yay!</strong> {{ session('success') }}
        </div>
    @endif

    @if (Route::currentRouteName() == 'filmsByYear')
        <div class="d-flex align-items-center mx-lg-auto">
            <form method="POST" action="{{ route('filmsByYear') }}" class="d-flex w-100">
                @csrf
                <input type="number" name="year" id="year" class="form-control mb-3 mr-2" placeholder="Introduce un año">
                <button type="submit" class="btn btn-sm btn-danger mb-3">Filtrar</button>
            </form>
        </div>
    @elseif (Route::currentRouteName() == 'filmsByGenre')
        <div class="d-flex align-items-center mx-lg-auto">
            <form method="POST" action="{{ route('filmsByGenre') }}" class="d-flex w-100">
                @csrf
                <input type="text" name="genre" id="genre" class="form-control mb-3 mr-2" placeholder="Introduce un género">
                <button type="submit" class="btn btn-sm btn-danger mb-3">Filtrar</button>
            </form>
        </div>
    @endif

    @if ($films->isEmpty())
        <div class="alert alert-warning alert-dismissible fade show bg-opacity-30 bg-danger text-danger m-12" role="alert">
            <strong>Oh no!</strong> No se ha encontrado ninguna película.
        </div>
    @else
        <div align="center" class="container my-5 table-responsive mb-10">
            <table class="table table-striped table-bordered mb-12">
                <tr style="font-family: 'Gloock', serif;" class="text-center">
                    <th class="text-dark font-weight-bold text-uppercase">Título</th>
                    <th class="text-dark font-weight-bold text-uppercase">Año</th>
                    <th class="text-dark font-weight-bold text-uppercase">Género</th>
                    <th class="text-dark font-weight-bold text-uppercase">País</th>
                    <th class="text-dark font-weight-bold text-uppercase">Duración</th>
                    <th class="text-dark font-weight-bold text-uppercase">Portada</th>
                    <th class="text-dark font-weight-bold text-uppercase">Acción</th>
                </tr>

                @foreach ($films as $film)
                    <tr>
                        <td class="text-center">{{ $film['name'] }}</td>
                        <td class="text-center">{{ $film['year'] }}</td>
                        <td class="text-center">{{ $film['genre'] }}</td>
                        <td class="text-center">{{ $film['country'] }}</td>
                        <td class="text-center">{{ $film['duration'] }}'</td>
                        <td class="text-center">
                            <img src="{{ $film['img_url'] }}" alt="Film Covers" class="img-fluid"
                                style="max-width: 150px; max-height: 225px; object-fit: cover;" />
                        </td>
                        <td class="text-center">
                            <a href="{{ route('viewForm', ['id' => $film['id']]) }}" class="btn btn-outline-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path
                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd"
                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                </svg>
                            </a>
                            <a href="#" class="btn btn-outline-danger" data-toggle="modal" data-target="#modalConfirmDelete">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    @endif

    <!-- Modal -->
    <div class="modal fade" id="modalConfirmDelete" tabindex="-1" role="dialog"
        aria-labelledby="modalConfirmDeleteTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-uppercase text-danger" id="modalConfirmDeleteLongTitle">Eliminar película...
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Es esto realmente lo que quieres? Ya no habrá vuelta atrás...</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <a href="{{ route('deleteFilm', ['id' => $film['id']]) }}"">
                        <button type=" button" class="btn btn-danger">Eliminar</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layout>