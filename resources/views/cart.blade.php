@extends('layouts.app')
@section('title', 'Cart')

@section('content')

    <div class="container py-5">

        {{ Breadcrumbs::render('main') }}

        <div class="card shadows bg-back-white">
            <div class="card-body p-5">

                <h3 class="title-menu pb-4">We welcome everyone by heart.</h3>

                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-12">
                        @foreach ($item as $id => $detail)
                            <div class="card mb-4 shadows">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-lg col-md-3">
                                            <img class="img-fluid image-menu" src="{{ asset('image/coffee.png') }}" alt="coffee-menu">
                                        </div>
                                        <div class="col">
                                            <h3 class="text-capitalize title-menu">{{ $menu[$id - 1]->name }}</h3>
                                            <p class="title-medium">@currency($menu[$id - 1]->price)</p>
                                            <div style="width: 160px" class="text-center align-middle m-0">
                                                <a class="btn btn-min btn-outline-success btn-range float-start"><i class="fa-solid fa-minus fs-6"></i></a>
                                                <span class="menu_quantity fs-4 fw-semibold">{{ $detail['qty'] }}</span>
                                                <a class="btn btn-plus btn-outline-success btn-range float-end"><i class="fa-solid fa-plus fs-6"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="col-lg-7 col-12 ms-xl-4">
                        <div class="card shadows">
                            <div class="card-body p-5">
                                <h3 class="title-menu">Report Payment</h3>
                                <br>
                                <div class="col-10">
                                    <div class="categories ms-5 text-success mb-4">
                                        @foreach ($item as $id => $detail)
                                            <p class="fs-5">{{ $menu[$id - 1]->category }}</p>
                                            {{-- @foreach ($value as $item) --}}
                                                <div class="sub-categories ms-4 text-green-regular">
                                                    <p class="fs-5">{{ $menu[$id - 1]->name }}<span class="float-end fs-5">@currency($menu[$id - 1]->price * $detail['qty'])</span></p>
                                                </div>
                                            {{-- @endforeach --}}
                                        @endforeach
                                    </div>
                                    <h4 class="fw-semibold mt-5">Subtotal<span class="float-end fs-5">@currency($total)</span></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="my-5">
                    <a href="/seat" class="btn btn-success rounded-pill float-end py-3 px-4 text-serif fs-5">
                        Meja
                        <i class="fa-solid fs-3 fa-arrow-right align-middle ps-2"></i>
                    </a>
                </div>
            </div>
        </div>

    </div>
@endsection
