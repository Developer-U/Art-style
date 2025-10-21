<?php
/**
 * Block returned layout type of content in Gallery: Video or Photo
 * 
 */
?>

<ul class="allery-tab-target__list gallery-tab-list">

    <?php
    echo '<pre>';
    print_r($gallery_content_field);
    echo '</pre>';
    if( $gallery_content_field == 'photo' ) {

        if( have_rows('add_photo_block') ): ?>
        <?php $i = 1; while( have_rows('add_photo_block') ): the_row(); 
        $gallery_content = get_sub_field('gallery_photo_content'); 
        $index = $i++;            
        ?>

            <li class="gallery-tab-list__item gallery-tab-list__item_<?php if($index == 0 || ($index % 2) == 0 ) { ?>0<?php } else {?>1<?php } ?> d-grid">
                <figure class="gallery-tab-list__image small">
                    <img src="<?php echo $gallery_content['second']['url']; ?>" alt="<?php echo $gallery_content['second']['alt']; ?>">
                </figure>
                <figure class="gallery-tab-list__image large">                                    
                    <img src="<?php echo $gallery_content['first']['url']; ?>" alt="<?php echo $gallery_content['first']['alt']; ?>">
                </figure>
                <figure class="gallery-tab-list__image small">
                    <img src="<?php echo $gallery_content['third']['url']; ?>" alt="<?php echo $gallery_content['third']['alt']; ?>">
                </figure>
            </li>

        <?php endwhile; ?>
        <?php endif; ?>

    <?php } else {

        if( have_rows('add_video_block') ): ?>
        <?php $i = 1; while( have_rows('add_video_block') ): the_row(); 
        $gallery_content = get_sub_field('gallery_video_content'); 
        $index = $i++;            
        ?>

            <li class="gallery-tab-list__item gallery-tab-list__item_<?php if($index == 0 || ($index % 2) == 0 ) { ?>0<?php } else {?>1<?php } ?> d-grid">
                <div class="gallery-tab-list__image small">
                    <div class="youtube-player" data-id="<?php echo $gallery_content['second']; ?>"></div>
                </div>
                <div class="gallery-tab-list__image large">                                    
                    <div class="youtube-player" data-id="<?php echo $gallery_content['first']; ?>"></div>
                </div>
                <div class="gallery-tab-list__image small">                                    
                    <div class="youtube-player" data-id="<?php echo $gallery_content['third']; ?>"></div>
                </div>
            </li>

        <?php endwhile; ?>
        <?php endif; ?>

    <?php } ?>

</ul>