<?php
/**
* Display Block Advantages
* блок Преимущества (Почему мы? )
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$page_id = get_the_ID();
$advantages_title = get_field('advantages_title', $page_id);
if( have_rows('new_advantages_list_item') ) {
?>

    <section class="advantages">
        <?php     
        if($advantages_title ) {
        ?>

            <div class="container">
                <div class="head-stripes-wrap mb-long" >
                    <h2 class="head-stripes get-price__title">
                        <?php echo $advantages_title; ?>                        
                    </h2> 
                </div>               
            </div>  

        <?php } ?>

        <div class="container">  
            <ul class="advantages__list advantages-block-list d-grid">
                <?php if( have_rows('new_advantages_list_item') ): ?>
                <?php $i = 0; while( have_rows('new_advantages_list_item') ): the_row();
                $advantages_list_title = get_sub_field('advantages_list_title');     
                $advantages_list_description = get_sub_field('advantages_list_description');    
                $index = $i++;                                             
                ?>

                    <li class="advantages-block-list__item"
                     
                    >
                        <h4 class="advantages-block-list__title">
                            <?php echo $advantages_list_title; ?>
                        </h4>

                        <p class="advantages-block-list__description">
                            <?php echo $advantages_list_description; ?>   
                        </p>
                    </li>

                <?php endwhile; ?>
                <?php endif; ?>
            </ul>
        </div>
    </section>

<?php } ?>
