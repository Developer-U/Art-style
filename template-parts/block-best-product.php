<?php
/*
* Display Block Best Products
* Блок с отдельно выделенным продуктом. В данном случае - это "Тканевые потолки JM Technikal"
* Вывод одного товара из категории "Натяжные потолки"
*/

$taxonomy = 'category'; // Из рубрики Натяжные потолки
$terms = get_terms($taxonomy);
$arg_posts =  array(
    'orderby'      => 'name',
    'order'        => 'DESC',
    'posts_per_page' => 1,
    'post_type' => 'products',
    'post_status' => 'publish', 
    'tag' => 'best', // Вывести продкт, у которого установлена метка со слагом "best" 
    'tax_query' => array( 
        array(
            'taxonomy' => 'category', // опять же - здесь название рубрики
            'field' => 'slug',
            'terms'    => 'natyazhnyepotolki', // а это название термина - из какой именно рубрики нужно вывести посты
        )
    )
        
);
$best_product_logo = get_field('best_product_logo'); 
$best_product_adv_text = get_field('best_product_adv_text'); 

$query = new WP_Query($arg_posts); 

if ($query->have_posts() )  { ?>
    <?php while ( $query->have_posts() ) : $query->the_post();     
?>

    <section class="best-product dark">
        <div class="container">
            <div class="best-product__titlebox <?php if( $best_product_logo ) { ?>title-box d-grid align-items-center gap-3<?php } else {?>about-wrap-noimg<?php } ?>">
             
                <div class="head-stripes-wrap" >
                    <h2 class="head-stripes get-price__title">
                        <?php the_title(); ?>                   
                    </h2> 
                </div>  

                <?php if( $best_product_logo ) { ?>
                    <div class="title-box__logo">
                        <img src="<?php echo $best_product_logo['url']; ?>" alt="<?php echo $best_product_logo['alt']; ?>">
                    </div>
                <?php } ?>
            </div>

            <div class="best-product__wrap best-product-wrap d-grid">
                <div class="best-product-wrap__text post">                
                    <?php the_excerpt(); ?>               
                </div>

                <?php               
                if( has_post_thumbnail() ) { ?>
                    <figure class="best-product-wrap__image" style="background: #ddd;">
                        <?php
                        the_post_thumbnail('full', get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE)); 
                        ?>       
                    </figure>
                <?php } ?>
            </div>

            <div class="best-product__wrap best-product__wrap_adv best-product-wrap d-grid">
                <ul class="best-product__advantages advantages-list d-grid">

                    <?php if( have_rows('new_adv_item') ): ?>
                    <?php while( have_rows('new_adv_item') ): the_row();
                    $adv_item_text = get_sub_field('adv_item_text');     
                    $adv_item_image = get_sub_field('adv_item_image');                                                    
                    ?>

                        <li class="advantages-list__item <?php if( $adv_item_image ) { ?>adv-item d-grid align-items-center<?php } else {?>adv-item-noimg<?php } ?>">
                            <?php if( $adv_item_image ) { ?>
                                <div class="adv-item__box">
                                    <figure class="adv-item__image">
                                        <img src="<?php echo $adv_item_image['url']; ?>" alt="<?php echo $adv_item_image['alt']; ?>">               
                                    </figure>
                                </div>                                    
                            <?php } ?>

                            <p>
                                <?php echo $adv_item_text; ?>
                            </p>                                
                        </li>

                    <?php endwhile; ?>
                    <?php endif; ?>
                </ul>

                <?php
                if( $best_product_adv_text ) { ?>
                    <div class="best-product-wrap__advtext adv-text-main d-flex align-items-center">
                        <p>
                            <?php echo $best_product_adv_text; ?>
                        </p>                            
                    </div>
                <?php } ?>
            </div>        

            <div class="best-product__btn">
                <a href="<?php the_permalink(); ?>" class="button products-block__btn red-btn">узнать больше</a>  
            </div> 
        </div>
    </section>

<?php endwhile; wp_reset_postdata()?>
<?php } ?>	 