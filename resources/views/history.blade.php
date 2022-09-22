@extends('layouts.app')
@section('title', 'History')

@section('content')
    <div class="container py-5">

        {{ Breadcrumbs::render('main') }}

        <div class="card shadows bg-back-white">
            <div class="card-body p-5">

                <h3 class="title-menu pb-4 fs-3">My Order</h3>

                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-12">
                        @foreach ($item as $id => $detail)
                            <div class="card mb-4 shadows">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-lg col-md-3">
                                            <img class="img-fluid image-menu" src="{{ asset($menu[$id - 1]->img) }}" alt="coffee-menu">
                                        </div>
                                        <div class="col">
                                            <h3 class="text-capitalize title-menu">{{ $menu[$id - 1]->name }}</h3>
                                            <p class="title-medium">@currency($menu[$id - 1]->price)</p>
                                            <div class="align-middle m-0">
                                                <span class="menu_quantity fs-4 fw-semibold">{{ $detail['qty'] }}x</span>
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
                                    <div class="sub-categories ms-4">
                                        <p class="fs-5">TAX (11%)<span class="float-end fs-5">@currency($total * 11 / 100)</span></p>
                                    </div>
                                    <h4 class="fw-semibold mt-3">Total<span class="float-end fs-5">@currency($total + ($total * 11 / 100 ) )</span></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="my-5">
                    <a href="/menu" class="btn btn-success rounded-pill float-end py-3 px-4 text-serif fs-5">
                        Back to Menu
                        <i class="fa-solid fs-3 fa-arrow-right align-middle ps-2"></i>
                    </a>
                </div>
            </div>
        </div>

    </div>
@endsection
