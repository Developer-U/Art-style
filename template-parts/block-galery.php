<?php
/**
* Display Block Galery
* Вывод галереи на странице Наша галерея
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

    <section class="gallery">
        <div class="container">
            <?php
            if( get_the_content() ) {
            ?>
                <div class="top-page-text post">
                    <?php the_content(); ?>
                </div>  
            <?php } ?>            

            <div class="gallery-tabs">
                <ul class="gallery-tabs__btns gallery-tab-btns d-flex gap-1">
                    <li class="button gallery-tab-btns__button js-pathTabs col-auto active" data-path="0" data-tabpathrep="galery_0">
                        фото
                    </li>

                    <li class="button gallery-tab-btns__button js-pathTabs col-auto" data-path="1" data-tabpathrep="galery_1">
                        видео
                    </li>
                </ul>
                
                <article class="gallery-tab-target__target js-targetTabs gallery-tab-target active" data-target="0" data-tabTargetReprep="galery_0">
                    <?php                                            
                    $gallery_content_field = 'photo'; 
                    ?>

                    <h2 class="gallery-tab-target__title visually-hidden">Фото</h2>

                    <?php
                    // Block type of content
                    get_template_part('template-parts/block', 'content-gallery-photo'); ?>
                </article>
                
                <article class="gallery-tab-target__target js-targetTabs gallery-tab-target" data-target="1" data-tabTargetReprep="galery_1">
                    <?php                                            
                    $gallery_content_field = 'video'; 
                    ?>
                    <h2 class="gallery-tab-target__title visually-hidden">Видео</h2>

                    <?php
                    // Block type of content
                    get_template_part('template-parts/block', 'content-gallery-video'); ?>
                </article>
            </div>

        </div>
    </section>