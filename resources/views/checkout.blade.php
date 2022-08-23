<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <title>Checkout Page</title>
</head>

<body>
    @foreach ($menus as $menu)
        <form action="/" method="get">
            @csrf
            <div>
                <h3>{{ $menu->name }}</h3>
                <p>{{ $menu->desc }}</p>
                <p><small>${{ $menu->price }}</small></p>
            </div>
            <div>
                <input type="hidden" name="menu_id" class="menu_id" value="{{ $menu->id }}">
                <input type="button" class="submit" value="Add to cart">
            </div>
            <br>
        </form>
    @endforeach

    <script>
        $('.submit').click(function(e) {
            const menu = this.previousElementSibling.value;
            $.ajax({
                url: "/add",
                type: "get",
                data: {
                    menu_id: menu
                },
                success: function() {
                    alert(menu);
                }
            });
        });
    </script>
</body>

</html>
