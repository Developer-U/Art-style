<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blocksy
 */

get_header();
$page_id = get_the_ID();
$archive_title = get_field('archive_title_blog', 'options');

$free_block_title_blog = get_field('free_block_title_blog', 'options');

// Выбор типа контента - текст, или аккордионы
$content_type = get_field('content_type_blog', 'options');

// Контент текстом
$free_block_content_blog = get_field('free_block_content_blog', 'options');
?>
<section class="top-pages dark">
    <div class="container">     
	<h1 class="top-pages__title">   
        <?php if ($archive_title) {
            echo $archive_title;            
        } else { 
            echo 'Блог';
        } ?>
		</h1>

        <!-- breadcrumbs -->
        <div class="breadcrumbs">
            <div class="breadcrumbs__container">
                <?php
                if (function_exists('yoast_breadcrumb')) {
                    (yoast_breadcrumb('<div class="breadcrumbs__list">', '</div>'));
                }
                ?>
            </div>
        </div>
        <!-- breadcrumbs end -->
    </div>
</section>

<?php
if (
	! function_exists('elementor_theme_do_location')
	||
	! elementor_theme_do_location('archive')
) {
	get_template_part('template-parts/archive');
}
if ($free_block_content_blog || have_rows('new_accordion_item_blog', 'options')) {
    ?>

    <section class="free-block">
        <div class="container">
        <?php if ($free_block_title_blog) { ?>
                <h2 class="head-stripes"><?php echo $free_block_title_blog; ?></h2>
            <?php }
            ?>

            <div class="free-block__content post mt-2 mt-md-4">
                <?php
                if ($content_type == 'текст') {
                    echo $free_block_content_blog;
                } else { ?>
                    <ul class="block-accordion__list block-accord-list my-accordion accordionjs">
                        <?php
                        if (have_rows('new_accordion_item_blog', 'options')) { 
                            while (have_rows('new_accordion_item_blog', 'options')) {
                                the_row();
                                $new_accordion__item_title = get_sub_field('new_accordion_item_title_blog', 'options');
                                $new_accordion__item_text = get_sub_field('new_accordion_item_text_blog', 'options');
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
