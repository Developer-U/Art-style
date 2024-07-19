<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 *  Displaying page Contacts
 *  Страница Контакты
 */
get_header();

// Block Top
get_template_part('template-parts/top', 'pages');

// Block Contacts
get_template_part('template-parts/block', 'contacts');

// Block Get Price
get_template_part('template-parts/block', 'get-price');

get_footer();