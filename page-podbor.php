<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 *  Displaying page Podbor
 *  Страница Подбор освещения
 */
get_header();

// Block Top
get_template_part('template-parts/top', 'pages');

// Block Text-Image
get_template_part('template-parts/block', 'image-text');

// Block Image items
get_template_part('template-parts/block', 'image-items');

// Block Params
get_template_part('template-parts/block', 'attention');

// Block Get Price
get_template_part('template-parts/block', 'get-price');

get_footer();