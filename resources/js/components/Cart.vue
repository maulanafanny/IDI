<template>
    <div class="container py-5">

        <div class="card shadows bg-back-white">
            <div class="card-body p-5">

                <h3 class="title-menu pb-4">We welcome everyone by heart.</h3>

                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-12">
                        <form action="/update" method="POST">

                            <!-- Foreach Start -->
                            <div class="card mb-4 shadows">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-lg col-md-3">
                                            <img class="img-fluid image-menu" src="{{  }}" alt="coffee-menu">
                                        </div>
                                        <div class="col">
                                            <h3 class="text-capitalize title-menu">{{  }}</h3>
                                            <p class="title-medium">{{  }}</p>
                                            <div style="width: 160px" class="text-center align-middle m-0">
                                                <a class="btn btn-min btn-outline-success btn-range float-start"><i class="fa-solid fa-minus fs-6"></i></a>
                                                <span class="menu_quantity fs-4 fw-semibold">{{  }}</span>
                                                <a class="btn btn-plus btn-outline-success btn-range float-end"><i class="fa-solid fa-plus fs-6"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input class="input_quantity" type="hidden" name="changes[{{  }}]" value="{{  }}">
                            </div>
                            <!-- Foreach End -->

                            <button type="submit" class="btn btn-success rounded-pill py-3 px-4 text-serif fs-5" id="btn-save-changes">
                                Save Changes
                            </button>
                        </form>
                    </div>

                    <div class="col-lg-7 col-12 ms-xl-4">
                        <div class="card shadows">
                            <div class="card-body p-5">
                                <h3 class="title-menu">Report Payment</h3>
                                <br>
                                <div class="col-10">
                                    <div class="categories ms-5 text-success mb-4">
                                        <!-- Foreach Start -->
                                        <p class="fs-5">{{  }}</p>
                                        <div class="sub-categories ms-4 text-green-regular">
                                            <p class="fs-5">{{  }}<span class="float-end fs-5">{{  }}</span></p>
                                        </div>
                                        <!-- Foreach End -->
                                    </div>
                                    <h4 class="fw-semibold mt-5">Subtotal<span class="float-end fs-5">{{  }}</span></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="my-5">
                    <router-link to="/new-order/seat" class="btn btn-success rounded-pill float-end py-3 px-4 text-serif fs-5">
                        Pilih Meja
                        <i class="fa-solid fs-3 fa-arrow-right align-middle ps-2"></i>
                    </router-link>
                </div>
            </div>
        </div>

    </div>
</template>