@extends('layouts.app')
@section('title', 'Check Out')

@section('content')
    <div class="container py-5">

        <div class="card shadow">
            <div class="card-body p-5">

                <h3 class="title-menu pb-4">We welcomed everyone by heart.</h3>

                <div class="row">
                    <div class="col-4 mx-3">
                        @foreach ($menus as $menu)
                            <div class="card mb-4 shadow">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <img class="img-fluid image-menu" src="{{ asset('image/coffee.png') }}" alt="coffee-menu">
                                        </div>
                                        <div class="col-6">
                                            <div class="">
                                                <h3 class="text-capitalize title-menu">{{ $menu->name }}</h3>
                                                <p class="fs-5"><small>Rp{{ number_format($menu->price, 2, ',', '.') }}</small></p>
                                                <a class="btn btn-min btn-range btn-outline-success"><i class="fa-solid fs-4 fa-minus align-middle"></i></a>
                                                <span class="mx-4 menu_quantity fs-4 fw-semibold align-middle">1</span>
                                                <a class="btn btn-plus btn-range btn-outline-success"><i class="fa-solid fs-4 fa-plus align-middle"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="col-7 ms-4">
                        <div class="card shadow">
                            <div class="card-body p-5">
                                <h3 class="title-menu">Report Payment</h3>
                                <br>
                                <div class="col-10">
                                    <div class="categories ms-5 text-success mb-4">
                                        <p class="fs-5">Coffee</p>
                                        <div class="sub-categories ms-4 text-green-regular">
                                            <p class="fs-5">Coffee A<span class="float-end fs-5">Rp18.000,00</span></p>
                                            <p class="fs-5">Coffee B<span class="float-end fs-5">Rp26.000,00</span></p>
                                        </div>
                                        <p class="fs-5">Snack</p>
                                        <div class="sub-categories ms-4 text-green-regular">
                                            <p class="fs-5">French Fries<span class="float-end fs-5">Rp30.000,00</span></p>
                                        </div>
                                    </div>
                                    <h4 class="fw-semibold">Subtotal<span class="float-end fs-5">Rp74.000,00</span></h4>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
