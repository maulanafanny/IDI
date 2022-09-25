import { createRouter, createWebHistory } from "vue-router";

import Menu from "../components/Menu.vue";

const routes = [{ path: "/new-order", component: Menu }];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router