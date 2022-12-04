<template>
    <div class="container py-sm-5 pt-3 pb-5 mb-5">

        <div class="card shadows bg-back-white mx-auto">
            <div class="card-body p-md-5 px-5 py-4">

                <h3 class="title-menu pb-4 fw-bold">QRCode</h3>

                <div class="col-lg-7 mx-auto text-center">
                    <div class="bg-lightgreen fw-light rounded py-2 mb-4">
                        <i class="fa-solid fa-clock me-2"></i>
                        Sisa waktu pembayaran Anda
                        <span id="timer"></span>
                    </div>
                    <h5 class="text-serif fw-semibold text-success">IDI' COFFEE</h5>
                    <h6>{{ currency(order.subtotal + order.subtotal * 11 / 100) }}</h6>
                    <img class="py-4" :src="'/image/qrcode.png'" alt="barcode">
                    <button class="btn btn-success py-3 px-4 w-100">Unduh Barcode</button>
                </div>

                <div class="my-4">
                    <router-link to="/new-order/payment/success#success-card" class="btn btn-success rounded-pill float-end py-3 px-4">
                        <i class="fa-solid fs-3 fa-arrow-right align-middle"></i>
                    </router-link>
                </div>

            </div>


        </div>

    </div>
</template>

<script>
export default {
    data() {
        return {
            time: 0,
        }
    },
    mounted() {
        if (this.$store.state.order.isStored) {
            console.log('redirect to success');
            this.$router.push('/new-order/payment/success')
        }
        this.setTimer(900);
    },
    computed: {
        order() {
            return this.$store.state.order
        }
    },
    methods: {
        setTimer(time) {
            const timer = setInterval(function () {
                var seconds = time % 60;
                var minutes = Math.floor(time / 60);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                $('#timer').text(minutes + ':' + seconds);
                time--;
                if (time < 0) {
                    clearInterval(timer);
                }
            }, 1000)
            this.time = timer;
        }
    },
    beforeUnmount() {
        clearInterval(this.time)
    }
}
</script>

<style scoped>
.card {
    width: 50%;
}

@media (max-width: 991.9px) {
    .card {
        width: 90%;
    }
}
</style>