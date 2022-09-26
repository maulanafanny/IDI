@extends('layouts.land')
@section('title', 'All Menu')

@section('content')

    <div class="container pt-4 px-lg-5">

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

@endsection

@push('js')
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
@endpush
