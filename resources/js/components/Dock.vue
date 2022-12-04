<template>
    <nav v-if="$route.name !== 'login'" class="navbar fixed-bottom bg-success d-md-none d-block">
        <div class="container-fluid px-4 py-1">
            <router-link class="breadcrumb-item text-decoration-none text-light px-3 d-flex align-items-center" to="/new-order/menu">
                <i class="fa-solid fa-border-all fs-5 fa-fw"></i>
            </router-link>

            <router-link class="breadcrumb-item text-decoration-none text-light px-3 d-flex align-items-center" to="/new-order/cart">
                <i class="fa-solid fa-bag-shopping fs-5 fa-fw"></i>
            </router-link>

            <router-link v-if="order.seat_option == 'dine-in'" class="breadcrumb-item text-decoration-none text-light px-3 d-flex align-items-center" to="/new-order/seat">
                <i class="fa-solid fa-chair fs-5 fa-fw"></i>
            </router-link>

            <router-link class="breadcrumb-item text-decoration-none text-light px-3 d-flex align-items-center" to="/new-order/payment">
                <i class="fa-solid fa-wallet fs-5 fa-fw"></i>
            </router-link>

            <router-link class="breadcrumb-item text-decoration-none text-light px-3 d-flex align-items-center" to="/new-order/history">
                <i class="fa-solid fa-clock-rotate-left fs-5 fa-fw"></i>
            </router-link>
        </div>
    </nav>
</template>

<script>
export default {
    computed: {
        order() {
            return this.$store.state.order;
        }
    }
}
</script>

<style scoped>
    .breadcrumb-item {
        border: none;
    }
    .breadcrumb-item.active {
        background-color: white;
        border-radius: 50px;
        transition: .5s;
    }
</style>