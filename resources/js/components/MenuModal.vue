<template>
    <button @click="openModal" type="button" class="btn btn-outline-success fw-semibold w-100 py-3">
        <slot name="button"></slot>
    </button>

    <div class="modal fade mt-5" :id="'modal_menu_'+ props.menu.id" tabindex="-1" :aria-labelledby="'modal_menu_'+ props.menu.id" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content py-3 px-3">

                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <img class="img-fluid image-menu" :src="'/' + props.menu.img" alt="menu-img">
                        </div>
                        <div class="col-6">
                            <h3 class="text-capitalize title-menu mb-3">{{ props.menu.name }}</h3>
                            <p class="text-desc">{{ props.menu.desc }}</p>
                            <div style="width: 180px" class="text-center align-middle">
                                <a @click="updateQuantity(-1)" style="padding: 5px 10px" class="btn btn-min btn-outline-success btn-range float-start"><i class="fa-solid fa-minus"></i></a>
                                <span class="menu_quantity fs-4 fw-semibold" v-text="state.quantity"></span>
                                <a @click="updateQuantity(1)" style="padding: 5px 10px" class="btn btn-plus btn-outline-success btn-range float-end"><i class="fa-solid fa-plus"></i></a>
                            </div>
                        </div>
                        <div class="col-12 pt-3">
                            <div class="form-label fw-semibold text-secondary">Notes</div>
                            <textarea name="notes" class="form-control notes" style="resize: none" rows="4" v-model="state.notes"></textarea>
                        </div>
                    </div>
                </div>

                <div class="modal-footer border-0">
                    <button @click="storeItem" type="submit" class="btn submit btn-success w-100 py-2 fw-semibold">
                        <i class="fa-solid fa-plus fa-fw me-1"></i>
                        Tambah
                    </button>
                </div>

            </div>
        </div>
    </div>
</template>

<script setup>
import { Modal } from "bootstrap";
import { onMounted, reactive } from "vue";
import { useStore } from 'vuex';

const store = useStore();

const props = defineProps({
    menu: Object
})

const state = reactive({
    modal_state: null,
    quantity: 1,
    notes: null,
})

onMounted(() => {
    state.modal_state = new Modal('#modal_menu_' + props.menu.id)
    if (store.state.order.items.find(item => item.id === props.menu.id)) {
        state.quantity = store.state.order.items.filter(item => item.id === props.menu.id)[0].qty
        state.notes = store.state.order.items.filter(item => item.id === props.menu.id)[0].notes
    }
})

function updateQuantity(qty) {
    if (state.quantity > 1 || qty == 1) {
        state.quantity += qty;
    }
}

function storeItem() {
    if (store.state.order.items.find(item => item.id == props.menu.id)) {
        store.dispatch("updateOrder", {
            id: props.menu.id,
            qty: state.quantity,
            notes: state.notes
        })
        toastr["success"]("Menu berhasil diperbarui", "Success")
    } else {
        store.dispatch("pushOrder", {
            id: props.menu.id,
            qty: state.quantity,
            notes: state.notes
        })
        toastr["success"]("Menu berhasil ditambahkan", "Success")
    }
    state.modal_state.hide()
}

function openModal() {
    state.modal_state.show();
}

</script>