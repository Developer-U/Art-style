<?php
/**
* Display Block Reviews
* блок Отзывы наших клиентов
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

$page_id = get_the_ID();
$reviews_title = get_field('reviews_title', $page_id);

$arg_reviews = array(
    'orderby' => 'name',
    'order' => 'DESC',
    'posts_per_page' => 99,
    'post_type' => 'reviews',
    'post_status' => 'publish',
);

$query_reviews = new WP_Query($arg_reviews);

if ($query_reviews->have_posts()) {
?>

    <section class="dark reviews">
        <?php     
        if($reviews_title ) {
        ?>

            <div class="container">
                <div class="head-stripes-wrap" >
                    <h2 class="head-stripes get-price__title">
                        <?php echo $reviews_title; ?>                        
                    </h2> 
                </div>               
            </div>  

        <?php } ?>

        <div class="container">
            <ul class="reviews__list why-list reviews-list d-grid">

                <?php
                if ($query_reviews->have_posts()) {                     
                    while ($query_reviews->have_posts()):
                        $query_reviews->the_post(); 
                        $person_post = get_field('person_post');
                        $designer_fields = get_field('designer_fields');
                        ?>
                        
                        <li class="why-list__item reviews-item position-relative js-reviews">                            
                            <figure class="reviews-item__image" style="background: #ddd;">
                                <?php
                                if( has_post_thumbnail() ) {              
                                    the_post_thumbnail('full', get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE));    
                                } else { ?>
                                    <img class="no-image" src="/wp-content/themes/blocksy-child/assets/img/no-image.jpg" alt="фото">
                                <?php }
                                ?>  
                            </figure>

                            <div class="reviews-item__bottom reviews-bottom d-grid">
                                <div class="reviews-item__content">
                                    <?php
                                    if( $designer_fields['name'] ) { ?>
                                        <div class="present-block d-grid align-items-center">
                                            <h4 class="reviews-bottom__title present-block__title">
                                                <?php the_title(); ?>
                                            </h4>

                                            <div class="present-block__designer designer-block d-grid gap-2 align-items-center">
                                                <figure class="designer-block__photo">
                                                    <?php
                                                    if( $designer_fields['photo'] ) { ?>             
                                                        <img src="<?php echo $designer_fields['photo']['url']; ?>" alt="<?php echo $designer_fields['photo']['alt']; ?>">   
                                                    <?php } else { ?>
                                                        <img class="no-image" src="/wp-content/themes/blocksy-child/assets/img/no-image.jpg" alt="фото">
                                                    <?php }
                                                    ?>
                                                </figure>

                                                <div class="designer-block__text">
                                                    <h5><?php echo $designer_fields['name']; ?></h5>
                                                    <p><?php echo $designer_fields['post']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } else { ?>
                                        <h4 class="reviews-bottom__title">
                                            <?php the_title(); ?>
                                        </h4>
                                    <?php } ?>                                    

                                    <div class="reviews-item__text">
                                        <div>
                                            <?php the_content(); ?>
                                        </div>
                                    </div>
                                </div>

                                <button type="button" class="main-reviews__item-more"><span>читать полностью</span></button>

                                <button type="button" class="main-reviews__item-less"><span>скрыть</span></button>
                            </div>                          
                        </li>

                    <?php
                    endwhile;
                    wp_reset_postdata() ?>
                <?php } ?>

            </ul>
        </div>
    </section>

<?php }