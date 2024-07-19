window.addEventListener('DOMContentLoaded', function(){
    const availableScreenWidth = window.screen.availWidth; 

    /*Open submenu function*/
    // Функция открытия / закрытия подменю разных уровней
    // Если вложенностей в меню нет, удаляй этот код
    
    const submenu_btn = document.querySelector('#menu-item-85 > a');
    const first_sub_menu = document.querySelector('#menu-item-85 > ul.sub-menu');

    const submenu_second_btn = document.querySelector('#menu-item-85 >.sub-menu li#menu-item-120 > a');
    const second_sub_menu = document.querySelector('#menu-item-85 >.sub-menu li#menu-item-120 >.sub-menu');
    if( availableScreenWidth > 1200) {
        submenu_btn.addEventListener('mouseenter', function(event){
            event.preventDefault(); 
            first_sub_menu.classList.add('active');

            first_sub_menu.addEventListener('mouseleave', function(event){
                first_sub_menu.classList.remove('active'); 
            });
          
            submenu_second_btn.addEventListener('mouseenter', function(event){
                event.preventDefault();
                second_sub_menu.classList.add('active');                
            });
            
        });
        
    } else {     
        submenu_btn.setAttribute('href', '#');   
        submenu_second_btn.setAttribute('href', '#');
        submenu_btn.addEventListener('click', function(event){
            event.preventDefault();
            first_sub_menu.classList.toggle('active');            
        });
        submenu_second_btn.addEventListener('click', function(event){
            event.preventDefault();
            second_sub_menu.classList.toggle('active');
        });
    }

    /*Open submenu function end*/


    /*Open burger menu*/
    var menu = document.querySelector('#navbar')
    ,burger_open = document.querySelector('.burger')  
    ,burger_close = document.querySelector('.burger-close'); 

   

    burger_open.addEventListener('click', function(){ 

        if( menu.classList.contains('opened') === false ) {
            menu.classList.add('opened');
            document.querySelector('body').classList.add('closed');
        } 

        // Скрытие меню при нажатии на один из пунктов меню верхнего уровня

        document.querySelectorAll('.menu > li >a').forEach(function(oneItem){
            oneItem.addEventListener('click', function(event){                
                if(event.target.getAttribute('href') !== '#') {         
                    menu.classList.remove('opened');
                    document.querySelector('body').classList.remove('closed'); 
                    second_sub_menu.classList.remove('active');
                    first_sub_menu.classList.remove('active');
                }
            
            });
        });

        // Скрытие меню при нажатии на один из пунктов меню первого уровня

        document.querySelectorAll('#menu-item-85 >.sub-menu li').forEach(function(oneUnderItem){
            oneUnderItem.addEventListener('click', function(event){                
                if(event.target.getAttribute('href') !== '#') {         
                    menu.classList.remove('opened');
                    document.querySelector('body').classList.remove('closed'); 
                    first_sub_menu.classList.remove('active'); 
                }
            
            });
        });

        // Скрытие меню при нажатии на один из пунктов меню второстепенного уровня (если у тебя меню без вложенностей - удаляй)

        document.querySelectorAll('#menu-item-85 >.sub-menu li#menu-item-120 .sub-menu > li > a').forEach(function(oneUnderItem){
            oneUnderItem.addEventListener('click', function(event){                
                if(event.target.getAttribute('href') !== '#') {         
                    menu.classList.remove('opened');
                    document.querySelector('body').classList.remove('closed'); 
                    second_sub_menu.classList.remove('active');
                    first_sub_menu.classList.remove('active');
                }
            
            });
        });
          
        // Скрытие меню при клике на пустое место (если у тебя меню на всю страницу, удаляй код)

        menu.addEventListener('click', function(event) {            
            if( this == event.target) {                
                menu.classList.remove('opened');
                document.querySelector('body').classList.remove('closed');                   
                second_sub_menu.classList.remove('active');
                first_sub_menu.classList.remove('active');
            } 
        });
        
    });
    burger_close.addEventListener('click', function(){    
        if( menu.classList.contains('opened') === true ) {
            menu.classList.remove('opened');
            document.querySelector('body').classList.remove('closed');
            second_sub_menu.classList.remove('active');
            first_sub_menu.classList.remove('active');
        } 
    });

    /*Open burger menu end*/

   
    // Simplebar
    // Только для бургерного меню подключаем simplebar
    const menu_mobile = document.querySelector('.menu-osnovnoe-menyu-container');   
        
    if( availableScreenWidth <= 1199) {
        new SimpleBar(menu_mobile);
    }

  
});