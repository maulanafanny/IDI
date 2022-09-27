<template>
    <div class="container py-5">

        <div class="card shadows bg-back-white">
            <div class="card-body p-5">

                <h3 class="title-menu pb-4 fs-3">Payment Summary</h3>

                <div class="row">

                    <div class="col-lg-6 col-md-12 pe-xl-5">
                        <div class="card shadows">
                            <div class="card-body p-5">
                                <div class="col-11">
                                    <div class="categories text-success mb-4">

                                        <!-- Foreach Start -->
                                        <div v-if="menus.length > 0" v-for="item in order.items">
                                            <p class="fs-5">{{ getMenu(item.id).category }}</p>
                                            <div class="sub-categories ms-4 text-green-regular">
                                                <p class="fs-5">{{ getMenu(item.id).name }}<span class="float-end fs-5">{{ currency(getMenu(item.id).price) }}</span></p>
                                                <div v-if="(item.notes != null)">
                                                    <p class="fs-6 mb-0" style="margin-top: -16px"><small>Notes :</small></p>
                                                    <p class="fs-6 text-dark"><small>{{ item.notes }}</small></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Foreach End -->

                                    </div>
                                    <h4 class="fw-semibold mt-5">Subtotal<span class="float-end fs-5">{{ currency(order.subtotal) }}</span></h4>
                                    <div class="sub-categories ms-4">
                                        <p class="fs-5">TAX (11%)<span class="float-end fs-5">{{ currency(order.subtotal * 11 / 100) }}</span></p>
                                    </div>
                                    <h4 class="fw-semibold mt-3">Total<span class="float-end fs-5">{{ currency(order.subtotal + (order.subtotal * 11 / 100)) }}</span></h4>
                                </div>
                            </div>
                        </div>

                        <br>

                        <div class="card shadows mb-4">
                            <div class="card-body px-5 py-3">
                                <div class="col-11">
                                    <h3 class="title-menu my-2">Seat<span class="float-end">{{ order.seat.join(", ") }}</span></h3>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-6 col-md-12">
                        <div class="card shadows">
                            <div class="card-body p-5">
                                <h3 class="title-menu fs-3">Payment Method</h3>
                                <br>
                                <div class="col-xl-9 col-12">

                                    <div class="row mb-2 align-items-center">
                                        <div class="col-lg-2 col-1 mx-lg-0 px-lg-2 mx-2 px-0">
                                            <img :src="'/image/qris.png'" alt="qris" class="w-100">
                                        </div>
                                        <div class="text-serif fs-5 p-0 ms-3 col">Qris</div>
                                        <button :class="paymentMethod == 'qris' ? 'active' : ''" @click="togglePaymentMethod('qris')" class="btn btn-payment col-2"><i class="fa-solid fa-check fs-3"></i></button>
                                    </div>

                                    <div class="row mb-2 align-items-center">
                                        <div class="col-lg-2 col-1 mx-lg-0 px-lg-2 mx-2 px-0"></div>
                                        <hr class="ms-3 payment-line col m-0">
                                        <div class="col-lg-2 col-1 mx-lg-0 px-lg-2 mx-2 px-0"></div>
                                    </div>

                                    <div class="row mb-2 align-items-center">
                                        <div class="col-lg-2 col-1 mx-lg-0 px-lg-2 mx-2 px-0">
                                            <img :src="'/image/dana.png'" alt="dana" class="w-100">
                                        </div>
                                        <div class="text-serif fs-5 p-0 ms-3 col">DANA</div>
                                        <button :class="paymentMethod == 'dana' ? 'active' : ''" @click="togglePaymentMethod('dana')" class="btn btn-payment col-2"><i class="fa-solid fa-check fs-3"></i></button>
                                    </div>

                                    <div class="row mb-2 align-items-center">
                                        <div class="col-lg-2 col-1 mx-lg-0 px-lg-2 mx-2 px-0"></div>
                                        <hr class="ms-3 payment-line col m-0">
                                        <div class="col-lg-2 col-1 mx-lg-0 px-lg-2 mx-2 px-0"></div>
                                    </div>

                                    <div class="row mb-2 align-items-center">
                                        <div class="col-lg-2 col-1 mx-lg-0 px-lg-2 mx-2 px-0">
                                            <img :src="'/image/ovo.png'" alt="ovo" class="w-100">
                                        </div>
                                        <div class="text-serif fs-5 p-0 ms-3 col">OVO</div>
                                        <button :class="paymentMethod == 'ovo' ? 'active' : ''" @click="togglePaymentMethod('ovo')" class="btn btn-payment col-2"><i class="fa-solid fa-check fs-3"></i></button>
                                    </div>

                                    <div class="row mb-2 align-items-center">
                                        <div class="col-lg-2 col-1 mx-lg-0 px-lg-2 mx-2 px-0"></div>
                                        <hr class="ms-3 payment-line col m-0">
                                        <div class="col-lg-2 col-1 mx-lg-0 px-lg-2 mx-2 px-0"></div>
                                    </div>

                                    <div class="row mb-2 align-items-center">
                                        <div class="col-lg-2 col-1 mx-lg-0 px-lg-2 mx-2 px-0">
                                            <img :src="'/image/gopay.png'" alt="gopay" class="w-100">
                                        </div>
                                        <div class="text-serif fs-5 p-0 ms-3 col">GO-PAY</div>
                                        <button :class="paymentMethod == 'gopay' ? 'active' : ''" @click="togglePaymentMethod('gopay')" class="btn btn-payment col-2"><i class="fa-solid fa-check fs-3"></i></button>
                                    </div>

                                    <div class="row mb-2 align-items-center">
                                        <div class="col-lg-2 col-1 mx-lg-0 px-lg-2 mx-2 px-0"></div>
                                        <hr class="ms-3 payment-line col m-0">
                                        <div class="col-lg-2 col-1 mx-lg-0 px-lg-2 mx-2 px-0"></div>
                                    </div>

                                    <div class="row mb-2 align-items-center">
                                        <div class="col-lg-2 col-1 mx-lg-0 px-lg-2 mx-2 px-0">
                                            <img :src="'/image/linkaja.png'" alt="linkaja" class="w-100">
                                        </div>
                                        <div class="text-serif fs-5 p-0 ms-3 col">Link Aja</div>
                                        <button :class="paymentMethod == 'linkaja' ? 'active' : ''" @click="togglePaymentMethod('linkaja')" class="btn btn-payment col-2"><i class="fa-solid fa-check fs-3"></i></button>
                                    </div>

                                    <div class="row mb-2 align-items-center">
                                        <div class="col-lg-2 col-1 mx-lg-0 px-lg-2 mx-2 px-0"></div>
                                        <hr class="ms-3 payment-line col m-0">
                                        <div class="col-lg-2 col-1 mx-lg-0 px-lg-2 mx-2 px-0"></div>
                                    </div>

                                    <div class="row mb-2 align-items-center">
                                        <div class="col-lg-2 col-1 mx-lg-0 px-lg-2 mx-2 px-0">
                                            <img :src="'/image/spay.png'" alt="spay" class="w-100">
                                        </div>
                                        <div class="text-serif fs-5 p-0 ms-3 col">ShopeePay</div>
                                        <button :class="paymentMethod == 'spay' ? 'active' : ''" @click="togglePaymentMethod('spay')" class="btn btn-payment col-2"><i class="fa-solid fa-check fs-3"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="my-4">
                    <router-link to="/new-order/payment/barcode" class="btn btn-success rounded-pill float-end py-3 px-4 text-serif fs-5">
                        Barcode
                        <i class="fa-solid fs-3 fa-arrow-right align-middle ps-2"></i>
                    </router-link>
                </div>
            </div>


        </div>

    </div>
</template>

<script>
import { mapGetters } from "vuex";
import { mapActions } from "vuex";

export default {
    data() {
        return {
            paymentMethod: '',
        }
    },
    mounted() {
        this.$store.dispatch('fetchMenus');
        // this.$store.dispatch('fetchOrder');
    },
    computed: {
        ...mapGetters([
            'getOrder',
            'getMenus',
            'getMenu'
        ]),
        menus() {
            return this.$store.state.menus;
        },
        order() {
            return this.$store.state.order;
        }
    },
    methods: {
        ...mapActions([
            'fetchOrder',
            'fetchMenus'
        ]),
        togglePaymentMethod(query) {
            this.paymentMethod = query;
        }
    },
}
</script>