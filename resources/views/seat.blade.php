@extends('layouts.app')
@section('title', 'Seat')

@section('content')

    <div class="container py-5">

        {{ Breadcrumbs::render('main') }}

        <div class="card shadows bg-back-white">
            <div class="card-body p-5">

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success rounded btn-green rounded-pill border-0 py-3 mb-5" data-bs-toggle="modal" data-bs-target="#modal-img">
                    <i class="fa-solid fa-lg mx-2 fa-image fa-fw"></i>
                    <span class="me-2">Click to see sketch</span>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="modal-img" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content py-3 px-3">
                            <div class="modal-header">
                                <h5 class="modal-title">Interior Sketch</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img class="img-fluid" src="{{ asset('image/interior.png') }}" alt="">
                            </div>
                            <div class="modal-footer border-0"></div>
                        </div>
                    </div>
                </div>
                {{-- Modal End --}}

                <div class="row">
                    <div class="col-6">

                        <div class="row mb-4">
                            <button class="btn btn-success mb-4 text-serif bg-lightgreen mx-3 rounded text-dark fs-4 btn-seat" style="height:90px; width:90px">A1</button>
                            <button class="btn btn-success mb-4 text-serif bg-lightgreen mx-3 rounded text-dark fs-4 btn-seat" style="height:90px; width:90px">A2</button>
                            <button class="btn btn-success mb-4 text-serif bg-lightgreen mx-3 rounded text-dark fs-4 btn-seat" style="height:90px; width:90px">A3</button>
                            <button class="btn btn-success mb-4 text-serif bg-lightgreen mx-3 rounded text-dark fs-4 btn-seat" style="height:90px; width:90px">A4</button>
                            <button class="btn btn-success mb-4 text-serif bg-lightgreen mx-3 rounded text-dark fs-4 btn-seat" style="height:90px; width:90px">A5</button>

                            <button class="btn btn-success mb-4 text-serif bg-lightgreen mx-3 rounded text-dark fs-4 btn-seat" style="height:90px; width:90px">B1</button>
                            <button class="btn btn-success mb-4 text-serif bg-lightgreen mx-3 rounded text-dark fs-4 btn-seat" style="height:90px; width:90px">B2</button>
                            <button class="btn btn-success mb-4 text-serif bg-lightgreen mx-3 rounded text-dark fs-4 btn-seat" style="height:90px; width:90px">B3</button>
                            <button class="btn btn-success mb-4 text-serif bg-lightgreen mx-3 rounded text-dark fs-4 btn-seat" style="height:90px; width:90px">B4</button>
                            <button class="btn btn-success mb-4 text-serif bg-lightgreen mx-3 rounded text-dark fs-4 btn-seat" style="height:90px; width:90px">B5</button>

                            <button class="btn btn-success mb-4 text-serif bg-lightgreen mx-3 rounded text-dark fs-4 btn-seat" style="height:90px; width:90px">C1</button>
                            <button class="btn btn-success mb-4 text-serif bg-lightgreen mx-3 rounded text-dark fs-4 btn-seat" style="height:90px; width:90px">C2</button>
                            <button class="btn btn-success mb-4 text-serif bg-lightgreen mx-3 rounded text-dark fs-4 btn-seat" style="height:90px; width:90px">C3</button>
                            <button class="btn btn-success mb-4 text-serif bg-lightgreen mx-3 rounded text-dark fs-4 btn-seat" style="height:90px; width:90px">C4</button>
                            <button class="btn btn-success mb-4 text-serif bg-lightgreen mx-3 rounded text-dark fs-4 btn-seat" style="height:90px; width:90px">C5</button>

                            <button class="btn btn-success mb-4 text-serif bg-lightgreen mx-3 rounded text-dark fs-4 btn-seat" style="height:90px; width:90px">D1</button>
                            <button class="btn btn-success mb-4 text-serif bg-lightgreen mx-3 rounded text-dark fs-4 btn-seat" style="height:90px; width:90px">D2</button>
                            <button class="btn btn-success mb-4 text-serif bg-lightgreen mx-3 rounded text-dark fs-4 btn-seat" style="height:90px; width:90px">D3</button>
                            <button class="btn btn-success mb-4 text-serif bg-lightgreen mx-3 rounded text-dark fs-4 btn-seat" style="height:90px; width:90px">D4</button>
                            <button class="btn btn-success mb-4 text-serif bg-lightgreen mx-3 rounded text-dark fs-4 btn-seat" style="height:90px; width:90px">D5</button>
                        </div>

                    </div>
                    
                    <div class="col-4 offset-1">
                        <div class="mb-3">
                            <div class="btn col btn-success bg-lightgreen me-3 rounded" style="height:40px; width:40px"></div><span class="fw-semibold">Non-Available</span>
                        </div>
                        <div class="mb-3">
                            <div class="btn col btn-success bg-lightbrown me-3 rounded" style="height:40px; width:40px"></div><span class="fw-semibold">Available</span>
                        </div>
                        <div class="mb-3">
                            <div class="btn col btn-success bg-decor me-3 rounded" style="height:40px; width:40px"></div><span class="fw-semibold">Your Choice</span>
                        </div>

                        <br>
                        <br>
                        <br>

                        <div>
                            <h3 class="title-menu fs-3">Your Choice</h3>
                            <p class="fs-3 fw-light" id="seat-choice"></p>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <a href="/payment" class="btn btn-success rounded-pill float-end py-3 px-4">
                        <i class="fa-solid fs-3 fa-arrow-right align-middle"></i>
                    </a>
                </div>

            </div>
        </div>

    </div>

@endsection
