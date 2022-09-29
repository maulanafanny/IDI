@extends('layouts.land')
@section('title', 'Home')

@section('content')

    {{-- Hero Start --}}
    <section id="image-carousel" class="splide landing-container container mt-5" aria-label="Hero Images">
        <div class="splide__track">
            <ul class="splide__list">
                <li class="splide__slide position-relative">
                    <a href="#best-seller" class="btn btn-lg btn-light position-absolute" style="z-index: 1000; bottom:24%; left:7%">Lihat menu</a>
                    <img src="{{ asset('image/hero-best.jpg') }}" alt="hero-1">
                </li>
                <li class="splide__slide">
                    <img src="{{ asset('image/hero-open.jpg') }}" alt="hero-2">
                </li>
                <li class="splide__slide">
                    <img src="{{ asset('image/hero-coffee.png') }}" alt="hero-3">
                </li>
            </ul>
        </div>
    </section>
    {{-- Hero End --}}

    {{-- Quality --}}
    <section class="landing-container container my-5">
        <div class="row justify-content-between bg-success m-0 px-4">
            <div class="w-auto py-4 fw-semibold text-light">
                <div class="align-middle d-inline-block bg-lightbrown me-3 rounded" style="height:50px; width:50px"></div>
                Cashless Payment
            </div>
            <div class="w-auto py-4 fw-semibold text-light">
                <div class="align-middle d-inline-block bg-lightbrown me-3 rounded" style="height:50px; width:50px"></div>
                Best Quality
            </div>
            <div class="w-auto py-4 fw-semibold text-light">
                <div class="align-middle d-inline-block bg-lightbrown me-3 rounded" style="height:50px; width:50px"></div>
                Seat Reservation
            </div>
            <div class="w-auto py-4 fw-semibold text-light">
                <div class="align-middle d-inline-block bg-lightbrown me-3 rounded" style="height:50px; width:50px"></div>
                Pet Friendly
            </div>
        </div>
    </section>

    <br><br>

    {{-- Best Seller --}}
    <section class="w-100 bg-lightgreen" id="best-seller">
        <br>
        <div class="container landing-container py-5">

            <div class="pb-5">
                <span>
                    <h2 class="fw-semibold d-inline" id="title-best-seller">OUR BEST SELLER</h2>
                </span>
                <span class="d-inline float-end"><a href="/display-menu" id="view-all">View All</a></span>
            </div>

            <div class="splide" id="menu-slide">
                <div class="splide__track">
                    <div class="splide__list">

                        @foreach ($bestSeller as $best)
                            <div class="splide__slide card bg-success text-light">
                                <img src="{{ asset($best->img) }}" class="card-img-top" alt="menu">
                                <div class="card-body position-relative">
                                    <h5 class="card-title mb-3 fw-semibold">{{ $best->name }}</h5>
                                    <p class="fw-light">{{ $best->desc }}</p>
                                    <a href="#" class="btn btn-light mb-3 position-absolute bottom-0">See details ››</a>
                                </div>
                            </div>
                        @endforeach

                    </div>

                    <ul class="splide__pagination mt-5 position-relative"></ul>

                </div>
            </div>

        </div>
        <br>
    </section>
    {{-- Best Seller End --}}

    {{-- About --}}
    <section class="bg-lightbrown w-100">
        <br>
        <div class="container landing-container py-5 text-center text-light">
            <h3 class="fw-semibold pb-4">IDI’ COFFE</h3>
            <p class="col-9 mx-auto" style="line-height: 2.5">
                IDI’ Coffee Shop adalah sebuah cafe  yang menggunakan Website untuk proses pemesanan 
                dan transaksi pembayaran. IDI’ coffee sendiri memiliki arti “kita” dalam bahasa bugis. 
                Konsep dari cafe ini kami menggunakan gabungan latar belakang nusantara dan western
            </p>
        </div>
        <br>
    </section>

@endsection

@push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.2/dist/css/splide.min.css">
@endpush

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.2/dist/js/splide.min.js"></script>
    <script>
        new Splide('#menu-slide', {
            autoplay: true,
            arrows: false,
            rewind: true,
            interval: 3500,
            perPage: 4,
            focus: 0,
            omitEnd: true,
            gap: '1rem',
            height: '475px',
        }).mount();

        new Splide('#image-carousel', {
            autoplay: true,
            rewind: true,
            interval: 3500,
            focus: 0,
            omitEnd: true,
        }).mount();
    </script>
@endpush
