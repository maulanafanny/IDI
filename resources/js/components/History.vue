<template>
    <div class="container py-5">

        <div class="card shadows bg-back-white">
            <div class="card-body p-5">

                <h3 class="title-menu pb-4 fs-3">My Order</h3>

                <div class="row">

                    <div class="col-xl-4 col-lg-5 col-md-12">
                        <!-- Foreach Start -->
                        <div v-if="menus.length > 0" v-for="item in order.items" class="card mb-4 shadows">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-lg col-md-3">
                                        <img class="img-fluid image-menu" :src="'/' + getMenu(item.id).img" alt="coffee-menu">
                                    </div>
                                    <div class="col">
                                        <h3 class="text-capitalize title-menu">{{ getMenu(item.id).name }}</h3>
                                        <p class="title-medium">{{ currency(getMenu(item.id).price) }}</p>
                                        <div class="align-middle m-0">
                                            <span class="menu_quantity fs-4 fw-semibold">{{ item.qty }}x</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Foreach End -->
                    </div>

                    <div class="col-lg-7 col-12 ms-xl-4">
                        <div class="card shadows">
                            <div class="card-body p-5">
                                <h3 class="title-menu">Report Payment</h3>
                                <br>
                                <div class="col-10">
                                    <div class="categories ms-5 text-success mb-4">

                                        <!-- Foreach Start -->
                                        <div v-if="menus.length > 0" v-for="item in order.items">
                                            <p class="fs-5">{{ getMenu(item.id).category }}</p>
                                            <div class="sub-categories ms-4 text-green-regular">
                                                <p class="fs-5">{{ item.qty + 'x ' + getMenu(item.id).name }}<span class="float-end fs-5">{{ currency(getMenu(item.id).price * item.qty) }}</span></p>
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
                    </div>
                </div>

                <!-- Back to Menu Button -->
                <div class="my-5">
                    <router-link to="/new-order/menu" class="btn btn-success rounded-pill float-end py-3 px-4 text-serif fs-5">
                        <i class="fa-solid fs-3 fa-arrow-left align-middle pe-3"></i>
                        <span class="align-middle">Back to Menu</span>
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
    mounted() {
        if (!this.$store.state.order.isStored) {
            this.$router.back()
            swal("Oops...", "Kamu belum menyelesaikan pesanan.", "error");
        }
        this.$store.dispatch('fetchMenus');
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
    },
}
</script>