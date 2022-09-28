const mutations = {
    SET_MENUS(state, menus) {
        state.menus = menus;
    },
    SET_SEATS(state, seats) {
        state.seats = seats;
    },
    SET_ORDER(state, order) {
        state.order = order;
    },
    PUSH_ORDER(state, payload) {
        state.order.items.push(payload);
    },
    UPDATE_ORDER(state, payload) {
        state.order.items = state.order.items.map(item => item.id === payload.id ? payload : item)
    }
};

export default mutations;
