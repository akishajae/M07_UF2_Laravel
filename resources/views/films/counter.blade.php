<x-layout>
    {{-- <h1>{{$title}}</h1> --}}

    @if(empty($films))
        <div class="alert alert-warning alert-dismissible fade show bg-opacity-30 bg-danger text-danger m-12" role="alert">
            <strong>Oh no!</strong> No se ha encontrado ninguna película.
        </div>
    @else
        <p>Hay un total de {{ $countFilms }} pelis.</p>
    @endif
</x-layout>