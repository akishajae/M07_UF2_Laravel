<x-layout>
    <!-- <h1>{{ $title }}</h1> -->

    <ul class="nav nav-tabs d-flex justify-content-center align-items-center m-12">
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('listFilms') }}">Todas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('oldFilms') }}">Más antiguas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('newFilms') }}">Más nuevas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('sortFilms') }}">Ordenadas por año</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('filmsByYear') }}">Filtradas por año</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('filmsByGenre') }}">Filtradas por género</a>
        </li>
    </ul>

    @if(empty($films))
    <font color="red">No se ha encontrado ninguna película</font>
    @else

    @if (Route::currentRouteName() == 'filmsByYear')
    
    @elseif (Route::currentRouteName() == 'filmsByGenre')
    
    @endif

    <div align="center" class="container my-5 table-responsive">
        <table class="table table-striped table-bordered">
            {{-- @foreach($films as $film)
                @foreach(array_keys($film) as $key)
                    <th>{{$key}}</th>
            @endforeach
            @break
            @endforeach --}}
            <tr style="font-family: 'Gloock', serif;" class="text-center">
                <th class="text-dark font-weight-bold text-uppercase">Nombre</th>
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
                <td class="text-center">{{$film['duration']}}</td>
                <td class="text-center"><img src={{$film['img_url']}} style="width: 100px; height: 120px;" /></td>
            </tr>
            @endforeach
        </table>
    </div>
    @endif
</x-layout>