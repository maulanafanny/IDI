@extends('layouts.app')
@section('title', 'Payment')

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
                                        @foreach ($item as $id => $detail)
                                            <p class="fs-5">{{ $menu[$id - 1]->category }}</p>
                                                <div class="sub-categories ms-4 text-green-regular">
                                                    <p class="fs-5">{{ $menu[$id - 1]->name }}<span class="float-end fs-5">Rp{{ number_format($menu[$id - 1]->price * $detail['qty'], 2, ',', '.') }}</span></p>
                                                </div>
                                        @endforeach
                                    </div>
                                    <h4 class="fw-semibold mt-5">Subtotal<span class="float-end fs-5">Rp{{ number_format($total, 2, ',', '.') }}</span></h4>
                                </div>
                            </div>
                        </div>

                        <br>

                        <div class="card shadows">
                            <div class="card-body px-5 py-3">
                                <div class="col-11">
                                    <h3 class="title-menu my-2">Seat<span class="float-end">{{ $seat }}</span></h3>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-6">
                        <div class="card shadows">
                            <div class="card-body p-5">
                                <h3 class="title-menu fs-3">Payment Method</h3>
                                <br>
                                <div class="col-9">

                                    <div class="row mb-2 align-items-center">
                                        <div class="col-2">
                                            <img src="{{ asset('image/qris.png') }}" alt="qris" class="w-100">
                                        </div>
                                        <div class="text-serif fs-5 p-0 ms-3 col">Qris</div>
                                        <button class="btn btn-payment col-2"><i class="fa-solid fa-check fs-3"></i></button>
                                    </div>
                                    <div class="row mb-2 align-items-center">
                                        <div class="col-2"></div>
                                        <hr class="ms-3 payment-line col m-0">
                                        <div class="col-2"></div>
                                    </div>
                                    
                                    <div class="row mb-2 align-items-center">
                                        <div class="col-2">
                                            <img src="{{ asset('image/dana.png') }}" alt="dana" class="w-100">
                                        </div>
                                        <div class="text-serif fs-5 p-0 ms-3 col">DANA</div>
                                        <button class="btn btn-payment col-2"><i class="fa-solid fa-check fs-3"></i></button>
                                    </div>
                                    <div class="row mb-2 align-items-center">
                                        <div class="col-2"></div>
                                        <hr class="ms-3 payment-line col m-0">
                                        <div class="col-2"></div>
                                    </div>

                                    <div class="row mb-2 align-items-center">
                                        <div class="col-2">
                                            <img src="{{ asset('image/ovo.png') }}" alt="ovo" class="w-100">
                                        </div>
                                        <div class="text-serif fs-5 p-0 ms-3 col">OVO</div>
                                        <button class="btn btn-payment col-2"><i class="fa-solid fa-check fs-3"></i></button>
                                    </div>
                                    <div class="row mb-2 align-items-center">
                                        <div class="col-2"></div>
                                        <hr class="ms-3 payment-line col m-0">
                                        <div class="col-2"></div>
                                    </div>

                                    <div class="row mb-2 align-items-center">
                                        <div class="col-2">
                                            <img src="{{ asset('image/gopay.png') }}" alt="gopay" class="w-100">
                                        </div>
                                        <div class="text-serif fs-5 p-0 ms-3 col">GO-PAY</div>
                                        <button class="btn btn-payment col-2"><i class="fa-solid fa-check fs-3"></i></button>
                                    </div>
                                    <div class="row mb-2 align-items-center">
                                        <div class="col-2"></div>
                                        <hr class="ms-3 payment-line col m-0">
                                        <div class="col-2"></div>
                                    </div>

                                    <div class="row mb-2 align-items-center">
                                        <div class="col-2">
                                            <img src="{{ asset('image/linkaja.png') }}" alt="linkaja" class="w-100">
                                        </div>
                                        <div class="text-serif fs-5 p-0 ms-3 col">Link Aja</div>
                                        <button class="btn btn-payment col-2"><i class="fa-solid fa-check fs-3"></i></button>
                                    </div>
                                    <div class="row mb-2 align-items-center">
                                        <div class="col-2"></div>
                                        <hr class="ms-3 payment-line col m-0">
                                        <div class="col-2"></div>
                                    </div>

                                    <div class="row mb-2 align-items-center">
                                        <div class="col-2">
                                            <img src="{{ asset('image/spay.png') }}" alt="spay" class="w-100">
                                        </div>
                                        <div class="text-serif fs-5 p-0 ms-3 col">ShopeePay</div>
                                        <button class="btn btn-payment col-2"><i class="fa-solid fa-check fs-3"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="my-4">
                    <a href="/summary" class="btn btn-success rounded-pill float-end py-3 px-4">
                        <i class="fa-solid fs-3 fa-arrow-right align-middle"></i>
                    </a>
                </div>
            </div>


        </div>

    </div>
@endsection
