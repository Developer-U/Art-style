<?php
/*
Template Name: Страница продукта
Template Post Type: products
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
$socials =  get_field('social_icons', 'options'); 

// Block Top
get_template_part('template-parts/top', 'pages');

if( $post_id == '64') { // Если это продукт с ID #64 то одна вёрстка
?>

	
	<!-- Slider & text block -->
	<section class="product-block best">
		<div class="container product-block__wrap product-block__wrap_best d-grid align-items-start">	
			<div class="product-block__image product-block__image_best" style="background-color: #ddd">
				<div class="swiper product-block__slider product-best-slider one_image_slider">
					<div class="swiper-wrapper">

						<?php if( have_rows('new_best_product_slider_image') ): ?>
						<?php while( have_rows('new_best_product_slider_image') ): the_row();                    
						$best_product_slider_image = get_sub_field('best_product_slider_image');                                                    
						?>

							<figure class="swiper-slide product-block-slider__slide">                 
								<img src="<?php echo $best_product_slider_image['url']; ?>" alt="<?php echo $best_product_slider_image['alt']; ?>">
							</figure>

						<?php endwhile; ?>
						<?php endif; ?>
					</div>  
					
					<div class="swiper-button-next slider-arrow-next"></div>
					<div class="swiper-button-prev slider-arrow-prev"></div>
				</div>
			</div>			

			<div class="product-block__text product-text-block product-text-block-best post">
				<?php the_content(); ?>
			</div>
		</div>		
	</section>
	<!-- Slider & text block end-->
	
	<!-- Gallery block -->
	<?php if( have_rows('add_block_galery_image' ) ) { 
	$block_galery_title = get_field('block_galery_title');
	?>

		<section class="galery-block dark">
			<div class="container">
				<?php     
				if($block_galery_title ) {
				?>				
					<div class="head-stripes-wrap" >
						<h2 class="head-stripes get-price__title">
							<?php echo $block_galery_title; ?>                        
						</h2> 
					</div>

				<?php } ?>

				<ul class="galery-block__list galery-list d-grid">
					<?php
					if( have_rows('add_block_galery_image' ) ) {
					while( have_rows('add_block_galery_image' ) ) {
					the_row();
					$block_galery_image = get_sub_field( 'block_galery_image');				
					?>

						<li class="galery-list__item">
							<a class="galery-list__link" href="<?php echo $block_galery_image['url']; ?>" data-fancybox="tab_gallery">
								<span></span>
								<img src="<?php echo $block_galery_image['url']; ?>" alt="<?php echo $block_galery_image['alt']; ?>"/>
							</a>
						</li>

					<?php }
					}
					?>
				</ul>
			</div>		
		</section>

	<?php } ?>

	<!-- Gallery block end -->						

<?php } else { // Во всех остальных случаях другая вёрстка ?>

	<section class="single">
		<div class="container">    
			<div class="single-text post">
				<?php the_content(); ?>
			</div>
		</div> 
	</section>   

	<?php if( have_rows('new_product_block') ): ?>
	<?php $i = 0; while( have_rows('new_product_block') ): the_row();  
	$product_block_image = get_sub_field('product_block_image');
	$product_block_title = get_sub_field('product_block_title');  
	$product_block_text = get_sub_field('product_block_text');
	$index = $i++; // Создаём счётчик
	?>

		<section class="product-block <?php if( $index == 0 || ($index % 2) == 0 ) {?>dark<?php } ?>"
			
		>
			<div class="container product-block__wrap d-grid">
				<?php
				if( $product_block_type  == 'фото') { ?>

					<figure class="product-block__image">
						<img src="<?php echo $product_block_image['url']; ?>" alt="<?php echo $product_block_image['alt']; ?>">				
					</figure>

				<?php } elseif( $product_block_type  == 'карусель') { ?>

					<div class="product-block__image">
						<div class="swiper product-block__slider product-block-slider one_image_slider">
							<div class="swiper-wrapper">

								<?php if( have_rows('new_product_slider_image') ): ?>
								<?php while( have_rows('new_product_slider_image') ): the_row();                    
								$product_slider_image = get_sub_field('product_slider_image');                                                    
								?>

									<figure class="swiper-slide product-block-slider__slide">                 
										<img src="<?php echo $product_slider_image['url']; ?>" alt="<?php echo $product_slider_image['alt']; ?>">
									</figure>

								<?php endwhile; ?>
								<?php endif; ?>
							</div>  
							
							<div class="swiper-button-next slider-arrow-next"></div>
							<div class="swiper-button-prev slider-arrow-prev"></div>
						</div>
					</div>

				<?php } ?>

				<div class="product-block__text product-text-block">
					<h3 class="product-text-block__title mb-long">
						<?php echo $product_block_title; ?>
					</h3>

					<div class="product-text-block__text post">
						<?php echo $product_block_text; ?>

						<?php
						if( $socials['whatsapp']) { ?>

							<a href="https://api.whatsapp.com/send?phone=<?php echo $socials['whatsapp']; ?>" target="_blank" class="button red-btn mt-2">	
								заказать								
                			</a>

						<?php } ?>
					</div>
				</div>

				

			</div>		
		</section>

	<?php endwhile; ?>
	<?php endif; 

}

get_template_part('template-parts/block', 'attention');

get_template_part('template-parts/block', 'get-price');

get_footer();