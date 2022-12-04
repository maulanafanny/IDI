<template>
    <div class="container-md container-sm py-sm-5 pb-5">

        <div class="card shadows bg-back-white">
            <div class="card-body p-md-5 p-4">

                <h1 class="text-serif mb-4 pb-3 d-md-none d-block">Seat</h1>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success rounded btn-green rounded-pill border-0 py-3 mb-md-5 mb-4" data-bs-toggle="modal" data-bs-target="#modal-img">
                    <i class="fa-solid fa-lg mx-2 fa-image fa-fw"></i>
                    <span class="me-2">Click to see sketch</span>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="modal-img" tabindex="-1" aria-labelledby="interior-image" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content py-3 px-3">
                            <div class="modal-header">
                                <h5 class="modal-title">Interior Sketch</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img class="img-fluid d-lg-block" :src="'/image/interior_landscape.png'" alt="interior">
                                <img class="img-fluid d-lg-none" :src="'/image/interior.png'" alt="interior">
                            </div>
                            <div class="modal-footer border-0"></div>
                        </div>
                    </div>
                </div>
                <!-- Modal End -->

                <div class="row">
                    <div class="col-xl-6 col mb-md-1 mb-3">

                        <div class="row mb-4 justify-content-md-start justify-content-center">
                            <!-- Foreach Start -->
                            <button @click="toggleActive($event)" v-for="seat in seats" :class="[
                                (!seat.status ? 'bg-disabled text-light' : ''),
                                (order.seat.includes(seat.seat) ? 'active' : '')
                            ]
                            " :disabled="!seat.status" class="btn btn-success border-0 btn-green mb-4 text-serif mx-3 rounded fs-4 btn-seat">
                                {{ seat.seat }}
                            </button>
                            <!-- Foreach End -->
                        </div>

                    </div>

                    <div class="w-100 d-md-none d-block"></div>

                    <div class="col-md-4 col offset-xl-1">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <div class="align-middle d-inline-block bg-lightgreen me-3 rounded" style="height:40px; width:40px"></div>
                                    <span class="fw-semibold">Available</span>
                                </div>
                                <div class="mb-3">
                                    <div class="align-middle d-inline-block bg-disabled me-3 rounded" style="height:40px; width:40px"></div>
                                    <span class="fw-semibold">Occupied</span>
                                </div>
                                <div class="mb-3">
                                    <div class="align-middle d-inline-block bg-decor me-3 rounded" style="height:40px; width:40px"></div>
                                    <span class="fw-semibold">Your Choice</span>
                                </div>
                            </div>

                            <div class="w-100 d-md-block d-none"></div>

                            <br><br><br>

                            <div class="col-6">
                                <div>
                                    <h3 class="title-menu fs-3">Your Choice</h3>
                                    <p class="fs-3 fw-light" id="seat-choice">{{ choice }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <router-link to="/new-order/payment" class="btn btn-success rounded-pill float-end py-3 px-4 text-serif fs-5">
                        Pembayaran
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
    mounted() {
        if (!this.$store.state.order.items.length > 0) {
            this.$router.back()
            swal("Oops...", "Kamu belum memilih menu.", "error");
        } else if (this.$store.state.order.seat_option == 'take-away') {
            this.$router.back()
            swal("Oops...", "Kamu memilih take-away.", "error");
        }
        this.$store.dispatch('fetchSeats');
    },
    computed: {
        ...mapGetters([
            'getOrder',
        ]),
        order() {
            return this.$store.state.order;
        },
        seats() {
            return this.$store.state.seats;
        },
        choice() {
            return this.order.seat.join(", ");
        }
    },
    methods: {
        ...mapActions([
            'fetchOrder',
        ]),
        toggleActive(event) {
            event.target.classList.toggle('active');
            if (this.order.seat.includes(event.target.innerText)) {
                this.order.seat = this.order.seat.filter(item => item != event.target.innerText)
            } else {
                this.order.seat.push(event.target.innerText)
            }
        },
    },
}
</script>

<style scoped>
.container-sm {
    padding: 0;
}

.btn-seat {
    height: 90px;
    width: 90px;
}

@media (max-width: 991.9px) {
    .btn-seat {
        height: 80px;
        width: 80px;
        font-size: 20px !important;
        margin: 5px !important;
    }
}
</style>