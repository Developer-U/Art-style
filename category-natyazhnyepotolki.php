<?php
/**
 * Template Name: natyazhnyepotolki
 * The template for displaying archive natyazhnyepotolki
 * Архивная страница категории Продукция
 */

get_header();

## Удаляет "Рубрика: ", "Метка: " и т.д. из заголовка архива
add_filter( 'get_the_archive_title', function( $title ){
	return preg_replace('~^[^:]+: ~', '', $title );
});

$free_block_title_natyazhnyepotolki = get_field('free_block_title_natyazhnyepotolki', 'options');

// Выбор типа контента - текст, или аккордионы
$content_type = get_field('content_type_natyazhnyepotolki', 'options');

// Контент текстом
$free_block_content_natyazhnyepotolki = get_field('free_block_content_natyazhnyepotolki', 'options');


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
            'terms'    => 'natyazhnyepotolki', // а это название термина - из какой именно рубрики нужно вывести посты
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
if ($free_block_content_natyazhnyepotolki || have_rows('new_accordion_item_natyazhnyepotolki', 'options')) {
    ?>

    <section class="free-block">
        <div class="container">
        <?php if ($free_block_title_natyazhnyepotolki) { ?>
                <h2 class="head-stripes"><?php echo $free_block_title_natyazhnyepotolki; ?></h2>
            <?php }
            ?>

            <div class="free-block__content post mt-2 mt-md-4">
                <?php
                if ($content_type == 'текст') {
                    echo $free_block_content_natyazhnyepotolki;
                } else { ?>
                    <ul class="block-accordion__list block-accord-list my-accordion accordionjs">
                        <?php
                        if (have_rows('new_accordion_item_natyazhnyepotolki', 'options')) { 
                            while (have_rows('new_accordion_item_natyazhnyepotolki', 'options')) {
                                the_row();
                                $new_accordion__item_title = get_sub_field('new_accordion_item_title_natyazhnyepotolki', 'options');
                                $new_accordion__item_text = get_sub_field('new_accordion_item_text_natyazhnyepotolki', 'options');
                                ?>

                                <li class="block-accord-list__item accord-list-item mb-2 mb-lg-4">
                                    <div>
                                        <?php echo $new_accordion__item_title; ?>
                                        <!-- Здесь span - это галка справа, которая при открытии будет поворачиваться
                                Если галка не нужна, можно убрать этот span, но тогда убрать и лишний код js -->
                                        <span></span>
                                    </div>

                                    <div>
                                        <?php echo $new_accordion__item_text; ?>
                                    </div>
                                </li>
                            <?php 
                            
                            }                            
                        } ?>
                    </ul>
                <?php }
                ?>
            </div>
        </div>
    </section>

<?php }

get_footer();
