import { createStore } from "vuex";
import state from "./state";
import getters from "./getters";
import actions from "./actions";
import mutations from "./mutations";

const store = createStore({
    // strict: true,
    state,
    getters,
    actions,
    mutations,
});

export default store;
