<?php
/**
 * Template Name: Produczia
 * The template for displaying archive Produczia
 * Архивная страница категории Продукция
 */

get_header();

## Удаляет "Рубрика: ", "Метка: " и т.д. из заголовка архива
add_filter( 'get_the_archive_title', function( $title ){
	return preg_replace('~^[^:]+: ~', '', $title );
});


$args = array(
	'parent' => get_queried_object_id(),
	'hide_empty' => 1,
	'exclude' => '', // ID рубрики, которую нужно исключить
	'number' => '0',
	'orderby' => 'count',
    'taxonomy'   => 'category',
	'order' => 'DESC',
	'pad_counts' => true
);
$catlist = get_terms('category',$args);

// Block About
get_template_part('template-parts/top', 'pages');

?>

    <section class="category">
        <div class="container">    
            <div class="top-page-text post">
                <?php the_archive_description(); ?>
            </div>             

            <ul class="category__list actions-list d-grid">
                <?php foreach ($catlist as $cat) : ?>

                   

                    <li class="category__item actions-item" style="background-image:url( <?php echo z_taxonomy_image_url($cat->term_id, 'full'); ?> );">  
                        <span class="grey-gradient"></span>

                        <div class="d-flex flex-column justify-content-between">
                            <h2 class="actions-item__title">
                                <?php echo $cat->name; ?>
                            </h2>

                            <a href="<?php echo get_term_link($cat->slug, 'category'); ?>" class="category__link">
                                Перейти
                            </a>
                        </div>                        
                    </li>

                <?php endforeach; ?>
            </ul>   
            
            <!-- CTA text social block -->
            <?php get_template_part('template-parts/fast', 'zakaz'); ?>
        </div> 
    </section> 

<?php
get_footer();
