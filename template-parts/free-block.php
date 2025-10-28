<?php
/**
 * Display top Block for pages
 * Верхний блок страниц
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$page_id = get_the_ID();
$prefix = (is_archive() || is_category()) ? 'options' : $page_id;
$free_block_title = (is_archive() || is_category()) ? get_field('free_block_title_' . $page_id, $prefix) : get_field('free_block_title', $prefix);

// Выбор типа контента - текст, или аккордионы
$content_type = (is_archive() || is_category()) ? get_field('content_type_' . $page_id, $prefix) : get_field('content_type', $prefix);

// Контент текстом
$free_block_content = (is_archive() || is_category()) ? get_field('free_block_content_' . $page_id, $prefix) : get_field('free_block_content', $prefix);

// Контент аккордион
$new_accordion_item = (is_archive() || is_category()) ? get_field('new_accordion_item_' . $page_id) : get_field('new_accordion_item');

if ($free_block_content || have_rows('new_accordion_item', $prefix)) {
    ?>

    <section class="free-block">
        <div class="container">
            <?php if ($free_block_title) { ?>
                <h2 class="head-stripes"><?php echo $free_block_title; ?></h2>
            <?php }
            ?>

            <div class="free-block__content post mt-2 mt-md-4">
                <?php
                if ($content_type == 'текст') {
                    echo $free_block_content;
                } else { ?>
                    <ul class="block-accordion__list block-accord-list my-accordion accordionjs">
                        <?php
                        if (have_rows('new_accordion_item', $page_id)) { 
                            while (have_rows('new_accordion_item', $page_id)) {
                                the_row();
                                $new_accordion__item_title = get_sub_field('new_accordion_item_title', $page_id);
                                $new_accordion__item_text = get_sub_field('new_accordion_item_text', $page_id);
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