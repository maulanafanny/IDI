<template>
    <br>
    <br>
    <div class="container">
        <nav aria-label="breadcrumb">
            <div class="breadcrumb title-breadcrumb fs-4 justify-content-between mb-4">
    
                <router-link activeClass="active" class="breadcrumb-item text-decoration-none text-light px-3 d-flex align-items-center" to="/new-order/menu">
                    <i class="fa-solid fa-border-all fs-5 fa-fw me-2"></i>
                    <span class="breadcrumb-text">Menu</span>
                </router-link>
    
                <router-link activeClass="active" class="breadcrumb-item text-decoration-none text-light px-3 d-flex align-items-center" to="/new-order/cart">
                    <i class="fa-solid fa-bag-shopping fs-5 fa-fw me-2"></i>
                    <span class="breadcrumb-text">Keranjang</span>
                </router-link>
    
                <router-link activeClass="active" class="breadcrumb-item text-decoration-none text-light px-3 d-flex align-items-center" to="/new-order/seat">
                    <i class="fa-solid fa-chair fs-5 fa-fw me-2"></i>
                    <span class="breadcrumb-text">Meja</span>
                </router-link>
    
                <router-link activeClass="active" class="breadcrumb-item text-decoration-none text-light px-3 d-flex align-items-center" to="/new-order/payment">
                    <i class="fa-solid fa-wallet fs-5 fa-fw me-2"></i>
                    <span class="breadcrumb-text">Pembayaran</span>
                </router-link>
    
                <router-link activeClass="active" class="breadcrumb-item text-decoration-none text-light px-3 d-flex align-items-center" to="/new-order/history">
                    <i class="fa-solid fa-clock-rotate-left fs-5 fa-fw me-2"></i>
                    <span class="breadcrumb-text">Riwayat</span>
                </router-link>
    
            </div>
        </nav>
    </div>
</template>

<script>
export default {

}
</script>