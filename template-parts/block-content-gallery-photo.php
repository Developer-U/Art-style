<?php
/**
 * Block returned layout type of content in Gallery: Photo
 * 
 */
?>

<ul class="allery-tab-target__list gallery-tab-list d-grid">
    <?php
    if( have_rows('add_photo_block') ): ?>
    <?php $i = 1; while( have_rows('add_photo_block') ): the_row(); 
    $gallery_content = get_sub_field('gallery_photo_content'); 
    $index = $i++;            
    ?>

        <li class="gallery-tab-list__item gallery-tab-list__item_1">
            <a href="<?php echo $gallery_content['second']['url']; ?>" class="gallery-tab-list__image small" data-fancybox="gallery_<?php echo $index; ?>">
                <img src="<?php echo $gallery_content['second']['url']; ?>" alt="<?php echo $gallery_content['second']['alt']; ?>">
            </a>
            <a href="<?php echo $gallery_content['first']['url']; ?>" class="gallery-tab-list__image large" data-fancybox="gallery_<?php echo $index; ?>">                                    
                <img src="<?php echo $gallery_content['first']['url']; ?>" alt="<?php echo $gallery_content['first']['alt']; ?>">
            </a>
            <a href="<?php echo $gallery_content['third']['url']; ?>" class="gallery-tab-list__image small" data-fancybox="gallery_<?php echo $index; ?>">
                <img src="<?php echo $gallery_content['third']['url']; ?>" alt="<?php echo $gallery_content['third']['alt']; ?>">
            </a>
        </li>

    <?php endwhile; ?>
    <?php endif; ?>
</ul>