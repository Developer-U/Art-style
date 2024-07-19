<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blocksy
 */

 

?><!doctype html>
<html <?php language_attributes(); ?><?php echo blocksy_html_attr() ?>>
<head>
	<?php do_action('blocksy:head:start') ?>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5, viewport-fit=cover">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Bellota+Text:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=Montserrat:wght@200;300;400;600&family=Poiret+One&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
	<?php do_action('blocksy:head:end') ?>
</head>

<?php
	ob_start();
	blocksy_output_header();
	$global_header = ob_get_clean();
?>

<body <?php body_class(); ?> <?php echo blocksy_body_attr() ?>>

<a class="skip-link show-on-focus" href="<?php echo apply_filters('blocksy:head:skip-to-content:href', '#main') ?>">
	<?php echo __('Skip to content', 'blocksy'); ?>
</a>

<?php
	if (function_exists('wp_body_open')) {
		wp_body_open();
	}
?>

<?php
$logo_color = get_field('logo_color', 'options');
$tel = get_field('tel-link', 'options');
$phone_num = get_field('tel', 'options');

?>

	<header class="header">
		<div class="ct-container">
			<div class="header__wrapper d-flex justify-content-between align-items-center">
				<a href="/" class="header__logo">
					<img src="<?php echo $logo_color['url']; ?>" alt="<?php echo $logo_color['alt']; ?>">
				</a>

				<div class="header__center header-center col">
					<!-- Здесь вставляем template-part -->
					<?php get_template_part('template-parts/nav', 'menu'); ?>
				</div>

				<?php
					if( $tel && $phone_num ): ?>			
					<a class="header__tel col-auto" href="tel:+7<?php echo $tel; ?>" >
						<?php echo $phone_num; ?>
					</a>		
				<?php endif; 
				?>				
			</div>
		</div>
	</header>
