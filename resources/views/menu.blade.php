@extends('layouts.app')


@section('content')
    <div class="container py-5">

        <div class="card shadow">
            <div class="card-body px-5">

                <div class="py-5">
                    <a href="#" class="btn rounded-pill btn-lg btn-green active px-4 mx-3">Coffee</a>
                    <a href="#" class="btn rounded-pill btn-lg btn-green px-4 mx-3">Non-Coffee</a>
                    <a href="#" class="btn rounded-pill btn-lg btn-green px-4 mx-3">Milk</a>
                    <a href="#" class="btn rounded-pill btn-lg btn-green px-4 mx-3">Snack</a>
                    <a href="#" class="btn rounded-pill btn-lg btn-green px-4 mx-3">Main Course</a>
                </div>

                <div class="row">
                    @foreach ($menus as $menu)
                        <div class="col-4 mb-5 px-4">
                            <div class="card shadow">

                                <div class="card-body">
                                    <form action="/" method="get">
                                        @csrf
                                        <div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <img class="img-fluid image-menu" src="{{ asset('image/coffee.png') }}" alt="coffee-menu">
                                                </div>
                                                <div class="col-6">
                                                    <h3 class="text-capitalize">{{ $menu->name }}</h3>
                                                    <p class="text-desc">
                                                        Lorem Ipsum refers to a dummy block of text that is often
                                                    </p>
                                                    <p class="fw-semibold fs-5"><small>Rp{{ number_format($menu->price, 2, ',', '.') }}</small></p>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-outline-success fw-semibold w-100 py-3" data-bs-toggle="modal" data-bs-target="#modal-{{ $menu->id }}">
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
                                                                <p class="text-desc">
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
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mb-5">
                    <a class="btn btn-success rounded-pill float-end py-3 px-4"><i class="fa-solid fs-3 fa-arrow-right align-middle"></i></a>
                </div>
                <br>
                <br>
            </div>
        </div>
    </div>
@endsection


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
