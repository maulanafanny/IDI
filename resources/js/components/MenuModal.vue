<template>
    <button @click="openModal" type="button" class="btn btn-outline-success fw-semibold w-100 py-3">
        <slot name="button"></slot>
    </button>

    <div class="modal fade mt-5" :id="props.id" tabindex="-1" :aria-labelledby="props.ariaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content py-3 px-3">

                <div class="modal-body">
                    <slot name="body"></slot>
                </div>

                <div class="modal-footer border-0">
                    <slot name="footer"></slot>
                </div>

            </div>
        </div>
    </div>
</template>

<script setup>
import { Modal } from "bootstrap";
import { onMounted, reactive } from "vue";

const props = defineProps({
  id: String,
  ariaLabel: String
})

const state = reactive({
    modal_state: null
})

onMounted(() => {
    state.modal_state = new Modal('#' + props.id)
})

function openModal() {
    state.modal_state.show();
}

</script>