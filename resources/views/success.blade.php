@extends('layouts.app')
@section('title', 'Success')

@section('content')
    
<div class="container py-5 centered">

    <div class="card shadows bg-back-white m-auto text-center w-50">
        <div class="card-body p-5">

            <div class="col-8 mx-auto">

                <div class="pb-5 pt-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="180" height="180" fill="currentColor" class="bi bi-patch-check-fill text-success fa-beat-fade" style="--fa-beat-scale: 1.2;" viewBox="0 0 16 16">
                        <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                    </svg>
                </div>

                <div class="col-11 mx-auto">
                    <h3 class="text-serif mb-3">Payment Success</h3>
                    <p>Your payment was successful and you can start enjoy your order</p>
        
                    <h5 class="text-serif mt-4">Thank You</h5>
                </div>

                <br><br>
    
                <a href="/history" class="btn btn-outline-success w-100 fw-bold py-2 my-2">See My Order</a>
                <a href="/menu" class="btn btn-outline-danger w-100 fw-bold py-2 my-2">Back to Menu</a>

                <br>
                <br>
            </div>


        </div>


    </div>

</div>

@endsection