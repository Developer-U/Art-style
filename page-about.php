<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 *  Displaying page About
 */
get_header();

// Block Top
get_template_part('template-parts/top', 'pages');

// Block About
get_template_part('template-parts/block', 'about');

// Block Why trust us
get_template_part('template-parts/block', 'why');

// Block Advantages
get_template_part('template-parts/block', 'advantages');

// Block Reviews
get_template_part('template-parts/block', 'reviews');

// Block Few Video
get_template_part('template-parts/block', 'few-video');

// Block Partners
get_template_part('template-parts/block', 'partners');

get_footer();