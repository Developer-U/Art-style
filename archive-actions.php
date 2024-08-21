<?php
/**
 * Archive peage post type: actions
 * Архивная страница с выводом постов Акции
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */
## Удаляет "Рубрика: ", "Метка: " и т.д. из заголовка архива
add_filter( 'get_the_archive_title', function( $title ){
	return preg_replace('~^[^:]+: ~', '', $title );
});

get_header();
?>

<section class="top-pages dark">
    <div class="container">
        <h1 class="top-pages__title">
            Акции               
        </h1>            

        <!-- breadcrumbs -->
        <div class="breadcrumbs">
            <div class="breadcrumbs__container">
                <?php
                    if ( function_exists('yoast_breadcrumb') ) {
                        ( yoast_breadcrumb('<div class="breadcrumbs__list">','</div>' ) );
                    }
                ?>
            </div>
        </div>
        <!-- breadcrumbs end -->
    </div>
</section>

<?php
// Block Actions
get_template_part('template-parts/block', 'actions');

// Block Attention
get_template_part('template-parts/block', 'attention');

get_footer();