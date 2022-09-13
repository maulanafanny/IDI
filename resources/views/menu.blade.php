@extends('layouts.app')
@section('title', 'Menu List')

@section('content')

    <div class="container py-5">

        {{ Breadcrumbs::render('main') }}

        @dump($session)

        <div class="card shadows bg-back-white">
            <div class="card-body px-md-5">

                <div class="categories-wrap">
                    <div class="pb-3 text-nowrap overflow-auto">
                        <a href="#" class="btn rounded-pill btn-lg btn-green active px-4 me-4">Coffee</a>
                        <a href="#" class="btn rounded-pill btn-lg btn-green px-4 me-4">Non-Coffee</a>
                        <a href="#" class="btn rounded-pill btn-lg btn-green px-4 me-4">Milk</a>
                        <a href="#" class="btn rounded-pill btn-lg btn-green px-4 me-4">Snack</a>
                        <a href="#" class="btn rounded-pill btn-lg btn-green px-4 me-4">Main Course</a>
                    </div>
                </div>

                <div class="row">
                    @foreach ($menus as $menu)
                        <div class="col-lg-4 col-md-6 mb-5 px-4">
                            <div class="card shadows">

                                <div class="card-body">
                                    <form action="/" method="get">
                                        @csrf
                                        <div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <img class="img-fluid image-menu" src="{{ asset('image/coffee.png') }}" alt="coffee-menu">
                                                </div>
                                                <div class="col-6">
                                                    <h3 class="text-capitalize title-menu">{{ $menu->name }}</h3>
                                                    <p class="text-desc mb-2">Lorem Ipsum refers to a dummy block of text that is often</p>
                                                    <p class="fw-semibold title-medium">@currency($menu->price)</p>
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
                                                                <h3 class="text-capitalize title-menu mb-3">{{ $menu->name }}</h3>
                                                                <p class="text-desc">{{ $menu->desc }}</p>
                                                                <div style="width: 180px" class="text-center align-middle">
                                                                    <a class="btn btn-min btn-outline-success btn-range float-start"><i class="fa-solid fa-minus fa-fw"></i></a>
                                                                    <span class="menu_quantity fs-4 fw-semibold">1</span>
                                                                    <a class="btn btn-plus btn-outline-success btn-range float-end"><i class="fa-solid fa-plus fa-fw"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 pt-3">
                                                                <div class="form-label fw-semibold text-secondary">Notes</div>
                                                                <textarea name="notes" class="form-control notes" style="resize: none" rows="4"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer border-0">
                                                        <input type="hidden" id="menu_id" value="{{ $menu->id }}">
                                                        <input type="button" class="btn submit btn-success w-100 py-2 fw-semibold" value="Add to Cart">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Modal End --}}

                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mb-5">
                    <a href="/cart" class="btn btn-success rounded-pill float-end py-3 px-4 text-serif fs-5">
                        Keranjang
                        <i class="fa-solid fs-3 fa-arrow-right align-middle ps-2"></i>
                    </a>
                </div>
                <br>
                <br>
            </div>
        </div>
    </div>
@endsection
