<template>
    <div class="col-5 mx-auto m-5">
        <div class="card">
            <div class="card-body p-5 mx-auto w-75">
                <br>
                <img :src="'/image/logo.png'" alt="login-logo" class="img-fluid mb-4 px-5 ms-2">
                <div class="mb-3">
                    <label for="name" class="form-label">Nama<span><small class="text-danger"> *</small></span></label>
                    <input aria-autocomplete="none" required aria-required="true" v-model="order.customer_name" type="text" class="form-control" name="name" aria-label="name">
                </div>
                <div class="mb-4">
                    <label for="phone" class="form-label">No.Telepon<span class="text-optional"> (Opsional)</span></label>
                    <input aria-autocomplete="none" type="text" class="form-control" v-model="order.customer_phone" name="phone" aria-label="phone">
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" v-model="order.seat_option" type="radio" value="take-away" name="seat_option">
                    <label class="form-check-label" for="take-away">Take-away</label>
                </div>
                <div class="form-check mb-5">
                    <input class="form-check-input" v-model="order.seat_option" type="radio" value="dine-in" name="seat_option" checked>
                    <label class="form-check-label" for="dine-in">Dine-in</label>
                </div>
                <router-link class="btn btn-success w-100 py-3 fw-semibold" to="/new-order/menu">
                    Pesan Sekarang
                </router-link>
                <br>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
        $('body').addClass('bg-decor');
    },
    computed: {
        order() {
            return this.$store.state.order
        }
    },
    beforeUnmount() {
        $('body').removeClass('bg-decor');
    }
}
</script>