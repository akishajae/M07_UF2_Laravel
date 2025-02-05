{{-- @extends('errors::minimal')

@section('title', __('Not Found'))
@section('code', '404')
@section('message', __('Not Found')) --}}

<x-layout>
    <section class="py-3 py-md-5 d-flex justify-content-center align-items-center">
        <div class="container p-10">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <h2 class="d-flex justify-content-center align-items-center gap-2 mb-4">
                            <span class="display-1 fw-bold">4</span>
                            <i class="bi bi-exclamation-circle-fill text-danger display-4"></i>
                            <span class="display-1 fw-bold bsb-flip-h">4</span>
                        </h2>
                        <h3 class="h2 mb-2">Ups! Te has perdido.</h3>
                        <p class="mb-5">La página que buscas no se ha encontrado.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>