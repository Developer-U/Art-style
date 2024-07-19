<?php
/**
* Display Block Attention
* блок Преимущества (Почему стоит обратить внимание )
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$page_id = get_the_ID();

// Если это страница Подбор освещения - блок будет не сквозной, а индивидуальный
if( !is_page('podbor') ) {
    $get_title = get_field('attention_title', 'options');  
    $get_item = "attention"; 
    $output_param = 'options'; 
} else {
    $get_title = get_field('param_title', $page_id);  
    $get_item = "param"; 
    $output_param = $page_id; 
}
if( have_rows('new_' . $get_item . '_list_item', $output_param) ) {
?>

    <section class="attention 
        <?php if( !is_singular('products') && ( !is_page('podbor')) ){?>dark<?php } ?> 
        <?php if( is_singular('products')) {?>singular-product<?php } ?>
    "> 
        <?php     
        if($get_title ) {
        ?>

            <div class="container">
                <div class="head-stripes-wrap mb-long" >
                    <h2 class="head-stripes get-price__title">
                        <?php echo $get_title; ?>                        
                    </h2> 
                </div>               
            </div> 

        <?php } ?>

        <div class="container">
            <ul class="attention__list attention-block-list d-grid">
                <?php if( have_rows('new_' . $get_item . '_list_item', $output_param) ): ?>
                <?php while( have_rows('new_' . $get_item . '_list_item', $output_param) ): the_row();
                $attention_list_title = get_sub_field(' ' .$get_item . '_list_title', $output_param);     
                $attention_list_description = get_sub_field('' . $get_item . '_list_description', $output_param);                                                 
                ?>                   

                    <li class="advantages-block-list__item advantages-block-list__item_attention"
                        data-aos="fade-left"
                        data-aos-offset="50"
                        data-aos-delay="100"
                        data-aos-duration="1200"
                        data-aos-easing="ease-in-out"                           
                        data-aos-anchor-placement="bottom"
                    >
                        <h4 class="advantages-block-list__title">
                            <?php echo $attention_list_title; ?>
                        </h4>

                        <p class="advantages-block-list__description">
                            <?php echo $attention_list_description; ?>   
                        </p>
                    </li>

                <?php endwhile; ?>
                <?php endif; ?>
            </ul>
        </div>
    </section>

<?php } ?>