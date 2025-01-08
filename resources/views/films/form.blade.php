<x-layout>
    <!-- Use d-flex to make the parent container a flexbox, align and justify to center -->
    <div class="d-flex justify-content-center align-items-center vh-100">
        <!-- Card with w-50 for width and p-3 for padding -->
        <div class="card w-50 p-3">
            <h1 class="mx-lg-auto mt-3 text-danger" style="font-family: 'Gloock', serif">Añade tu película</h1>
            <div class="card-body">
                <form method="POST" action="{{ route('createFilm') }}">
                    @csrf
                    <div class="mb-5">
                        <label class="form-label" for="name">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name">
                        @if (session('error'))
                            <p class="text-danger mt-2">{{ session('error') }}</p>
                        @endif
                    </div>
                    <div class="mb-5">
                        <label class="form-label" for="year">Año</label>
                        <input type="number" class="form-control" id="year" name="year">
                    </div>
                    <div class="mb-5">
                        <label class="form-label" for="genre">Género</label>
                        <input type="text" class="form-control" id="genre" name="genre">
                    </div>
                    <div class="mb-5">
                        <label class="form-label" for="country">País</label>
                        <input type="text" class="form-control" id="country" name="country">
                    </div>
                    <div class="mb-5">
                        <label class="form-label" for="duration">Duración</label>
                        <input type="text" class="form-control" id="duration" name="duration">
                    </div>
                    <div class="mb-5">
                        <label class="form-label" for="img_url">Portada</label>
                        <input type="text" class="form-control" id="img_url" name="img_url">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-danger w-100">
                            Enviar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>