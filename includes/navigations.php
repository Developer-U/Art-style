<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

register_nav_menus( array(
    'primary' => 'Основное',  
    'footer_menu' => 'Меню в футере',  
));

function estore_primary_menu() {
    wp_nav_menu( [
        'theme_location'  => 'primary',    
        'menu_id'         => 'primary-menu'   
    ] );
}

function estore_footer_menu() {
    wp_nav_menu( [
        'theme_location'  => 'footer_menu',    
        'menu_id'         => 'footer_menu'   
    ] );
}