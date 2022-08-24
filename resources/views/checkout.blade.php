<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
        crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.2/css/all.css" integrity="sha384-fZCoUih8XsaUZnNDOiLqnby1tMJ0sE7oBbNk2Xxf5x8Z4SvNQ9j83vFMa/erbVrV" crossorigin="anonymous" />
    <script src="{{ asset('js/script.js') }}"></script>
    <title>Menu Page</title>
</head>

<body>
    @foreach ($menus as $menu)
        <form action="/" method="get">
            @csrf
            <div>
                <h3>{{ $menu->name }}</h3>
                <p>{{ $menu->desc }}</p>
                <p><small>Rp {{ number_format($menu->price, 2, ',', '.') }}</small></p>
            </div>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#modal-{{ $menu->id }}">
                Add to Cart
            </button>

            <!-- Modal -->
            <div class="modal fade" id="modal-{{ $menu->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content py-3 px-3">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-6">
                                    <img class="img-fluid image-menu" src="{{ asset('image/coffee.png') }}" alt="coffee-menu">
                                </div>
                                <div class="col-6">
                                    <p class="fw-light">
                                        {{ $menu->desc }}
                                    </p>
                                    <div class="">
                                        <a class="btn btn-min btn-range btn-outline-success"><i class="fa-solid fs-4 fa-minus align-middle"></i></a>
                                        <span class="mx-4 menu_quantity fs-4 fw-semibold align-middle">1</span>
                                        <a class="btn btn-plus btn-range btn-outline-success"><i class="fa-solid fs-4 fa-plus align-middle"></i></a>
                                    </div>
                                </div>
                                <div class="col-12 pt-3">
                                    <div class="form-label fw-semibold text-secondary">Notes</div>
                                    <textarea name="notes" id="notes" class="form-control" rows="4"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer border-0">
                            <input type="hidden" id="menu_id" value="{{ $menu->id }}">
                            <input type="button" class="btn submit btn-success w-100 py-2" value="Add to Cart">
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <br>
        <br>
    @endforeach

    <script>
        $('.submit').click(function(e) {
            const menu = this.previousElementSibling.value;
            const quantity = this.closest('.modal-footer').previousElementSibling.querySelector('.menu_quantity').innerText;
            $.ajax({
                url: "/add",
                type: "get",
                data: {
                    menu_id: menu,
                    quantity: quantity
                },
                success: function() {
                    alert(menu + ' ' + quantity);
                }
            });
        });
    </script>
</body>

</html>
