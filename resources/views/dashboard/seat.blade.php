@extends('layouts.dash')

@section('content')
    <div class="card shadows bg-back-white">
        <div class="card-body p-5">

            <br>
            <br>

            <div class="row">
                <div class="col-xl-7 col">

                    <form action="/updateseat" method="post">
                        @csrf

                        <div class="row mb-4">
                            @foreach ($seats as $seat)
                                <button class="btn btn-success mb-4 text-serif {{ $seat->status ? 'bg-lightgreen text-dark' : 'bg-disabled text-light' }} mx-3 rounded fs-4 btn-seat"
                                    style="height:90px; width:90px">
                                    {{ $seat->seat }}
                                </button>
                                <input type="hidden" name="seat[]" class="seat-input" value="{{ $seat->status ? 'true' : 'false' }}">
                            @endforeach
                        </div>

                </div>

                <div class="col-4 offset-xl-1 position-relative">
                    <div class="mb-3">
                        <div class="align-middle d-inline-block bg-lightgreen me-3 rounded" style="height:40px; width:40px"></div>
                        <span class="fw-semibold">Available</span>
                    </div>
                    <div class="mb-3">
                        <div class="align-middle d-inline-block bg-disabled me-3 rounded" style="height:40px; width:40px"></div>
                        <span class="fw-semibold">Occupied</span>
                    </div>

                    <div class="pb-5 position-absolute bottom-0">
                        <button type="submit" class="btn btn-success rounded-pill py-3 px-4 text-serif fs-5">
                            Simpan Perubahan
                        </button>
                    </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('.btn-seat').click(function(e) {
                e.preventDefault();
                $(this).toggleClass('bg-lightgreen text-dark bg-disabled text-light');

                console.log($(this).next());

                $(this).next().val( () => $(this).hasClass('bg-lightgreen') ? 'true' : 'false' );
            });
        });
    </script>
@endpush
