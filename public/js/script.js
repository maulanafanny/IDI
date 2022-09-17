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
    
});