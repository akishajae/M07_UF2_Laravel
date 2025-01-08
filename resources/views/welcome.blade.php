<x-layout>
    <div class="container">
        <!-- Add Bootstrap JS and Popper.js (required for Bootstrap) -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

        <!-- Include any additional HTML or Blade directives here -->

        <div class="py-24">
            <div class="container max-w-screen-xl">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-5 mb-10 mb-lg-0">
                        <!-- Emoji -->
                        <div class="display-4 mb-5 mt-n16">🎬</div>
                        <!-- Heading -->
                        <h1 style="font-family: 'Gloock';" class="ls-tight font-bolder display-3 mb-5">
                            La colección.<br>Encuentra <span class="text-danger">la película para ti</span>
                        </h1>
                        <!-- Text -->
                        <p class="lead mb-10">
                            ... o añádela a La colección.
                        </p>
                        <!-- Buttons -->
                        <div class="mx-n2">
                            <a href="{{ route('listFilms') }}" class="btn btn-lg btn-danger shadow-sm mx-2 px-lg-8">
                                Ve al listado
                            </a>
                            <a href="{{ route('viewForm') }}" class="btn btn-lg btn-neutral mx-2 px-lg-8">
                                Añade tu película
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 ms-lg-auto">
                        <div class="w-xl-12/10 position-relative">
                            <!-- Decorations -->
                            <span class="d-none d-lg-block position-absolute top-0 start-0 transform translate-x-n32 translate-y-n16 w-2/3 h-2/3 bg-danger opacity-20 rounded-circle filter blur-50"></span>
                            <span class="d-none d-xl-block position-absolute bottom-0 end-0 transform translate-x-16 translate-y-16 w-32 h-32 bg-danger opacity-60 rounded-circle filter blur-50"></span>
                            <!-- Image -->
                            <img alt="Cinema Film" src="{{ asset('img/cinema-film.jpg') }}" class="rounded img-fluid" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>