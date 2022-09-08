@extends('layouts.app')
@section('title', 'Success')

@section('content')
    
<div class="container py-5 centered">

    <div class="card shadows bg-back-white m-auto text-center w-50">
        <div class="card-body p-5">

            <div class="col-8 mx-auto">

                <div class="pb-5 pt-4"><i class="fa-solid fa-circle-check fa-9x text-success"></i></div>

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