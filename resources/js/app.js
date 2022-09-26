import "./bootstrap";
import "bootstrap";

import { createApp } from "vue";
import router from "./router";

const app = createApp({});


/* Import Your Component Here */
// import ExampleComponent from "./components/ExampleComponent.vue";
// app.component("example-component", ExampleComponent);


app.use(router);
app.mount("#app");