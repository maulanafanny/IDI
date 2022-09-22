@extends('layouts.app')
@section('title', 'Payment')

@section('content')
    <div class="container py-5">

        {{ Breadcrumbs::render('main') }}

        @if (session()->has('alert'))
            @php
                Alert::error('Oops...', session()->get('alert'));
            @endphp
        @endif

        <div class="card shadows bg-back-white mx-auto w-50">
            <div class="card-body p-5">

                <h3 class="title-menu pb-4 fw-bold">QRCode</h3>

                <div class="col-lg-7 mx-auto text-center">
                    <div class="bg-lightgreen fw-light rounded py-2 mb-4">
                        <i class="fa-solid fa-clock me-2"></i>
                        Sisa waktu pembayaran Anda
                        <span id="timer"></span>
                    </div>
                    <h5 class="text-serif fw-semibold text-success">IDI`COFFEE</h5>
                    <h6>@currency($total)</h6>
                    <img class="py-4" src="{{ asset('image/qrcode.png') }}" alt="barcode">
                    <button class="btn btn-success py-3 px-4 w-100">Unduh QRIS</button>
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

@push('js')
    <script>
        $(document).ready(function() {

            var time = 900;
            var timer = setInterval(function() {
                var seconds = time % 60;
                var minutes = Math.floor(time / 60);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                $('#timer').text(minutes + ':' + seconds);
                time--;
                if (time < 0) {
                    clearInterval(timer);
                }
            }, 1000);

        });
    </script>
@endpush
