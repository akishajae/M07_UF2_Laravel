<x-layout>
    @if(empty($films))
        <div class="alert alert-warning alert-dismissible fade show bg-opacity-30 bg-danger text-danger m-12" role="alert">
            <strong>Oh no!</strong> No se ha encontrado ninguna película.
        </div>
    @else
        <h1 class="mx-auto mt-10 text-danger" style="font-family: 'Gloock', serif">{{ $title }}</h1>

        <div class=" pt-12 pb-24 py-24">
            <div class="container max-w-screen-xl">
                <!-- Section title -->
                <div class="row justify-content-center text-md-center mb-12">
                    <div class="col-lg-7">
                        <!-- Films counter -->
                        <h2 class="ls-tight font-bolder mb-5 text-center">
                            Hay un total de <span class="text-danger">{{ $countFilms }}</span> películas.
                        </h2>
                    </div>
                </div>
                <!-- Films -->
                <div class="row g-16 g-md-24">
                    @foreach ($films as $film)
                        <div class="col-12 col-sm-6 col-md-4 mb-5 mb-md-0">
                            <div class="card">
                                <!-- Image -->
                                <div class="p-2">
                                    <img src="{{$film['img_url']}}" alt="Film Covers" class="card-img">
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <!-- Title -->
                                    <h3 class="h4">{{ $film['name'] }}</h3>
                                    <!-- Subtitle -->
                                    <span class="d-block text-muted text-sm font-semibold">{{ $film['year'] }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
</x-layout>