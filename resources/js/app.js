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
import Dock from "./components/Dock.vue";
app.component("breadcrumb-component", Breadcrumb);
app.component("dock-component", Dock);

app.use(store);
app.use(router);
app.mount("#app");