<h1>{{$title}}</h1>

@if(empty($films))
<FONT COLOR="red">No se ha encontrado ninguna película</FONT>
@else
<p>Hay un total de {{ $countFilms }} pelis.</p>

@endif