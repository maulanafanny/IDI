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
    <title>IDI` - Dashboard</title>
</head>
<body>
    <!-- === wrapper section === -->
    <section id="wrapper" class="d-flex w-100">
        <!-- aside nav-->
        <aside class="border-right shadow-sm" id="aside-nav" style="z-index: 5000">
            <!-- aside logo brand -->
            <a href="#" class="aside-brand text-decoration-none mb-4">
                <img src="{{ asset('image/logo.png') }}" class="px-5" height="100px" alt="logo">
            </a>
            <!-- /aside logo brand -->

            <!-- aside nav ul list -->
            <ul class="nav flex-column" id="aside-nav-ul">
                <li class="nav-item mx-3 mb-3">
                    <a class="nav-link shadow-sm {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}" href="/dash">
                        <i class="fa-solid fa-fw fa-house fs-5" style="vertical-align: middle;"></i>
                        <span class="ms-2 fs-6 align-middle">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item mx-3 mb-3">
                    <a class="nav-link shadow-sm {{ Route::currentRouteName() == 'dash.order' ? 'active' : '' }}" href="/dash/order">
                        <i class="fa-solid fa-fw fa-receipt fs-5" style="vertical-align: middle;"></i>
                        <span class="ms-2 fs-6 align-middle">Order</span>
                    </a>
                </li>
                <li class="nav-item mx-3 mb-3">
                    <a class="nav-link shadow-sm {{ Route::currentRouteName() == 'menu.index' ? 'active' : '' }}" href="/dash/menu">
                        <i class="fa-solid fa-fw fa-border-all fs-5" style="vertical-align: middle;"></i>
                        <span class="ms-2 fs-6 align-middle">Menu</span>
                    </a>
                </li>
            </ul>
            <!-- /aside nav ul list -->
        </aside>
        <!-- /aside nav-->

        <!-- === main === -->
        <main class="w-100 d-flex flex-column dash" id="main">
            <!-- === header === -->
            <header id="header-navbar" class="sticky-top w-100">
                <nav class="navbar navbar-expand navbar-dark bg-success shadow-sm w-100" style="height: 100px">
                    <div class="container-fluid">

                        <div class="border rounded-circle shadow-sm p-2 d-lg-none" id="aside-toggle-btn">
                            <!-- svg -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="white"
                                class="bi bi-list" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                            </svg>
                            <!-- /svg -->
                        </div>

                        <h4 class="me-auto text-light my-auto ps-4 fw-semibold">Dashboard</h4>

                        <div>
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item dropdown user-dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span>Fanny Maulana</span>
                                    </a>
                                    <ul class="dropdown-menu shadow-sm" aria-labelledby="navbarDropdownMenuLink">
                                        <li><a class="dropdown-item" href="/">Home</a></li>
                                        {{-- <li><a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                               Logout
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </li> --}}

                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>
            <!-- === /header === -->

            <!-- === main body section start === -->
            
            <div class="p-5">
                @yield('content')
            </div>

            <!-- === footer === -->
            {{-- <footer id="footer" class="bg-dark py-3 text-white text-center shadow-sm mt-auto">
                <div>Copyright © Bookslide 2022. All Rights Reserved.</div>
            </footer> --}}
            <!-- === /footer === -->

        </main>
        <!-- === /main === -->


    </section>
    <!-- === /wrapper section === -->

    @stack('js')
</body>
</html>