<template>

    <div class="container py-5">

        <div class="card shadows bg-back-white">
            <div class="card-body px-md-5">

                <!-- Categories -->
                <div class="categories-wrap">
                    <div class="pb-3 text-nowrap overflow-auto">
                        <button type="button" :class="(category == 'Coffee' ? 'active' : '')" @click="toggleCategory('Coffee')" class="btn btn-categories rounded-pill btn-lg btn-green px-4 me-4">Coffee</button>
                        <button type="button" :class="(category == 'Non-Coffee' ? 'active' : '')" @click="toggleCategory('Non-Coffee')" class="btn btn-categories rounded-pill btn-lg btn-green px-4 me-4">Non-Coffee</button>
                        <button type="button" :class="(category == 'Snack' ? 'active' : '')" @click="toggleCategory('Snack')" class="btn btn-categories rounded-pill btn-lg btn-green px-4 me-4">Snack</button>
                    </div>
                </div>

                <!-- Menu List -->
                <div id="menu-list">
                    <div class="row">

                        <!-- Start Foreach -->
                        <div v-for="menu in menus" v-show="this.category == menu.category || this.category == 'all'" class="col-lg-4 col-md-6 mb-5 px-4">
                            <div class="card shadows">
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-6">
                                            <img class="img-fluid image-menu mb-3" :src="'/' + menu.img" alt="menu-img">
                                        </div>
                                        <div class="col-6">
                                            <h3 class="text-capitalize title-menu title-ellipsis">{{ menu.name }}</h3>
                                            <p class="text-desc mb-2 menu-desc">{{ menu.desc }}</p>
                                            <p class="fw-semibold title-medium">{{ currency(menu.price) }}</p>
                                        </div>
                                    </div>

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-outline-success fw-semibold w-100 py-3" data-bs-toggle="modal" :data-bs-target="'#modal-' + menu.id">
                                        <i class="fa-solid fa-plus fa-fw me-1"></i>
                                        <span class="text-serif">Tambah</span>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade mt-5" :id="'modal-' + menu.id" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content py-3 px-3">

                                                <div class="modal-body">

                                                    <div class="row">
                                                        <div class="col-6">
                                                            <img class="img-fluid image-menu" :src="'/' + menu.img" alt="menu-img">
                                                        </div>
                                                        <div class="col-6">
                                                            <h3 class="text-capitalize title-menu mb-3">{{ menu.name }}</h3>
                                                            <p class="text-desc">{{ menu.desc }}</p>
                                                            <div style="width: 180px" class="text-center align-middle">
                                                                <a @click="updateQuantity(-1)" class="btn btn-min btn-outline-success btn-range float-start"><i class="fa-solid fa-minus fs-6"></i></a>
                                                                <span class="menu_quantity fs-4 fw-semibold" v-text="quantity"></span>
                                                                <a @click="updateQuantity(1)" class="btn btn-plus btn-outline-success btn-range float-end"><i class="fa-solid fa-plus fs-6"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 pt-3">
                                                            <div class="form-label fw-semibold text-secondary">Notes</div>
                                                            <textarea name="notes" class="form-control notes" style="resize: none" rows="4"></textarea>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="modal-footer border-0">
                                                    <input type="hidden" id="menu_id" value="{{ menu.id }}">
                                                    <button type="submit" class="btn submit btn-success w-100 py-2 fw-semibold">
                                                        <i class="fa-solid fa-plus fa-fw me-1"></i>
                                                        Tambah
                                                    </button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal End -->

                                </div>
                            </div>
                        </div>
                        <!-- End Foreach -->

                    </div>
                </div>
                <!-- End of Menu List -->

                <div class="mb-5">
                    <router-link to="/new-order/cart" class="btn btn-success rounded-pill float-end py-3 px-4 text-serif fs-5">
                        Keranjang
                        <i class="fa-solid fs-3 fa-arrow-right align-middle ps-2"></i>
                    </router-link>
                </div>

                <br><br>

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
            category: 'all',
            quantity: 1
        }
    },
    mounted() {
        this.$store.dispatch('fetchMenus');
    },
    computed: {
        ...mapGetters([
            'getMenus'
        ]),
        menus() {
            return this.$store.state.menus;
        }
    },
    methods: {
        ...mapActions([
            'fetchMenus'
        ]),
        toggleCategory(query) {
            if (this.category == query) {
                this.category = 'all';
            } else {
                this.category = query;
            }
        },
        updateQuantity(qty) {
            if (this.quantity > 0 || qty == 1) {
               this.quantity += qty;
            }
        }
    },
}
</script>