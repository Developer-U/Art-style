<?php
/**
* Display Block Heading width decor
* блок Заголовок с декором (в данном случае полосы справа)
*/
$block_title; //- в нужном месте вёрстки не забудь обозначить переменную (Напр. ACF)

if($block_title ) {
?>

    <div class="container">
        <div class="head-stripes-wrap" >
            <h2 class="head-stripes get-price__title">
                <?php echo $block_title; ?>                        
            </h2> 
        </div>               
    </div>  

<?php } ?>