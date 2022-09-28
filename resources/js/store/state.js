const state = {
    menus: [],
    seats: [],
    order: {
        customer_name: 'fanny maulana',
        customer_phone: null,
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
        isStored: false,
    },
};

export default state;
