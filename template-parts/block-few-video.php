<?php
/**
* Display Block width few video
* Блок отображает добавление любього количества видео + текст
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$page_id = get_the_ID();
$few_video_title = get_field('few_video_title', $page_id);
$few_video_text = get_field('few_video_text', $page_id);

if( have_rows('new_video_item', $page_id) ) { 
?>

    <section class="few_video <?php if(!is_page('about')) {?>dark<?php } ?>">
        <?php     
        if($few_video_title ) {
        ?>

            <div class="container">
                <div class="head-stripes-wrap" >
                    <h2 class="head-stripes get-price__title">
                        <?php echo $few_video_title; ?>                        
                    </h2> 
                </div>               
            </div>  

        <?php } ?>

        <div class="container">
           <?php            
            if( $few_video_text ) { ?>
                <div class="few_video__text post mb-long">                    
                    <?php echo $few_video_text; ?>                                    
                </div>
            <?php } ?>

            <ul class="few-video__wrap few-video-wrap d-grid align-items-center">
                <?php if( have_rows('new_video_item', $page_id) ): ?>
                <?php while( have_rows('new_video_item', $page_id) ): the_row();        
                $few_video_type = get_sub_field('few_video_type', $page_id);
                $few_video = get_sub_field('few_video', $page_id);
                $few_video_link = get_sub_field('few_video_link', $page_id);                                                 
                ?>

                    <li class="few-video-wrap__video"> 
                        <?php
                        if( $few_video_type == 'файл' && $few_video ) { ?>
                            <video controls class="few-video-wrap__file">
                                <source src="<?php echo esc_url( $few_video['url'] ); ?>" type="video/webm" />
                
                                <source src="<?php echo esc_url( $few_video['url'] ); ?>" type="video/mp4" />
                            </video>
                
                            <?php } else if( $few_video_type == 'ссылка' && $few_video_link ) { ?>
                                <div class="youtube-player" data-id="<?php echo $few_video_link; ?>"></div>
                        <?php } ?> 
                    </li>

                <?php endwhile; ?>
                <?php endif; ?>                
            </ul>

            <!-- CTA text social block -->
            <?php get_template_part('template-parts/fast', 'zakaz'); ?>
        </div>
    </section>

<?php } ?>