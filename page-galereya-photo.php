<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 *  Displaying page Galery
 *  Страница Галерея
 */
get_header();

// Block Top
get_template_part('template-parts/top', 'pages');

// Block Gallery
get_template_part('template-parts/block', 'galery');

get_footer();