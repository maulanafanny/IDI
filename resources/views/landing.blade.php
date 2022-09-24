@extends('layouts.land')
@section('title', 'Home')

@section('content')

    {{-- Hero Start --}}
    <section class="landing-container container mt-5">
        <img class="img-fluid" src="{{ asset('image/hero-coffee.png') }}" alt="hero-coffee" style="filter: brightness(50%)">
    </section>
    {{-- Hero End --}}

    {{-- Quality --}}
    <section class="landing-container container my-5">
        <div class="row justify-content-between bg-success m-0 px-4">
            <div class="w-auto py-4 fw-semibold text-light">
                <div class="align-middle d-inline-block bg-lightbrown me-3 rounded" style="height:50px; width:50px"></div>
                Quality Grade A
            </div>
            <div class="w-auto py-4 fw-semibold text-light">
                <div class="align-middle d-inline-block bg-lightbrown me-3 rounded" style="height:50px; width:50px"></div>
                Quality Grade B
            </div>
            <div class="w-auto py-4 fw-semibold text-light">
                <div class="align-middle d-inline-block bg-lightbrown me-3 rounded" style="height:50px; width:50px"></div>
                Quality Grade C
            </div>
            <div class="w-auto py-4 fw-semibold text-light">
                <div class="align-middle d-inline-block bg-lightbrown me-3 rounded" style="height:50px; width:50px"></div>
                Quality Grade D
            </div>
        </div>
    </section>

    <br><br>

    {{-- Best Seller --}}
    <section class="w-100 bg-lightgreen">
        <br>
        <div class="container landing-container py-5">

            <div class="pb-5">
                <span>
                    <h2 class="fw-semibold d-inline" id="title-best-seller">OUR BEST SELLER</h2>
                </span>
                <span class="d-inline float-end"><a href="/display-menu" id="view-all">View All</a></span>
            </div>

            <div class="splide">
                <div class="splide__track">
                    <div class="splide__list">

                        @foreach ($bestSeller as $best)
                            <div class="splide__slide card bg-success text-light" style="height: 475px">
                                <img src="{{ asset($best->img) }}" class="card-img-top" alt="menu">
                                <div class="card-body">
                                    <h5 class="card-title mb-3 fw-semibold">{{ $best->name }}</h5>
                                    <p class="fw-light">{{ $best->desc }}</p>
                                    <a href="#" class="btn btn-light mb-3">See details ››</a>
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
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus porttitor metus et elit mollis,
                vel scelerisque neque suscipit. Duis commodo a elit ut suscipit. Sed aliquam dui at eros sagittis,
                at dictum libero vestibulum. Fusce vel tellus lobortis, faucibus urna ultricies, rutrum nisl. Nunc
                aliquet tempor ante vitae rhoncus. Vestibulum quis mollis est. Aliquam gravida suscipit orci vel
                finibus. Ut non eros sed velit pellentesque vehicula.
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
        var splide = new Splide('.splide', {
            autoplay: true,
            arrows: false,
            rewind: true,
            interval: 3500,
            perPage: 4,
            focus: 0,
            omitEnd: true,
            gap: '1rem',
        });

        splide.mount();
    </script>
@endpush