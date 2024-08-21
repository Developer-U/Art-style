<?php
/**
* Display Block Actions
* Вывод акций из Custom Post Type "Акции" - actions
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$page_id = get_the_ID();

if( !is_archive('actions') ) {
    $post_length = 2;
} else {
    $post_length = 99;
}

$arg_actions =  array(
    'orderby'      => 'name',
    'order'        => 'DESC',
    'posts_per_page' => $post_length,
    'post_type' => 'actions',
    'post_status' => 'publish', 
);

$actions_block_title = get_field('actions_block_title', $page_id); 
$query_actions = new WP_Query($arg_actions); 

if ($query_actions->have_posts() )  { ?>

    <section class="actions-block"
        data-aos="fade-up"
        data-aos-offset="50"
        data-aos-delay="10"
        data-aos-duration="1200"
        data-aos-easing="ease-in-out"
        data-aos-mirror="true"       
        data-aos-anchor-placement="bottom"
    >
        <div class="container">
            <?php
            if( !is_archive('actions') ) { ?>
                <div class="head-stripes-wrap" >
                    <h2 class="head-stripes get-price__title">
                        <?php echo
                        $actions_block_title ? $actions_block_title : 'Наши акции';
                        ?>                      
                    </h2> 
                </div>       
            <?php } else { 
                if( get_the_content() ) {
                ?>
                    <div class="top-page-text post">
                        <?php the_content(); ?>
                    </div>  
                <?php }
            } ?>       
        </div>  

        <div class="container"> 
            <ul class="actions-block__list actions-list d-grid <?php if( is_archive('actions') ) { ?>actions-page<?php } ?>">
                <?php
                if ($query_actions->have_posts() )  { ?>
                <?php while ( $query_actions->have_posts() ) : $query_actions->the_post();  
                $action_listing_title = get_field('action_listing_title');   
                ?>

                    <li class="actions-list__item actions-item" style="background-image:url( <?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?> );">
                        <span class="grey-gradient"></span>

                        <div class="d-flex flex-column justify-content-between">
                            <h3 class="actions-item__title">
                                <?php echo $action_listing_title; ?>
                            </h3>

                            <a href="<?php the_permalink(); ?>" class="button red-btn actions-list__btn">
                                Подробнее
                            </a>
                        </div>                        
                    </li>

                <?php endwhile; wp_reset_postdata()?>
                <?php } ?>	 
            </ul>

            <?php if( !is_archive('actions') ) { ?>
                <a href="/actions" class="button red-btn">все наши акции</a> 
            <?php } ?>	 
        </div>
    </section>

<?php } ?>