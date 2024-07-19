<?php
/**
 * Template part for displaying Block List of items by picture
 * Блок картинки с надписями
 */
$page_id = get_the_ID();
$image_items_title = get_field('image_items_title', $page_id);

if( have_rows('new_image_items_list_item') ) {
?>

    <section class="image-items dark">
        <div class="container">
            <?php     
            if($image_items_title ) {
            ?>
                <div class="head-stripes-wrap mb-long" >
                    <h2 class="head-stripes get-price__title">
                        <?php echo $image_items_title; ?>                        
                    </h2> 
                </div>   
            <?php } ?>      
            
            <ul class="image-items__list image-items-list d-grid">
                <?php if( have_rows('new_image_items_list_item') ): ?>
                <?php $i = 0; while( have_rows('new_image_items_list_item') ): the_row();
                $image_items_list_item_title = get_sub_field('image_items_list_item_title');     
                $image_items_list_item_image = get_sub_field('image_items_list_item_image');    
                $image_items_list_item_icon = get_sub_field('image_items_list_item_icon');  
                $index = $i++;                                            
                ?>

                        <li class="image-items-list__item actions-item image-items-item" style="
                            <?php if( $image_items_list_item_image) { ?>
                                background-image: url('<?php echo $image_items_list_item_image['url']; ?> ')
                            <?php } else { ?>
                                background-color: #272324
                            <?php } ?>
                        "
                            data-aos="fade-up"
                            data-aos-offset="100"
                            data-aos-delay="50"
                            data-aos-duration="1200"
                            data-aos-easing="ease-in-out"
                            data-aos-mirror="true"                       
                            data-aos-anchor-placement="bottom"
                        >                       

                            <span class="grey-gradient"></span>

                            <div class="image-items-item__wrap">
                                <?php if($image_items_list_item_icon) { ?>
                                    <img src="<?php echo $image_items_list_item_icon['url']; ?>" alt="<?php echo $image_items_list_item_icon['alt']; ?>">
                                <?php } ?>

                                <h2 class="image-items-list__title">
                                    <?php echo $image_items_list_item_title; ?>
                                </h2>      
                            </div>              
                        </li>

                <?php endwhile; ?>
                <?php endif; ?>
            </ul>
        </div>  
    </section>
        
<?php } ?> 