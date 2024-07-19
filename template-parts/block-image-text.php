<?php
/**
 * Template part for displaying Block Image and Text
 * Блок Картинка-текст
 */
$page_id = get_the_ID();
$image_text_block_image = get_field('image_text_block_image', $page_id);
$image_text_block_text = get_field('image_text_block_text', $page_id);

if( $image_text_block_text ) {
?>

    <section class="image-text-block">
        <div class="container">
            <div class="product-block__wrap product-block__wrap_imgtext d-grid">
                <figure class="product-block__image product-block__image_best" style="background-color: #ddd"
      
                >
                    <img src="<?php echo $image_text_block_image['url']; ?>" alt="<?php echo $image_text_block_image['alt']; ?>">				
                </figure>

                <div class="image-text-block_text product-text-block post"
       
                >					
                    <?php echo $image_text_block_text; ?>					
				</div>
            </div>
        </div>		
    </section>

<?php } ?>