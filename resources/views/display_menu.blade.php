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
    <title>IDI' - All Menu</title>
</head>

<body class="bg-back-white">

    <div class="container landing-container py-5">

        <div class="categories-wrap">
            <div class="pb-3 text-nowrap overflow-auto">
                <button type="button" class="btn btn-categories rounded-pill btn-lg btn-green px-4 me-4">Coffee</button>
                <button type="button" class="btn btn-categories rounded-pill btn-lg btn-green px-4 me-4">Non-Coffee</button>
                <button type="button" class="btn btn-categories rounded-pill btn-lg btn-green px-4 me-4">Snack</button>
                <button type="button" class="btn btn-categories rounded-pill btn-lg btn-green px-4 me-4">Best Seller</button>
            </div>
        </div>

        <div id="menu-list"></div>

        <br>
        <br>
    </div>

    <script>
        @if ($request)
            loadData('{{ $request }}');
            $(".btn-categories").filter(function() {
                return $(this).text().toLowerCase() === "{{ $request }}";
            }).toggleClass('active');
        @else
            loadData();
        @endif

        function loadData(query) {
            $.ajax({
                type: "get",
                url: "/display-list",
                data: {
                    search: query
                },
                success: function(data) {
                    $('#menu-list').html(data);
                }
            });
        }

        $('.btn-categories').click(function(e) {
            e.preventDefault();

            if (this.classList.contains('active')) {
                $(this).removeClass('active');
                loadData();
            } else {
                $('.btn-categories').removeClass('active');
                $(this).toggleClass('active');

                const search = $(this).text();

                loadData(search);
            }

        });
    </script>

</body>

</html>
