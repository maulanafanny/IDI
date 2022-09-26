import "./bootstrap";
import "bootstrap";

import { createApp } from "vue";
import router from "./router";
import store from "./store";

const app = createApp({});
app.mixin({
    methods: {
        currency(curr) {
            return 'Rp' + curr.toLocaleString('id-ID')
        },
    }
})

import Breadcrumb from "./components/Breadcrumb.vue";
app.component("breadcrumb", Breadcrumb);

app.use(store);
app.use(router);
app.mount("#app");