<?php
/**
* Display Block Get Price
* Using Contact Form 7
* @link https://ru.wordpress.org/plugins/contact-form-7/
* блок "Узнайте стоимость потолка"
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$get_price_title = get_field('get-price_title', 'options');
$get_price_title_osvet = get_field('get-price_title_osvet', 'options');
$get_price_image = get_field('get-price_image', 'options');
$get_price_text = get_field('get-price_text', 'options');
?>

    <section class="get-price dark">   
        <?php     
        if($get_price_title || $get_price_title_osvet ) {
        ?>

            <div class="container">
                <div class="head-stripes-wrap" >
                    <h2 class="head-stripes get-price__title">
                        <?php echo 
                        is_page('podbor') ?
                        $get_price_title_osvet :
                        $get_price_title; ?>                        
                    </h2> 
                </div>               
            </div>  

        <?php } ?>

        <div class="container">
            <div class="get-price__wrap get-price-wrap d-grid align-items-start">
                <div id="get-price__form">
                    <?php echo do_shortcode('[contact-form-7 id="e9faf6b" title="Узнайте стоимость потолка"]');
                   
                    if( $get_price_text ) { ?>
                        <p class="get-price__text">
                            <?php echo $get_price_text; ?>
                        </p>
                    <?php } ?>
                </div>

                <figure class="best-product-wrap__image best-product-wrap__image_price" style="background: #ddd;">
                    <?php
                    if( $get_price_image ) { ?>
                        <img src="<?php echo $get_price_image['url']; ?>" alt="<?php echo $get_price_image['alt']; ?>"> 
                    <?php } ?>    
                </figure>
            </div>
        </div>
    </section>