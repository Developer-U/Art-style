<?php
/*
 * Display Block Products
 * Left and right layout
 * Вывод кастомного типа постов по рубрике "Натяжные потолки"
 */

$page_id = get_the_ID();

$taxonomy = 'category'; // Из файла post-types это название самой рубрики
$terms = get_terms($taxonomy);
$arg_posts = array(
    'orderby' => 'name',
    'order' => 'DESC',
    'posts_per_page' => 50,
    'post_type' => 'products',
    'post_status' => 'publish',
    'tax_query' => array(
        array(
            'taxonomy' => 'category', // опять же - здесь название рубрики
            'field' => 'slug',
            'terms' => 'natyazhnyepotolki', // а это название термина - из какой именно рубрики нужно вывести посты
        )
    )

);
?>


<section class="products">
    <div class="container">

        <?php
        $query = new WP_Query($arg_posts);

        if ($query->have_posts()) { ?>
            <?php $i = 0;
            while ($query->have_posts()):
                $query->the_post();
                $product_block_images = get_field('product_block_images');
                $index = $i++; // Создаём счётчик                                              
        
                if ($product_block_images['main_view'] !== 'скрыть') {

                    if ($index == 0 || ($index % 2) == 0) { // Если чётные индексы или первый - вёрстка "слева картинка, справа - текст" ?>

                        <div class="products__block products-block left">
                            <div class="head-stripes-wrap">
                                <h2 class="head-stripes get-price__title">
                                    <?php the_title(); ?>
                                </h2>
                            </div>

                            <div class="products-block__first products-block-first d-grid">
                                <?php
                                if (has_post_thumbnail()) { ?>
                                    <figure class="products-block-first__image" style="background: #ddd;">
                                        <?php
                                        the_post_thumbnail('full', get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE));
                                        ?>
                                    </figure>
                                <?php } ?>

                                <div class="products-block__text">
                                    <?php
                                    the_excerpt();

                                    if (!$product_block_images['third']) { ?>
                                        <a href="<?php the_permalink(); ?>"
                                            class="button products-block__btn products-block__btn_noimg red-btn">узнать больше</a>
                                    <?php } ?>
                                </div>
                            </div>

                            <?php
                            if ($product_block_images['second']) { ?>
                                <div class="products-block__second products-block-second">
                                    <figure class="products-block-second__image" style="background: #ddd;">
                                        <img src="<?php echo $product_block_images['second']['url']; ?>"
                                            alt="<?php echo $product_block_images['second']['alt']; ?>">
                                    </figure>
                                </div>
                            <?php } ?>

                            <?php
                            if ($product_block_images['third']) { ?>
                                <div class="products-block__third products-block-third d-grid">
                                    <figure class="products-block-third__image" style="background: #ddd;">
                                        <img src="<?php echo $product_block_images['third']['url']; ?>"
                                            alt="<?php echo $product_block_images['third']['alt']; ?>">
                                    </figure>

                                    <div class="products-block-third__btn">
                                        <a href="<?php the_permalink(); ?>" class="button products-block__btn red-btn">узнать больше</a>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>

                    <?php } else { ?>

                        <div class="products__block products-block right">
                            <div class="head-stripes-wrap">
                                <h2 class="head-stripes get-price__title">
                                    <?php the_title(); ?>
                                </h2>
                            </div>

                            <div class="products-block__first products-block-first d-grid">
                                <div class="products-block__text">
                                    <?php
                                    the_excerpt();
                                    ?>

                                    <?php
                                    if (!$product_block_images['third']) { ?>
                                        <a href="<?php the_permalink(); ?>"
                                            class="button products-block__btn products-block__btn_noimg red-btn">узнать больше</a>
                                    <?php } ?>
                                </div>

                                <?php
                                if (has_post_thumbnail()) { ?>
                                    <figure class="products-block-first__image" style="background: #ddd;">
                                        <?php
                                        the_post_thumbnail('full', get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE));
                                        ?>
                                    </figure>
                                <?php } ?>
                            </div>

                            <?php
                            if ($product_block_images['second']) { ?>
                                <div class="products-block__second products-block-second">
                                    <figure class="products-block-second__image" style="background: #ddd;">
                                        <img src="<?php echo $product_block_images['second']['url']; ?>"
                                            alt="<?php echo $product_block_images['second']['alt']; ?>">
                                    </figure>
                                </div>
                            <?php } ?>

                            <?php
                            if ($product_block_images['third']) { ?>
                                <div class="products-block__third products-block-third d-grid">
                                    <figure class="products-block-third__image" style="background: #ddd;">
                                        <img src="<?php echo $product_block_images['third']['url']; ?>"
                                            alt="<?php echo $product_block_images['third']['alt']; ?>">
                                    </figure>

                                    <div class="products-block-third__btn">
                                        <a href="<?php the_permalink(); ?>" class="button products-block__btn red-btn">узнать больше</a>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>

                    <?php }
                }

            endwhile;
            wp_reset_postdata() ?>
        <?php } ?>
    </div>
</section>