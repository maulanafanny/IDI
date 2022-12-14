@extends('layouts.app')
@section('title', 'Menu List')

@section('csrf')
    <meta name="csrf_token" content="{{ csrf_token() }}" />
@endsection

@section('content')

    <div class="container py-5">

        {{ Breadcrumbs::render('main') }}

        @if (session()->has('alert'))
            @php
                Alert::error('Oops...', session()->get('alert'));
            @endphp
        @endif

        <div class="card shadows bg-back-white">
            <div class="card-body px-md-5">

                <div class="categories-wrap">
                    <div class="pb-3 text-nowrap overflow-auto">
                        <button type="button" class="btn btn-categories rounded-pill btn-lg btn-green px-4 me-4">Coffee</button>
                        <button type="button" class="btn btn-categories rounded-pill btn-lg btn-green px-4 me-4">Non-Coffee</button>
                        <button type="button" class="btn btn-categories rounded-pill btn-lg btn-green px-4 me-4">Snack</button>
                    </div>
                </div>

                <div id="menu-list">

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

@push('js')
    <script>
        loadData();

        function loadData(query) {
            $.ajax({
                type: "get",
                url: "/list",
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
@endpush
