window.addEventListener('DOMContentLoaded', function(){
    const partners_swiper = new Swiper(".partners-slider", {
        slidesPerView: 2, 
        spaceBetween: 4,  
        autoplay: true,               
        navigation: {
          nextEl: ".swiper-button-next.slider-arrow-next",
          prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            
            690: {
              slidesPerView: 3,   
              spaceBetween: 40,             
            },
            992: {
                slidesPerView: 4,   
                spaceBetween: 90,               
            },
            1200: {
                slidesPerView: 5,   
                spaceBetween: 90,               
            },
            1400: {
                slidesPerView: 6,   
                spaceBetween: 100,              
            },
        }
    });

    const one_image_sliders = document.querySelectorAll('.one_image_slider');
    one_image_sliders.forEach(function(one_image_slider) {
        new Swiper(one_image_slider, {
            slidesPerView: 1, 
            spaceBetween: 10,                 
            navigation: {
              nextEl: ".swiper-button-next.slider-arrow-next",
              prevEl: ".swiper-button-prev",
            },
            
        });
    });

});