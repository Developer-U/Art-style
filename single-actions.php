<?php
/*
Template Name: Страница акции
Template Post Type: actions
*/
get_header();

if (have_posts()) {
	the_post();
}

if (
	function_exists('blc_get_content_block_that_matches')
	&&
	blc_get_content_block_that_matches([
		'template_type' => 'single',
		'template_subtype' => 'canvas'
	])
) {
	echo blc_render_content_block(
		blc_get_content_block_that_matches([
			'template_type' => 'single',
			'template_subtype' => 'canvas'
		])
	);
	have_posts();
	wp_reset_query();
	return;
}
$post_id = get_the_ID();
$product_block_type = get_field('product_block_type', $post_id);  

// Block Top
get_template_part('template-parts/top', 'pages');
?>

    <section class="about">
        <div class="container">
            <div class="about__wrap <?php if( has_post_thumbnail() ) { ?>about-wrap d-grid<?php } else {?>about-wrap-noimg<?php } ?>">
                <?php
                if( has_post_thumbnail() ) { ?>
                    <figure class="about-wrap__image" style="background: #ddd;">
                        <?php
                        the_post_thumbnail('full', get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE));    
                    ?>      
                    </figure>
                <?php } ?>

                <div class="about-wrap__text">   
                    <div class="about-wrap__top post">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div> 
            
            <div class="post-nav">
                <?php
                the_post_navigation(
                    array(
                        'prev_text' => '<span class="nav-subtitle prev">' . esc_html__( '←', 'estore' ) . '</span> <span class="nav-title"></span>',
                        'next_text' => '<span class="nav-title"></span> <span class="nav-subtitle next">' . esc_html__( '→', 'estore' ) . '</span>',
                    )
                );
                ?>
            </div> 

            <?php
            // Block Top
            get_template_part('template-parts/fast', 'zakaz');
            ?>
        </div>
    </section>



<?php
have_posts();
wp_reset_query();

get_footer();