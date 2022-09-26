const getters = {
    getMenus: (state) => state.menus,
    getMenu: (state) => (id) => state.menus.find(menu => menu.id === id),
    getSeats: (state) => state.seats,
    getOrder: (state) => state.order
};

export default getters;
