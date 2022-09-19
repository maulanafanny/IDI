<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.2/css/all.css" integrity="sha384-fZCoUih8XsaUZnNDOiLqnby1tMJ0sE7oBbNk2Xxf5x8Z4SvNQ9j83vFMa/erbVrV" crossorigin="anonymous" />
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="{{ asset('js/script.js') }}"></script>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <title>IDI' - Home</title>
</head>

<body class="bg-light">

    {{-- Navbar Start --}}
    <nav class="navbar navbar-expand-lg bg-success py-0 navbar-dark fw-medium shadow-sm">
        <div class="landing-container container">
            <a class="navbar-brand bg-light" href="#">
                <img src="{{ asset('image/logo.png') }}" class="px-5" height="100px" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item mx-4">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item mx-4">
                        <a class="nav-link" href="#">Produk Kami</a>
                    </li>
                    <li class="nav-item mx-4">
                        <a class="nav-link" href="#">Tentang Kami</a>
                    </li>
                    <li class="nav-item mx-4">
                        <a class="nav-link btn btn-light text-success px-4 fw-semibold" href="/login">Pesan Sekarang</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    {{-- Navbar End --}}


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
            <h2 class="fw-semibold pb-5" id="title-best-seller">OUR BEST SELLER</h2>

            <div class="row pb-4">

                @foreach ($bestSeller as $best)
                    <div class="col-3">
                        <div class="card bg-success text-light" style="height: 475px">
                            <img src="{{ asset($best->img) }}" class="card-img-top" alt="menu">
                            <div class="card-body position-relative">
                                <h5 class="card-title mb-3 fw-semibold">{{ $best->name }}</h5>
                                <p class="fw-light">{{ $best->desc }}</p>
                                <a href="#" class="btn btn-light mb-3 position-absolute" style="bottom: 10px">See Details ››</a>
                            </div>
                        </div>
                    </div>
                @endforeach

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


    {{-- Footer Start --}}
    <footer class="w-100 bg-success">
        <div class="container landing-container">

            <div class="row py-5 navbar-dark text-light">
                <div class="row">
                    <div class="col-3 px-0">
                        <img src="{{ asset('image/logo.png') }}" class="mb-4 bg-light rounded ps-3 pe-1 py-1" width="120px" alt="logo">
                    </div>
                </div>

                <ul class="col-3 navbar-nav">
                    <h4 class="fw-bold mb-4">Contact Us</h4>
                    <li class="d-flex nav-item align-items-center mb-3 fw-light">
                        <i class="fa-solid fa-phone me-3 fs-4 fa-fw"></i>
                        <a href="#" class="nav-link py-0">0812-3226-0798</a>
                    </li>
                    <li class="d-flex nav-item align-items-center mb-3 fw-light">
                        <i class="fa-solid fa-envelope me-3 fs-4 fa-fw"></i>
                        <a href="#" class="nav-link py-0">Idicafee@gmail.com</a>
                    </li>
                    <li class="d-flex nav-item align-items-center mb-3 fw-light">
                        <i class="fa-solid fa-location-dot me-3 fs-4 fa-fw"></i>
                        <a href="#" class="nav-link py-0">Jl. kalikalian no.04, Surabaya</a>
                    </li>
                </ul>

                <ul class="col-3 offset-md-1 navbar-nav">
                    <h4 class="fw-bold mb-4">Information</h4>
                    <li class="d-flex nav-item mb-3 align-items-center fw-light">
                        <a href="#" class="nav-link py-0">Best Seller</a>
                    </li>
                    <li class="d-flex nav-item mb-3 align-items-center fw-light">
                        <a href="#" class="nav-link py-0">Menu</a>
                    </li>
                    <li class="d-flex nav-item mb-3 align-items-center fw-light">
                        <a href="#" class="nav-link py-0">About Us</a>
                    </li>
            </div>
        </div>

        </div>

    </footer>

</body>

</html>
