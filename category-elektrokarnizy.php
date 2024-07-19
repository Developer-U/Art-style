<?php
/**
 * Template Name: elektrokarnizy
 * The template for displaying archive elektrokarnizy
 * Архивная страница категории Электрокарнизы
 */

ob_start();
$new_url = '/products/elektrokarnizy/';
header('Location: '.$new_url);
ob_end_flush();

get_header();

## Удаляет "Рубрика: ", "Метка: " и т.д. из заголовка архива
add_filter( 'get_the_archive_title', function( $title ){
	return preg_replace('~^[^:]+: ~', '', $title );
});

$taxonomy = 'category'; // Из файла post-types это название самой рубрики
$terms = get_terms($taxonomy);
$arg_posts =  array(
    'orderby'      => 'name',
    'order'        => 'DESC',
    'posts_per_page' => 99,
    'post_type' => 'products',
    'post_status' => 'publish',  
    'tax_query' => array( // массив в массиве
        array(
            'taxonomy' => 'category', // опять же - здесь название рубрики
            'field' => 'slug',
            'terms'    => 'elektrokarnizy', // а это название термина - из какой именно рубрики нужно вывести посты
        )
    )
        
);
$query = new WP_Query($arg_posts);  

// Block About
get_template_part('template-parts/top', 'pages');

?>

    <section class="category">
        <div class="container">    
            <div class="top-page-text post">
                <?php the_archive_description(); ?>
            </div>             

            <ul class="category__list actions-list d-grid">
                <?php if ($query->have_posts() ) ?>
                    <?php while ( $query->have_posts() ) : $query->the_post();                                    
                    ?>	

                        <li class="category__item actions-item" style="background-image: url(<?php if ( has_post_thumbnail()) { 
                            $full_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); 
                            echo ''.$full_image_url[0] . ''; } ?>)">

                            <span class="grey-gradient"></span>

                            <div class="d-flex flex-column justify-content-between">
                                <h2 class="actions-item__title">
                                    <?php the_title(); ?>
                                </h2>

                                <a href="<?php the_permalink(); ?>" class="category__link">
                                    Перейти
                                </a>
                            </div>                        
                        </li>

                    <?php endwhile; wp_reset_postdata()?>
                <?php ?>	
            </ul>   
            
            <!-- CTA text social block -->
            <?php get_template_part('template-parts/fast', 'zakaz'); ?>
        </div> 
    </section> 

<?php
get_footer();