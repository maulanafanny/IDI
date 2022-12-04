<template>

    <div class="container-md container-sm py-sm-5" id="success-card">

        <div class="card shadows bg-back-white m-auto text-center pb-md-0 pb-5">
            <div class="card-body p-5">

                <div class="col-8 mx-auto">

                    <div class="pb-5 pt-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="180" height="180" fill="currentColor" class="bi bi-patch-check-fill text-success fa-beat-fade" style="--fa-beat-scale: 1.2;" viewBox="0 0 16 16">
                            <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z" />
                        </svg>
                    </div>

                    <div class="col-11 mx-auto">
                        <h3 class="text-serif mb-3">Payment Success</h3>
                        <p>Your payment was successful and you can start enjoy your order</p>

                        <h5 class="text-serif mt-4">Thank You</h5>
                    </div>

                    <br><br>

                    <router-link to="/new-order/history" class="btn btn-outline-success w-100 fw-bold py-2 my-2">See My Order</router-link>
                    <router-link to="/new-order/menu" class="btn btn-outline-danger w-100 fw-bold py-2 my-2">Back to Menu</router-link>

                    <br>
                    <br>
                </div>


            </div>


        </div>

    </div>

</template>

<script>
export default {
    mounted() {
        if (this.$store.state.order.isStored) {
            console.log('you have stored the order');
        } else {
            this.$store.dispatch("saveOrder", this.$store.state.order)
            this.$store.dispatch("orderStored")
        }
    }
}
</script>

<style scoped>
.container-sm {
    padding: 0;
}

.card {
    width: 45%;
}

@media (max-width: 991.9px) {
    .card {
        width: 100%;
    }
}
</style>