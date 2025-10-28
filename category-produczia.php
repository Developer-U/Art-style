<?php
/**
 * Template Name: Produczia
 * The template for displaying archive Produczia
 * Архивная страница категории Продукция
 */

get_header();

## Удаляет "Рубрика: ", "Метка: " и т.д. из заголовка архива
add_filter('get_the_archive_title', function ($title) {
    return preg_replace('~^[^:]+: ~', '', $title);
});

$free_block_title_produczia = get_field('free_block_title_produczia', 'options');

// Выбор типа контента - текст, или аккордионы
$content_type = get_field('content_type_produczia', 'options');

// Контент текстом
$free_block_content_produczia = get_field('free_block_content_produczia', 'options');

$args = array(
    'parent' => get_queried_object_id(),
    'hide_empty' => 1,
    'exclude' => '', // ID рубрики, которую нужно исключить
    'number' => '0',
    'orderby' => 'count',
    'taxonomy' => 'category',
    'order' => 'DESC',
    'pad_counts' => true
);
$catlist = get_terms('category', $args);

// Block About
get_template_part('template-parts/top', 'pages');

?>

<section class="category">
    <div class="container">
        <div class="top-page-text post">
            <?php the_archive_description(); ?>
        </div>

        <ul class="category__list actions-list d-grid">
            <?php foreach ($catlist as $cat): ?>



                <li class="category__item actions-item"
                    style="background-image:url( <?php echo z_taxonomy_image_url($cat->term_id, 'full'); ?> );">
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
if ($free_block_content_produczia || have_rows('new_accordion_item_produczia', 'options')) {
    ?>

    <section class="free-block">
        <div class="container">
        <?php if ($free_block_title_produczia) { ?>
                <h2 class="head-stripes"><?php echo $free_block_title_produczia; ?></h2>
            <?php }
            ?>

            <div class="free-block__content post mt-2 mt-md-4">
                <?php
                if ($content_type == 'текст') {
                    echo $free_block_content_produczia;
                } else { ?>
                    <ul class="block-accordion__list block-accord-list my-accordion accordionjs">
                        <?php
                        if (have_rows('new_accordion_item_produczia', 'options')) { 
                            while (have_rows('new_accordion_item_produczia', 'options')) {
                                the_row();
                                $new_accordion__item_title = get_sub_field('new_accordion_item_title_produczia', 'options');
                                $new_accordion__item_text = get_sub_field('new_accordion_item_text_produczia', 'options');
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
