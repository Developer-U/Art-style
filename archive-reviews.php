<?php
/**
 * Archive peage post type: reviews
 * Архивная страница с выводом постов Акции
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */
## Удаляет "Рубрика: ", "Метка: " и т.д. из заголовка архива
add_filter( 'get_the_archive_title', function( $title ){
	return preg_replace('~^[^:]+: ~', '', $title );
});

$free_block_title_reviews = get_field('free_block_title_reviews', 'options');

// Выбор типа контента - текст, или аккордионы
$content_type = get_field('content_type_reviews', 'options');

// Контент текстом
$free_block_content_reviews = get_field('free_block_content_reviews', 'options');

get_header();

// Block Top
?>
<section class="top-pages">
    <div class="container">
        <h1 class="top-pages__title">
            Отзывы               
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
// Block Contacts
get_template_part('template-parts/block', 'reviews');

// Block Get Price
get_template_part('template-parts/block', 'get-price');

if ($free_block_content_reviews || have_rows('new_accordion_item_reviews', 'options')) {
    ?>

    <section class="free-block">
        <div class="container">
        <?php if ($free_block_title_reviews) { ?>
                <h2 class="head-stripes"><?php echo $free_block_title_reviews; ?></h2>
            <?php }
            ?>

            <div class="free-block__content post mt-2 mt-md-4">
                <?php
                if ($content_type == 'текст') {
                    echo $free_block_content_reviews;
                } else { ?>
                    <ul class="block-accordion__list block-accord-list my-accordion accordionjs">
                        <?php
                        if (have_rows('new_accordion_item_reviews', 'options')) { 
                            while (have_rows('new_accordion_item_reviews', 'options')) {
                                the_row();
                                $new_accordion__item_title = get_sub_field('new_accordion_item_title_reviews', 'options');
                                $new_accordion__item_text = get_sub_field('new_accordion_item_text_reviews', 'options');
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