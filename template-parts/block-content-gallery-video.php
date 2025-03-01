<?php
/**
 * Block returned layout type of content in Gallery: Video
 * 
 */
?>

<ul class="allery-tab-target__list gallery-tab-list">
    <?php
    if (have_rows('add_video_block')): ?>
        <?php $i = 1;
        while (have_rows('add_video_block')):
            the_row();
            $gallery_content = get_sub_field('gallery_video_content');
            $index = $i++;
            ?>

            <li class="gallery-tab-list__item gallery-tab-list__item_1 gallery-tab-list__video">
                <?php if ($gallery_content['first']) { ?>
                    <div class="gallery-tab-list__image">
                        <iframe width="720" height="344" src="https://rutube.ru/play/embed/<?php echo $gallery_content['first']; ?>"
                            frameBorder="0" allow="clipboard-write; autoplay" webkitAllowFullScreen mozallowfullscreen
                            allowFullScreen>
                        </iframe>
                    </div>
                <?php }
                if ($gallery_content['second']) { ?>
                    <div class="gallery-tab-list__image">
                        <iframe width="720" height="344"
                            src="https://rutube.ru/play/embed/<?php echo $gallery_content['second']; ?>" frameBorder="0"
                            allow="clipboard-write; autoplay" webkitAllowFullScreen mozallowfullscreen allowFullScreen>
                        </iframe>
                    </div>
                <?php }
                if ($gallery_content['third']) { ?>
                    <div class="gallery-tab-list__image">
                        <iframe width="720" height="344" src="https://rutube.ru/play/embed/<?php echo $gallery_content['third']; ?>"
                            frameBorder="0" allow="clipboard-write; autoplay" webkitAllowFullScreen mozallowfullscreen
                            allowFullScreen>
                        </iframe>
                    </div>
                <?php } ?>
            </li>

        <?php endwhile; ?>
    <?php endif; ?>
</ul>