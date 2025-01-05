<x-layout>
    <h1 class="mx-lg-auto mt-10 text-danger" style="font-family: 'Gloock', serif">{{ $title }}</h1>

    <ul class="nav nav-tabs d-flex justify-content-center align-items-center m-12">
        <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteName() == 'listFilms' ? 'active' : '' }}"" href=" {{ route('listFilms') }}">Todas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteName() == 'oldFilms' ? 'active' : '' }}"" href=" {{ route('oldFilms') }}">Más antiguas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteName() == 'newFilms' ? 'active' : '' }}"" href=" {{ route('newFilms') }}">Más nuevas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteName() == 'sortFilms' ? 'active' : '' }}"" href=" {{ route('sortFilms') }}">Ordenadas por año</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteName() == 'filmsByYear' ? 'active' : '' }}"" href=" {{ route('filmsByYear') }}">Filtradas por año</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteName() == 'filmsByGenre' ? 'active' : '' }}"" href=" {{ route('filmsByGenre') }}">Filtradas por género</a>
        </li>
    </ul>

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

    @if(empty($films))
    <div class="alert alert-warning alert-dismissible fade show bg-opacity-30 bg-danger text-danger m-12" role="alert">
        <strong>Oh no!</strong> No se ha encontrado ninguna película.
    </div>
    @else

    <div align="center" class="container my-5 table-responsive">
        <table class="table table-striped table-bordered mb-12">
            <tr style="font-family: 'Gloock', serif;" class="text-center">
                <th class="text-dark font-weight-bold text-uppercase">Título</th>
                <th class="text-dark font-weight-bold text-uppercase">Año</th>
                <th class="text-dark font-weight-bold text-uppercase">Género</th>
                <th class="text-dark font-weight-bold text-uppercase">País</th>
                <th class="text-dark font-weight-bold text-uppercase">Duración</th>
                <th class="text-dark font-weight-bold text-uppercase">Portada</th>
            </tr>

            @foreach($films as $film)
            <tr>
                <td class="text-center">{{$film['name']}}</td>
                <td class="text-center">{{$film['year']}}</td>
                <td class="text-center">{{$film['genre']}}</td>
                <td class="text-center">{{$film['country']}}</td>
                <td class="text-center">{{$film['duration']}}'</td>
                <td class="text-center">
                    <img src="{{$film['img_url']}}" alt="Film Covers" class="img-fluid" style="max-width: 150px; max-height: 225px; object-fit: cover;" />
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    @endif
</x-layout>