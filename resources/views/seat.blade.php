@extends('layouts.app')
@section('title', 'Seat')

@section('content')

    <div class="container py-5">

        {{ Breadcrumbs::render('main') }}

        @if (session()->has('alert'))
            @php
                Alert::error('Oops...',session()->get('alert'));
            @endphp
        @endif

        <div class="card shadows bg-back-white">
            <div class="card-body p-5">

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success rounded btn-green rounded-pill border-0 py-3 mb-5" data-bs-toggle="modal" data-bs-target="#modal-img">
                    <i class="fa-solid fa-lg mx-2 fa-image fa-fw"></i>
                    <span class="me-2">Click to see sketch</span>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="modal-img" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content py-3 px-3">
                            <div class="modal-header">
                                <h5 class="modal-title">Interior Sketch</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img class="img-fluid d-lg-block" src="{{ asset('image/interior_landscape.png') }}" alt="interior">
                                <img class="img-fluid d-lg-none" src="{{ asset('image/interior.png') }}" alt="interior">
                            </div>
                            <div class="modal-footer border-0"></div>
                        </div>
                    </div>
                </div>
                {{-- Modal End --}}

                <div class="row">
                    <div class="col-xl-6 col">

                        <div class="row mb-4">
                            @foreach ($seats as $seat)
                                <button class="btn btn-success mb-4 text-serif {{ $seat->status ? 'bg-lightgreen text-dark' : 'bg-disabled text-light' }} mx-3 rounded fs-4 btn-seat"
                                    {{ $seat->status ? '' : 'disabled' }} style="height:90px; width:90px">{{ $seat->seat }}</button>
                            @endforeach
                        </div>

                    </div>

                    <div class="col-4 offset-xl-1">
                        <div class="mb-3">
                            <div class="align-middle d-inline-block bg-lightgreen me-3 rounded" style="height:40px; width:40px"></div>
                            <span class="fw-semibold">Available</span>
                        </div>
                        <div class="mb-3">
                            <div class="align-middle d-inline-block bg-disabled me-3 rounded" style="height:40px; width:40px"></div>
                            <span class="fw-semibold">Occupied</span>
                        </div>
                        <div class="mb-3">
                            <div class="align-middle d-inline-block bg-decor me-3 rounded" style="height:40px; width:40px"></div>
                            <span class="fw-semibold">Your Choice</span>
                        </div>

                        <br>
                        <br>
                        <br>

                        <div>
                            <h3 class="title-menu fs-3">Your Choice</h3>
                            <p class="fs-3 fw-light" id="seat-choice">{{ $choicesText }}</p>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <form action="/addseat" method="post">
                        @csrf
                        <input type="hidden" name="seat" id="seat-input" value="{{ $choicesText }}">
                        <button type="submit" class="btn btn-success rounded-pill float-end py-3 px-4 text-serif fs-5">
                            Pembayaran
                            <i class="fa-solid fs-3 fa-arrow-right align-middle ps-2"></i>
                        </button>
                    </form>
                </div>

            </div>
        </div>

    </div>

    <script>
        @foreach ($choices as $choice)
            $(".btn-seat:contains({{ $choice }})").toggleClass('bg-lightgreen text-dark bg-decor text-light');
        @endforeach
    </script>

@endsection
