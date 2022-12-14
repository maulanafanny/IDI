const actions = {
    async fetchMenus({ commit }) {
        try {
            const data = await axios.get("/api/menu");
            commit("SET_MENUS", data.data);
        } catch (error) {
            alert(error);
            console.log(error);
        }
    },
    async fetchSeats({ commit }) {
        try {
            const data = await axios.get("/api/seat");
            commit("SET_SEATS", data.data);
        } catch (error) {
            alert(error);
            console.log(error);
        }
    },
    async fetchOrder({ commit }) {
        try {
            const data = await axios.get("/api/order");
            commit("SET_ORDER", data.data);
        } catch (error) {
            alert(error);
            console.log(error);
        }
    },
    pushOrder({ commit }, item) {
        commit("PUSH_ORDER", item)
    },
    updateOrder({commit}, item) {
        commit("UPDATE_ORDER", item)
    },
    saveOrder(context, order) {
        try {
            axios.post('/api/order', order).then(result => {
                context.dispatch('fetchSeats')
            })
        } catch (error) {
            alert(error);
            console.log(error);
        }
       
    },
    orderStored({commit}) {
        commit("ORDER_STORED")
    }
};

export default actions;
