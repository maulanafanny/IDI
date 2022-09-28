const state = {
    menus: [],
    seats: [],
    order: {
        items: [
            {
                id: 1,
                qty: 3,
                notes: 'lorem ipsum dolor sit amet',
            },
            {
                id: 2,
                qty: 5,
                notes: null,
            },
        ],
        subtotal: 135000,
        seat: ['A1', 'B2'],
    },
};

export default state;
