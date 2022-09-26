import "./bootstrap";
import "bootstrap";

import { createApp } from "vue";
import router from "./router";
import store from "./store";

const app = createApp({});

/* Import Your Component Here */
// import ExampleComponent from "./components/ExampleComponent.vue";
// app.component("example-component", ExampleComponent);

app.use(store);
app.use(router);
app.mount("#app");