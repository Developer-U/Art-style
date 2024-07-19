window.addEventListener('DOMContentLoaded', function(){
    let tabRepWrapper = document.querySelector('.gallery-tabs'); 

    // Открытие табов с разделами и подразделами
    var pathNums = document.querySelectorAll('.js-pathTabs'); // все кнопки табов
            
    var targetNums = document.querySelectorAll('.js-targetTabs'); // все контенты табов 

    // 1 - читаем хеш при загрузке
    let url = window.location.href;
    let hash = document.location.hash;   
    

        pathNums.forEach(function(pathBtn){ // Итерируем все разделы сайдбара
            if( hash ) { //проверяем на хеш
                pathNums.forEach(function(oneTabItemRep){   // Если есть хеш, дезактивируем все кнопки табов            
                    oneTabItemRep.classList.remove('active');                                  
                });	
                        
                targetNums.forEach(function(tabTargetRep){  // Если есть хеш, дезактивируем все содержимые табов   
                    tabTargetRep.classList.remove('active'); 
                                    
                });	                

                let cleanHash = hash.replace('#', ''); // Убираем из hash решётку чтобы сравнить               

                var hashBtn =  document.querySelector(`[data-tabpathrep='${cleanHash}']`); // вставляем нужный атрибут и активируем
             
                hashBtn.classList.add('active');  
              

                var hashTab =  tabRepWrapper.querySelector(`[data-tabTargetReprep='${cleanHash}']`); 
                hashTab.classList.add('active');         // вставляем нужный атрибут и активируем 
         
            }

            pathBtn.addEventListener('click', function(event){  // Кликаем по разделу сайдбара
                event.preventDefault();
                
                var path = event.currentTarget.dataset.path; // Определяем индекс раздела    

                            
                window.location.hash = 'galery_' + path;

                // по клику деактивируем все кнопки табов
                pathNums.forEach(function(eachBtn){                    
                    eachBtn.classList.remove('active');
                }); 

                // Активируем текущую кнопку
                var currentBtn = event.currentTarget; // Определяем индекс раздела
                console.log(currentBtn);
                currentBtn.classList.add('active');
                
                // по клику отключаем все контенты
                targetNums.forEach(function(targetNum){                    
                    targetNum.classList.remove('active');
                }); 

                // Закинем в переменную текущий Таб с соответствующим атрибутом data-target       
                var currentTypeTab = document.querySelector(`[data-target="${path}"]`);                               
            
                currentTypeTab.classList.add('active'); // Активируем первый раздел в контенте                                   
                    
            });
        }); 
  

  
});