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

    /* Dashboard Scripts */
    // side nav toggle button hide/show
    $("#aside-toggle-btn").click(function(){       
        $("#aside-nav, main").toggleClass("active");   
     }); 
 
     // aside nav dropdown caret icon rotate
     $("#aside-nav-ul .nav-link").click(function(){     
      $(this).find(".dropdown-caret-svg").toggleClass("rotate-svg");
     });
     
     // aside nav > nav link remove/add active class on click
     $("#aside-nav-ul .nav-link").click(function(){
         $("#aside-nav-ul .nav-link").removeClass("active");
         $(this).addClass("active");
     });
 
     // click on one dropdown second one automatically hide and change svg icon to
     $("#aside-nav-ul").on('click','.nav-item',function(){      
         const liElement = $(this);
         liElement.siblings().children().children(".dropdown-caret-svg").removeClass("rotate-svg");
         liElement.siblings().children(".aside-dropdown-menu").removeClass("show");
         if($(this).hasClass("active")){
             liElement.siblings().children(".aside-dropdown-menu").addClass("show");
         }
     });
    
});