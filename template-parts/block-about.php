<?php
/**
* Display Block About
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$page_id = get_the_ID();
$about_title = get_field('about_title', $page_id);
$about_image = get_field('about_image', $page_id);
$about_text = get_field('about_text', $page_id);

if( $about_text ) { ?>

    <section class="about <?php if( !is_page('about') ) { ?>dark<?php } ?>">
        <?php    
        if( $about_title && !is_page('about') ) { ?>
            <div class="container">
                <div class="head-stripes-wrap" >
                    <h2 class="head-stripes get-price__title">
                        <?php echo $about_title; ?>                        
                    </h2> 
                </div>               
            </div> 
        <?php } ?>
        
        <div class="container">
            <div class="about__wrap <?php if( $about_image ) { ?>about-wrap d-grid<?php } else {?>about-wrap-noimg<?php } ?>">
                <?php
                if( $about_image ) { ?>
                    <figure class="about-wrap__image" style="background: #ddd;"
                        data-aos="fade-left"
                        data-aos-offset="50"
                        data-aos-delay="10"
                        data-aos-duration="1000"
                        data-aos-easing="ease-in-out"
                        data-aos-mirror="true"                        
                    >
                        <img src="<?php echo $about_image['url']; ?>" alt="<?php echo $about_image['alt']; ?>">               
                    </figure>
                <?php } ?>

                <div class="about-wrap__text <?php if(!is_page('about') ) { ?>d-grid<?php } ?>" >
                    <div class="about-wrap__top post" 
                        data-aos="fade-right"
                        data-aos-offset="50"
                        data-aos-delay="100"
                        data-aos-duration="1000"
                        data-aos-easing="ease-in-out"
                        data-aos-mirror="true"   
                    >
                        <?php echo $about_text; ?>
                    </div>                        

                    <?php if(!is_page('about') ) { ?>
                        <a href="/about" class="button red-btn">узнать о нас больше</a>
                    <?php } ?>
                </div>
            </div>            
        </div>
    </section>

<?php } ?>