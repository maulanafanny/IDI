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
};

export default actions;
