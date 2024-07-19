<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 *  Main Page
 */
get_header();

$socials =  get_field('social_icons', 'options');

$hero_main_image = get_field('hero_main_image');
$hero_main_headings = get_field('hero_main_headings');
$hero_main_advantages = get_field('hero_main_advantages');
?>

<section class="hero position-relative">
    <div class="hero__image" 
        style="<?php if($hero_main_image): ?> background-image: url( <?php echo $hero_main_image['url']; ?>) <?php else: ?>background-color: #ddd<?php endif; ?> "
        data-aos="fade-left"
        data-aos-offset="200"
        data-aos-delay="50"
        data-aos-duration="1000"
        data-aos-easing="ease-in-out"
        data-aos-mirror="true"
        data-aos-once="false"        
    >            
    </div>

    <div class="ct-container position-relative">
        <div class="hero__wrap hero-wrap">
            <?php if( $hero_main_headings['title'] ) { ?>
                <div class="hero-wrap__headings" 
               
                >
                    <span class="hero-wrap__heading hero-wrap__heading_top">
                        <?php echo $hero_main_headings['top']; ?>
                    </span>

                    <h1 class="hero__title">
                        <?php echo $hero_main_headings['title']; ?>
                    </h1>

                    <span class="hero-wrap__heading hero-wrap__heading_bottom">
                        <?php echo $hero_main_headings['bottom']; ?>
                    </span>                    
                </div>
            <?php } ?>

            <!-- CTA text social block -->
            <?php get_template_part('template-parts/fast', 'zakaz'); ?>
            <!-- CTA text social block end-->           

            <?php if( $hero_main_advantages['first'] || $hero_main_advantages['second'] || $hero_main_advantages['third']) { ?>
                <div class="container">
                    <ul class="hero__advantages hero-advantages d-grid align-items-center">
                        <li class="hero-advantages__item hero-advantages__item_first <?php if(!$hero_main_advantages['first_icon']) { ?>no-icon<?php } ?>">
                            <div class="hero-advantages__block d-grid align-items-center justify-content-center">
                                <span>                                    
                                    <img src="<?php echo esc_url($hero_main_advantages['first_icon']['url']); ?>" alt="<?php echo esc_attr($hero_main_advantages['first_icon']['alt']); ?>" />
                                </span>
                                <p><?php echo $hero_main_advantages['first']; ?></p>   
                            </div>                                                     
                        </li>
                        <li class="hero-advantages__item hero-advantages__item_second <?php if(!$hero_main_advantages['second_icon']) { ?>no-icon<?php } ?>">
                            <div class="hero-advantages__block d-grid align-items-center justify-content-center">
                                <span>                                    
                                    <img src="<?php echo esc_url($hero_main_advantages['second_icon']['url']); ?>" alt="<?php echo esc_attr($hero_main_advantages['second_icon']['alt']); ?>" />
                                </span>
                                <p><?php echo $hero_main_advantages['second']; ?></p>
                            </div>
                        </li>
                        <li class="hero-advantages__item hero-advantages__item_third <?php if(!$hero_main_advantages['third_icon']) { ?>no-icon<?php } ?>">
                            <div class="hero-advantages__block d-grid align-items-center justify-content-center">
                                <span>
                                <img src="<?php echo esc_url($hero_main_advantages['third_icon']['url']); ?>" alt="<?php echo esc_attr($hero_main_advantages['third_icon']['alt']); ?>" />
                                </span>
                                <p><?php echo $hero_main_advantages['third']; ?></p>
                            </div>
                        </li>
                    </ul>
                </div>                
            <?php } ?>
        </div>
    </div>
</section>

<!-- Block About -->
<?php get_template_part('template-parts/block', 'about'); ?>

<!-- Block Products -->
<?php get_template_part('template-parts/block', 'products'); ?>

<!-- Block Best Product -->
<?php get_template_part('template-parts/block', 'best-product'); ?>

<!-- Block Actions -->
<?php get_template_part('template-parts/block', 'actions'); ?>

<!-- Block One Video -->
<?php get_template_part('template-parts/block', 'one-video'); ?>

<?php
get_footer();