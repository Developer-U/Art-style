<?php
/**
 * Template part for displaying Block Partners width slider on Swiper
 * Блок Логотипы партнёров со слайдером на Swiper
 */
$page_id = get_the_ID();
$partners_title = get_field('partners_title', $page_id);
if( have_rows('new_partner_logo') ) {
?>

    <section class="partners dark"
        data-aos="fade-up"
        data-aos-offset="100"
        data-aos-delay= 100
        data-aos-duration="1000"
        data-aos-easing="ease-in"
        data-aos-once="false"       
        data-aos-anchor-placement="center"
    >
        <?php     
        if($partners_title ) {
        ?>

            <div class="container">
                <div class="head-stripes-wrap" >
                    <h2 class="head-stripes get-price__title">
                        <?php echo $partners_title; ?>                        
                    </h2> 
                </div>               
            </div>  

        <?php } ?>

        <div class="container"> 
            <div class="partners__inner position-relative">
                <div class="swiper partners__slider partners-slider">
                    <div class="swiper-wrapper">

                        <?php if( have_rows('new_partner_logo') ): ?>
                        <?php while( have_rows('new_partner_logo') ): the_row();                    
                        $partner_logo = get_sub_field('partner_logo');                                                    
                        ?>

                            <figure class="swiper-slide partners-slider__slide">                 
                                <img src="<?php echo $partner_logo['url']; ?>" alt="<?php echo $partner_logo['alt']; ?>">
                            </figure>

                        <?php endwhile; ?>
                        <?php endif; ?>
                    </div>                   
                </div>

                <div class="swiper-button-next slider-arrow-next"></div>
                <div class="swiper-button-prev slider-arrow-prev"></div>
            </div>
            
        </div>
    </section>

<?php } ?>