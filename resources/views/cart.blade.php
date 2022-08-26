@extends('layouts.app')
@section('title', 'Check Out')

@section('content')

    {{ Breadcrumbs::render('cart') }}

    <div class="container py-5">

        <div class="card shadows bg-back-white">
            <div class="card-body p-5">

                <h3 class="title-menu pb-4">We welcomed everyone by heart.</h3>

                <div class="row">
                    <div class="col-4 mx-3">
                        @foreach ($orders as $order)
                            <div class="card mb-4 shadows">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <img class="img-fluid image-menu" src="{{ asset('image/coffee.png') }}" alt="coffee-menu">
                                        </div>
                                        <div class="col-6">
                                            <div class="">
                                                <h3 class="text-capitalize title-menu">{{ $order->menu->name }}</h3>
                                                <p class="fs-5"><small>Rp{{ number_format($order->menu->price, 2, ',', '.') }}</small></p>
                                                <a class="btn btn-min btn-range btn-outline-success"><i class="fa-solid fs-4 fa-minus align-middle"></i></a>
                                                <span class="mx-4 menu_quantity fs-4 fw-semibold align-middle">{{ $order->quantity }}</span>
                                                <a class="btn btn-plus btn-range btn-outline-success"><i class="fa-solid fs-4 fa-plus align-middle"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="col-7 ms-4">
                        <div class="card shadows">
                            <div class="card-body p-5">
                                <h3 class="title-menu">Report Payment</h3>
                                <br>
                                <div class="col-10">
                                    <div class="categories ms-5 text-success mb-4">
                                        @foreach ($payments as $order => $value)
                                            <p class="fs-5">{{ $order }}</p>
                                            @foreach ($value as $item)
                                                <div class="sub-categories ms-4 text-green-regular">
                                                    <p class="fs-5">{{ $item->menu->name }}<span class="float-end fs-5">Rp{{ number_format($item->menu->price, 2, ',', '.') }}</span></p>
                                                </div>
                                            @endforeach
                                        @endforeach
                                    </div>
                                    <h4 class="fw-semibold">Subtotal<span class="float-end fs-5">Rp{{ number_format($order_customer->total, 2, ',', '.') }}</span></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <a href="/checkout" class="btn btn-success rounded-pill float-end py-3 px-4"><i class="fa-solid fs-3 fa-arrow-right align-middle"></i></a>
                </div>
            </div>
        </div>

    </div>
@endsection