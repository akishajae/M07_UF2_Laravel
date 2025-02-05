{{-- @extends('errors::minimal')

@section('title', __('Server Error'))
@section('code', '500')
@section('message', __('Server Error')) --}}


<x-layout>
    <section class="py-3 py-md-5 d-flex justify-content-center align-items-center">
        <div class="container p-10">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <h2 class="d-flex justify-content-center align-items-center gap-2 mb-4">
                            <span class="display-1 fw-bold">5</span>
                            <i class="bi bi-exclamation-circle-fill text-danger display-4"></i>
                            <span class="display-1 fw-bold bsb-flip-h">0</span>
                        </h2>
                        <h3 class="h2 mb-2">Ups! Server Error.</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>