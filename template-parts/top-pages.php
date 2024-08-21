<?php
/**
* Display top Block for pages
* Верхний блок страниц
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

    <section class="top-pages dark">
        <div class="container">
            <h1 class="top-pages__title">
                <?php                 
                    is_category() ? the_archive_title('') : the_title();                  
                ?>                
            </h1>            

            <!-- breadcrumbs -->
            <div class="breadcrumbs">
                <div class="breadcrumbs__container">
                    <?php
                        if ( function_exists('yoast_breadcrumb') ) {
                            ( yoast_breadcrumb('<div class="breadcrumbs__list">','</div>' ) );
                        }
                    ?>
                </div>
            </div>
            <!-- breadcrumbs end -->
        </div>
    </section>