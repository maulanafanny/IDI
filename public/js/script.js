$(document).ready(function () {
    
    $('.btn-plus').click(function (e) { 
        e.preventDefault();
        const menu = this.previousElementSibling;
        let quantity = parseInt(menu.innerText);
        menu.innerText = (quantity+1);
    });
    $('.btn-min').click(function (e) { 
        e.preventDefault();
        const menu = this.nextElementSibling;
        let quantity = parseInt(menu.innerText);
        if (quantity > 0) {
            menu.innerText = (quantity-1);
        } 
    });

    $('.submit').click(function() {
        const menu = this.previousElementSibling.value;
        const quantity = this.closest('.modal-footer').previousElementSibling.querySelector('.menu_quantity').innerText;
        const notes = this.closest('.modal-footer').previousElementSibling.querySelector('.notes').value;
        $.ajax({
            url: "/add",
            type: "get",
            data: {
                menu_id: menu,
                quantity: quantity,
                notes: notes
            },
            success: function() {
                alert('Berhasil menambahkan menu');
            }
        });
    });

    $('.btn-seat').click(function (e) { 
        e.preventDefault();
        $(this).toggleClass('bg-lightgreen text-dark bg-decor text-light');

        let selected = $('.btn-seat.bg-decor');
        let text = $('#seat-choice').text();

        $.each(selected, function (index, value) {
            if (index == 0) {
                text = '';
            }
            text += ' ' + value.innerText;
        });

        if (selected[0] == undefined) {
            text = '';
        }

        $('#seat-choice').text(text);
        $('#seat-input').val(text);
    });

    
});