import { createRouter, createWebHistory } from "vue-router";

import Menu from "../components/Menu.vue";
import Cart from "../components/Cart.vue";
import Seat from "../components/Seat.vue";
import Payment from "../components/Payment.vue";
import Barcode from "../components/Barcode.vue";
import Success from "../components/Success.vue";
import History from "../components/History.vue";

const routes = [
    { path: "/new-order/menu", component: Menu },
    { path: "/new-order/cart", component: Cart },
    { path: "/new-order/seat", component: Seat },
    {
        path: "/new-order/payment",
        children: [
            { path: "", component: Payment },
            { path: "barcode", component: Barcode },
            { path: "success", component: Success },
        ],
    },

    { path: "/new-order/history", component: History },
];

const router = createRouter({
    history: createWebHistory(),
    linkActiveClass: "active",
    routes,
});

export default router;
