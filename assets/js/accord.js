window.addEventListener('DOMContentLoaded', function () {    
    jQuery(function ($) {
        let accordions = $('.my-accordion'); // все аккордионы
        accordions.each(function () {  // цикл         

            $(this).accordionjs({
                activeIndex : false, // чтобы первый был закрыт при загрузке
                slideSpeed: 500, // скорость
                openSection: function( section ){ // действия при открытии
                    let accord_item_arrow = section.find('span');
                    accord_item_arrow.addClass('active');
                },
                closeSection: function( section ){  // действия при закрытии
                    let accord_item_arrow = section.find('span');
                    accord_item_arrow.removeClass('active');
                },
                // Больше опций смотри на https://accordion.js.org/
            });
        })

    });
});