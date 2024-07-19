<?php
/**
 * Block returned layout type of content in Gallery: Video
 * 
 */
?>

<ul class="allery-tab-target__list gallery-tab-list">
    <?php  
    if( have_rows('add_video_block') ): ?>
    <?php $i = 1; while( have_rows('add_video_block') ): the_row(); 
    $gallery_content = get_sub_field('gallery_video_content'); 
    $index = $i++;            
    ?>

        <li class="gallery-tab-list__item gallery-tab-list__item_1 gallery-tab-list__video">
            <div class="gallery-tab-list__image">
                <div class="youtube-player" data-id="<?php echo $gallery_content['second']; ?>"></div>
            </div>
            <div class="gallery-tab-list__image">                                    
                <div class="youtube-player" data-id="<?php echo $gallery_content['first']; ?>"></div>
            </div>
            <div class="gallery-tab-list__image">                                    
                <div class="youtube-player" data-id="<?php echo $gallery_content['third']; ?>"></div>
            </div>
        </li>

    <?php endwhile; ?>
    <?php endif; ?>
</ul>