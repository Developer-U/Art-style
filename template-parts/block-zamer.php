<?php
/**
* Display Block Free zamer
* блок бесплатный замер
* Сквозной
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$zamer_title = get_field('zamer_title', 'options');
$zamer_text = get_field('zamer_text', 'options');
$zamer_image = get_field('zamer_image', 'options');
?>

<section class="zamer overlay position-relative" style="background-image:url( <?php echo $zamer_image['url']; ?> ); background-size: cover; background-repeat:no-repeat; background-position:center; background-attachment:fixed">
    <div class="container">
        <div class="zamer__wrap">
            <h2 class="zamer__heading text-center">
                <?php if($zamer_title) {
                    echo $zamer_title;
                } else {
                    echo 'Запишитесь на бесплатный замер';
                } ?>
            </h2>

            <?php if($zamer_text) { ?>
                <div class="zamer__text text-center mb-4">
                    <?php echo $zamer_text; ?>
                </div>
            <?php } 
            
            echo do_shortcode('[contact-form-7 id="6aa0bef" title="Записаться на бесплатный замер"]');
            ?>
        </div>
    </div>
</section>