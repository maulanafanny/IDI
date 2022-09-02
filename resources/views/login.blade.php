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
    <title>Login - IDI'</title>
</head>

<body class="bg-decor">

    <div class="col-5 mx-auto m-5">
        <div class="card">
            <div class="card-body p-5 mx-auto w-75">
                <br>
                <form action="/sessionStore" method="post">
                    @csrf
                    <img src="{{ asset('image/login.png') }}" alt="login-illustration" class="img-fluid mb-4 px-4">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" aria-label="name">
                    </div>
                    <div class="mb-4">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" name="phone" aria-label="phone">
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="radio" value="take-away" name="seat_option">
                        <label class="form-check-label" for="take-away">Take-away</label>
                    </div>
                    <div class="form-check mb-5">
                        <input class="form-check-input" type="radio" value="dine-in" name="seat_option" checked>
                        <label class="form-check-label" for="dine-in">Dine-in</label>
                    </div>
                    <input type="submit" class="btn btn-success w-100 py-3 fw-semibold" value="Get Started">
                </form>
                <br>
            </div>
        </div>
    </div>

</body>

</html>
