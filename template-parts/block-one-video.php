<?php
/**
* Display Block width one video
* Блок отображает одно видео + текст
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$page_id = get_the_ID();
$one_video_title = get_field('one_video_title', $page_id);
$one_video_text = get_field('one_video_text', $page_id);

$one_video_type = get_field('one_video_type', $page_id);
$one_video = get_field('one_video', $page_id);
$one_video_link = get_field('one_video_link', $page_id);

if($one_video || $one_video_link ) { 
?>

    <section class="dark one-video">
        <div class="container">
            <div class="head-stripes-wrap" >
                <h2 class="head-stripes get-price__title">
                    <?php echo
                    $actions_block_title ? $actions_block_title : 'Видео о нас';
                    ?>                     
                </h2> 
            </div>               
        </div>

        <div class="container">
            <div class="one-video__wrap one-video-wrap d-grid align-items-center">
                <div class="one-video-wrap__video"> 
                    <?php
                    if( $one_video_type == 'файл' && $one_video ) { ?>
                        <video controls class="one-video-wrap__file">
                            <source src="<?php echo esc_url( $one_video['url'] ); ?>" type="video/webm" />
            
                            <source src="<?php echo esc_url( $one_video['url'] ); ?>" type="video/mp4" />
                        </video>
            
                        <?php } else if( $one_video_type == 'ссылка' && $one_video_link ) { ?>
                            <div class="youtube-player" data-id="<?php echo $one_video_link; ?>"></div>
                    <?php } ?> 
                </div>

                <div class="one-video__text actions-item__title">
                    <p>
                        <?php echo $one_video_text; ?>
                    </p>                   
                </div>
            </div>
        </div>
    </section>

<?php } ?>