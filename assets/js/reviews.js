
 // Открытие скрытого текста в блоке Отзывы reviews 
 let reviews = document.querySelectorAll('.js-reviews'); // Все отзывы

    reviews.forEach(function(oneContent){  // Итерируем блоки (отзывы) 
      
      // Определяем контейнер, текст и кнопки внутри текущего блока
      const contain = oneContent.querySelector('.reviews-item__text'); // контейнер с текстом
      const content = oneContent.querySelector('.reviews-item__text div'); // сам текст отзыва
      const btn = oneContent.querySelector('.main-reviews__item-more'); // кнопка читать больше
      const btnClose = oneContent.querySelector('.main-reviews__item-less'); // кнопка скрыть

            
      const heightOfContent = content.getBoundingClientRect().height; // вычисляем высоту текста
      

      if(heightOfContent >= 110) { // если высота становится более 101px, добавляем кнопку читать далее                  
          
        btn.classList.add('open');
        
        btn.addEventListener('click', function(){
          this.classList.remove('open');

          contain.classList.add('open');

          btnClose.classList.add('open'); 
        });      

      } else {   // в обратном случае скрываем кнопку  
        btn.classList.remove('open');         
      }    

      btnClose.addEventListener('click', function(){
          this.classList.remove('open');

          contain.classList.remove('open');
            
          btn.classList.add('open');     
        });    
    });
