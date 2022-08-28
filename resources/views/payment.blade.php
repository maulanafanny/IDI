@extends('layouts.app')
@section('title', 'Cart')

@section('content')
    <div class="container py-5">

        {{ Breadcrumbs::render('main') }}

        <div class="card shadows bg-back-white">
            <div class="card-body p-5">

                <h3 class="title-menu pb-4 fs-3">Payment Summary</h3>

                <div class="row">

                    <div class="col-6 pe-5">
                        <div class="card shadows">
                            <div class="card-body p-5">
                                <h3 class="title-menu fs-3">Total</h3>
                                <br>
                                <div class="col-11">
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
                                    <h4 class="fw-semibold mt-5">Subtotal<span class="float-end fs-5">Rp{{ number_format($order_customer->total, 2, ',', '.') }}</span></h4>
                                </div>
                            </div>
                        </div>

                        <br>

                        <div class="card shadows">
                            <div class="card-body px-5 py-3">
                                <div class="col-11">
                                    <h3 class="title-menu">Seat<span class="float-end">B4</span></h3>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-6">
                        <div class="card shadows">
                            <div class="card-body p-5">
                                <h3 class="title-menu fs-3">Payment Method</h3>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="mb-4">
                    <a href="/seat" class="btn btn-success rounded-pill float-end py-3 px-4">
                        <i class="fa-solid fs-3 fa-arrow-right align-middle"></i>
                    </a>
                </div>
            </div>


        </div>

    </div>
@endsection
