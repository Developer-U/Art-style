window.addEventListener('DOMContentLoaded', function(){

    /*Fancybox Gallery*/
    Fancybox.bind("[data-fancybox]", {
        hideScrollbar: false,
    });

    /*Load more button*/
    const Wrappers = document.querySelectorAll('.js-targetTabs'); // Родитель постов   

    Wrappers.forEach(function(Wrapper){
        var all_posts_wrapper = Wrapper.querySelector('.gallery-tab-list');  
       
        const allnewsPosts = all_posts_wrapper.querySelectorAll('.gallery-tab-list__item'); // Все публикации
    
        // console.log(allnewsPosts);
    
        // console.log(allnewsPosts.length);
    
        var newsMoreBtn = document.createElement('button'); // Создаём кнопку Добавить ещё          
    
        newsMoreBtn.classList.add('button', 'red-btn', 'more-btn'); // Присваиваем её стили
    
        newsMoreBtn.innerText = 'показать больше';
    
        if(allnewsPosts.length > 4) {  // Добавляем кнопку, если статей более 15
            Wrapper.append(newsMoreBtn);
        }
    
        for(let i=4; i<allnewsPosts.length; i++) {
            console.log(allnewsPosts[i]);
            allnewsPosts[i].style.display = 'none';             
        }   
    
        var countD = 4; //Установим счётчик 
    
        newsMoreBtn.addEventListener('click', function(){
            countD += 1;
    
            if(countD <= allnewsPosts.length) { 
                for(let i=0; i<countD; i++) {
                    allnewsPosts[i].style.display = 'grid'; // При клике на кнопку добавляем дипломы
                }
            
                if(countD == allnewsPosts.length) {
                    newsMoreBtn.style.display = 'none';
                }          
            } else {              
                allnewsPosts.forEach(function(elsePost){
                    elsePost.style.display = 'grid'; // При клике на кнопку добавляем дипломы
    
                    newsMoreBtn.style.display = 'none';
                });
            }
            
        });
    });
    
    /* Init AOS Animation */
    AOS.init();

    /* Get Digit Count */
    jQuery(function($) {
        $('.js-count').each(function() {
            $(this).prop('Counter', 0).animate({
            Counter: $(this).text()
            }, {
            duration: 8000,
            easing: 'swing',
            step: function(now) {
                $(this).text(Math.ceil(now));
            }
            });
        });
    });
});