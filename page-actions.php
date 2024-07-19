<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 *  Displaying page Actions
 *  Страница Акции
 */
get_header();

// Block Top
get_template_part('template-parts/top', 'pages');

// Block Actions
get_template_part('template-parts/block', 'actions');

// Block Attention
get_template_part('template-parts/block', 'attention');

get_footer();