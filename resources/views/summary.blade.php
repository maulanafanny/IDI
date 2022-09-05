@extends('layouts.app')
@section('title', 'Summary')

@section('content')
    <div class="container py-5">

        {{ Breadcrumbs::render('main') }}

        <div class="card shadows bg-back-white mx-auto" style="width: 60%">
            <div class="card-body p-5">

                <h3 class="title-menu pb-4 fs-3">Payment Summary</h3>

                <div class="">
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

                <div class="my-4">
                    <a href="/success" class="btn btn-success rounded-pill float-end py-3 px-4">
                        <i class="fa-solid fs-3 fa-arrow-right align-middle"></i>
                    </a>
                </div>

            </div>


        </div>

    </div>
@endsection
