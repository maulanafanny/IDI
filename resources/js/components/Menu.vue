<template>

    <div class="container-md container-sm py-sm-5 pb-5">

        <div class="card shadows bg-back-white">
            <div class="card-body px-md-5 p-4">

                <h1 class="text-serif mb-4 d-md-none d-block">Menu</h1>

                <!-- Categories -->
                <div class="categories-wrap">
                    <div class="pb-3 text-nowrap overflow-hidden">
                        <button type="button" :class="(category == 'Coffee' ? 'active' : '')" @click="toggleCategory('Coffee')" class="btn btn-categories rounded-pill btn-lg btn-green px-4 me-4">Coffee</button>
                        <button type="button" :class="(category == 'Non-Coffee' ? 'active' : '')" @click="toggleCategory('Non-Coffee')" class="btn btn-categories rounded-pill btn-lg btn-green px-4 me-4">Non-Coffee</button>
                        <button type="button" :class="(category == 'Snack' ? 'active' : '')" @click="toggleCategory('Snack')" class="btn btn-categories rounded-pill btn-lg btn-green px-4 me-4">Snack</button>
                    </div>
                </div>

                <!-- Menu List -->
                <div id="menu-list">
                    <div class="row">

                        <!-- Start Foreach -->
                        <div v-for="menu in menus" v-show="this.category == menu.category || this.category == 'all'" class="col-lg-4 col-md-6 mb-md-5 mb-4 px-md-4">
                            <div class="card shadows">
                                <div class="card-body">

                                    <div class="row position-relative menu-detail">
                                        <div class="col-md-6 col-5">
                                            <img class="img-fluid image-menu mb-3" :src="'/' + menu.img" alt="menu-img">
                                        </div>
                                        <div class="col-md-6 col-7">
                                            <h3 class="text-capitalize title-menu title-ellipsis">{{ menu.name }}</h3>
                                            <p class="text-desc mb-2 menu-desc">{{ menu.desc }}</p>
                                            <p class="fw-semibold title-medium mb-md-3 mb-2">{{ currency(menu.price) }}</p>
                                            <div class="modal-button">
                                                <menu-modal :menu="menu">
                                                    <template #button>
                                                        <i class="fa-solid fa-plus fa-fw me-1"></i>
                                                        <span class="text-serif">Tambah</span>
                                                    </template>
                                                </menu-modal>
                                            </div>
                                        </div>
                                        <!-- <div class="col-md-12 ms-auto col-7">
                                            <menu-modal :menu="menu">
                                                <template #button>
                                                    <i class="fa-solid fa-plus fa-fw me-1"></i>
                                                    <span class="text-serif">Tambah</span>
                                                </template>
                                            </menu-modal>
                                        </div> -->
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- End Foreach -->

                    </div>
                </div>
                <!-- End of Menu List -->

                <div class="mb-5 pb-md-5">
                    <router-link to="/new-order/cart" class="btn btn-success rounded-pill float-end py-3 px-4 text-serif fs-5">
                        Keranjang
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
import MenuModal from "./MenuModal.vue";

export default {
    components: { MenuModal },
    data() {
        return {
            category: "all",
            quantity: 1
        };
    },
    mounted() {
        if (this.$store.state.order.customer_name == null) {
            this.$router.push('/new-order/login')
            swal("Oops...", "Kamu harus login terlebih dahulu.", "error");
        }
        this.$store.dispatch("fetchMenus");
    },
    computed: {
        ...mapGetters([
            "getMenus"
        ]),
        menus() {
            return this.$store.state.menus;
        }
    },
    methods: {
        ...mapActions([
            "fetchMenus"
        ]),
        toggleCategory(query) {
            if (this.category == query) {
                this.category = "all";
            }
            else {
                this.category = query;
            }
        },
    },
}
</script>

<style scoped>
@media (max-width: 991.9px) {
    .text-desc {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .title-menu {
        font-size: 20px;
    }

    .categories-wrap {
        padding: 10px 0;
    }

}

@media (min-width:992px) {
    .modal-button {
        position: absolute;
        width: 100%;
        left: 0;
        padding: 0 0.75rem;
        bottom: 0;
    }
    .menu-detail {
        height: 255px;
    }
}

.container-sm {
    padding: 0;
}

.title-menu {
    font-size: 20px;
}

.text-desc {
    font-size: medium;
}
</style>