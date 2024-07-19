<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/* Регистрируем новый тип записей - Продукты и рубрики к ним
-----------------------------------------------*/
add_action('init', 'products');
function products()
{
  $labels = array(
    'name' => 'Продукция',
    'singular_name' => 'Продукция',
    'add_new' => 'Добавить Продукцию',
    'add_new_item' => 'Добавить новый продукт',
    'edit_item' => 'Редактировать продукт',
    'new_item' => 'Новый продукт',
    'view_item' => 'Посмотреть продукт',    
    'search_items' => 'Найти продукт',
    'not_found' =>  'Продукции не найдено', 
    'parent_item_colon' => '',
    'menu_name' => 'Продукция'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'menu_icon' => 'dashicons-grid-view',
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
	'show_tagcloud' => true,
    'has_archive' => true,
    'hierarchical' => true,
    'menu_position' => 6,
    'supports' => array('title', 'editor','excerpt','thumbnail', 'page-attributes'),
	  'taxonomies' => array('category', 'post_tag'),
  );

  register_taxonomy( 'category', [ 'products' ], [
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => [
			'name'              => 'Категории',
			'singular_name'     => 'Категория',
			'search_items'      => 'Найти категорию',
			'all_items'         => 'Все категории',
			'view_item '        => 'Показать категорию',
			'parent_item'       => 'Родительская категория',
			'parent_item_colon' => 'Родительская категория:',
			'edit_item'         => 'Редактировать категорию',
			'update_item'       => 'Обновить категорию',
			'add_new_item'      => 'Добавить новую категорию',
			'new_item_name'     => 'Название категории',
			'menu_name'         => 'Категории',
			'back_to_items'     => '← Вернуться к рубрике',
		],
		'description'           => '', // описание таксономии
		'public'                => true,
		'publicly_queryable'    => null, // равен аргументу public
		'show_in_nav_menus'     => true, // равен аргументу public
		'show_ui'               => true, // равен аргументу public
		'show_in_menu'          => true, // равен аргументу show_ui
		'show_tagcloud'         => true, // равен аргументу show_ui
		'show_in_quick_edit'    => null, // равен аргументу show_ui
		'hierarchical'          => true,
    'show_admin_column'     => true,

		'rewrite'               => true,
		//'query_var'             => $taxonomy, // название параметра запроса
		'capabilities'          => array(),
		'meta_box_cb'           => 'post_categories_meta_box', // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
		'show_admin_column'     => false, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
		'show_in_rest'          => true, // добавить в REST API
		'rest_base'             => null, // $taxonomy
		// '_builtin'              => false,
		//'update_count_callback' => '_update_post_term_count',
	] );

  register_post_type('products',$args);  
}



/* Регистрируем новый тип записей - Акции
-----------------------------------------------*/
add_action('init', 'actions');
function actions()
{
  $labels = array(
    'name' => 'Акции',
    'singular_name' => 'Акция',
    'add_new' => 'Добавить акцию',
    'add_new_item' => 'Добавить новую акцию',
    'edit_item' => 'Редактировать акцию',
    'new_item' => 'Новая Акция',
    'view_item' => 'Посмотреть Акции',
    'search_items' => 'Найти Акции',
    'not_found' =>  'Акций не найдено',
    'not_found_in_trash' => 'В корзине Акций не найдено',
    'parent_item_colon' => '',
    'menu_name' => 'Акции'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'menu_icon' => 'dashicons-megaphone',
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => true,
    'menu_position' => 5,
    'supports' => array('title','editor','thumbnail', 'custom-fields'),

  );
  register_post_type('actions',$args);  
}