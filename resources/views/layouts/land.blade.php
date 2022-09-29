<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @stack('css')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.2/css/all.css" integrity="sha384-fZCoUih8XsaUZnNDOiLqnby1tMJ0sE7oBbNk2Xxf5x8Z4SvNQ9j83vFMa/erbVrV" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <title>IDI' - @yield('title')</title>
</head>

<body class="bg-light">

    {{-- Navbar Start --}}
    <nav class="navbar navbar-expand-lg bg-success py-0 navbar-dark fw-medium shadow-sm">
        <div class="landing-container container">
            <a class="navbar-brand bg-light" href="/">
                <img src="{{ asset('image/logo.png') }}" class="px-5" height="100px" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item mx-4">
                        <a class="nav-link {{ Route::currentRouteName() == 'landing' ? 'active' : '' }}" href="/">Home</a>
                    </li>
                    <li class="nav-item mx-4">
                        <a class="nav-link {{ Route::currentRouteName() == 'landing.menu' ? 'active' : '' }}" href="/display-menu">Produk Kami</a>
                    </li>
                    <li class="nav-item mx-4">
                        <a class="nav-link" href="#">Tentang Kami</a>
                    </li>
                    <li class="nav-item mx-4">
                        <a class="nav-link btn btn-light text-success px-4 fw-semibold" href="/new-order/login">Pesan Sekarang</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    {{-- Navbar End --}}

    {{-- Main Content --}}
    @yield('content')

    {{-- Footer Start --}}
    <footer class="w-100 bg-success">
        <div class="container landing-container">

            <div class="row py-5 navbar-dark text-light justify-content-between align-items-center">
                <div class="col-2 px-0">
                    <img src="{{ asset('image/logo.png') }}" class="mb-4 bg-light rounded ps-3 pe-1 py-1" width="120px" alt="logo">
                </div>

                <ul class="col-lg-3 col navbar-nav">
                    <h4 class="fw-bold mb-4">Contact Us</h4>
                    <li class="d-flex nav-item align-items-center mb-3">
                        <i class="fa-solid fa-phone me-3 fs-5 fa-fw"></i>
                        <a href="#" class="nav-link py-0">0812-3226-0798</a>
                    </li>
                    <li class="d-flex nav-item align-items-center mb-3">
                        <i class="fa-solid fa-envelope me-3 fs-5 fa-fw"></i>
                        <a href="#" class="nav-link py-0">Idicafee@gmail.com</a>
                    </li>
                    <li class="d-flex nav-item align-items-center mb-3">
                        <i class="fa-solid fa-location-dot me-3 fs-5 fa-fw"></i>
                        <a href="#" class="nav-link py-0">Jl. kalikalian no.04, Surabaya</a>
                    </li>
                </ul>

                <ul class="col-lg-2 col navbar-nav">
                    <h4 class="fw-bold mb-4">Information</h4>
                    <li class="d-flex nav-item mb-3 align-items-center">
                        <a href="/display-menu?category=best%20seller" class="nav-link py-0">Best Seller</a>
                    </li>
                    <li class="d-flex nav-item mb-3 align-items-center">
                        <a href="/display-menu" class="nav-link py-0">Menu</a>
                    </li>
                    <li class="d-flex nav-item mb-3 align-items-center">
                        <a href="#" class="nav-link py-0">About Us</a>
                    </li>
                </ul>

                <ul class="col-lg-2 col navbar-nav">
                    <h4 class="fw-bold mb-4">Kategori</h4>
                    <li class="d-flex nav-item mb-3 align-items-center">
                        <a href="/display-menu?category=coffee" class="nav-link py-0">Coffee</a>
                    </li>
                    <li class="d-flex nav-item mb-3 align-items-center">
                        <a href="/display-menu?category=non-coffee" class="nav-link py-0">Non-Coffee</a>
                    </li>
                    <li class="d-flex nav-item mb-3 align-items-center">
                        <a href="/display-menu?category=snack" class="nav-link py-0">Snack</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="footer-copyright text-center py-4 bg-light">
            Copyright © 2022 IDI’ Coffee. All rights reserved.
        </div>

    </footer>

    @stack('js')

</body>

</html>
