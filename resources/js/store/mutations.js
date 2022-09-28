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
        state.order.subtotal = state.order.items.reduce((total, item) => {
            return total + item.qty * state.menus.find(menu => menu.id === item.id).price
        }, 0)
    },
    UPDATE_ORDER(state, payload) {
        if (payload.qty === 0) {
            state.order.items = state.order.items.filter(item => item.id !== payload.id)
        } else {
            state.order.items = state.order.items.map(item => item.id === payload.id ? payload : item)
        }
        state.order.subtotal = state.order.items.reduce((total, item) => {
            return total + item.qty * state.menus.find(menu => menu.id === item.id).price
        }, 0)
    },
    ORDER_STORED(state) {
        state.order.isStored = true
    }
};

export default mutations;
