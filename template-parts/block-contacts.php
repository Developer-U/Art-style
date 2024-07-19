<?php
/**
* Display Block Contacts
*/
$page_id = get_the_ID();
$tel = get_field('tel-link', 'options');
$phone_num = get_field('tel', 'options');
$email = get_field('email', 'options');
$whatsapp = get_field('whatsapp', 'options');
$socials =  get_field('social_icons', 'options');
$requisites = get_field('requisites', $page_id);
$telegram_channel =  get_field('telegram_channel', 'options');
?>

    <section class="contacts">
        <div class="container">
            <div class="contacts__wrap contacts-wrap d-grid">
                <div class="contacts-wrap__item left contacts-item d-grid">

                    <?php if( have_rows('new_phone_block') ) { ?>

                        <div class="contacts-item__box">
                            <ul class="contacts-item__list first d-none d-md-grid align-items-center">
                                <li class="contacts-item__item"></li>
                                <li class="contacts-item__item label">Телефон:</li>
                                <li class="contacts-item__item label">Режим работы:</li>
                            </ul>

                            <?php if( have_rows('new_phone_block') ): ?>
                            <?php while( have_rows('new_phone_block') ): the_row();  
                            $phone_block_title = get_sub_field('phone_block_title');                    
                            $phone_block_phone = get_sub_field('phone_block_phone');     
                            $phone_block_phone_num = str_replace([' ', '(', ')', '-', '+7'], '',  $phone_block_phone); 
                            $phone_block_time = get_sub_field('phone_block_time');                                                  
                            ?>

                                <ul class="contacts-item__list d-grid align-items-center">    
                                    <?php if($phone_block_title) { ?>                    
                                        <li class="contacts-item__item name">
                                            <?php echo $phone_block_title; ?></li> 
                                    <?php } else { ?>  
                                        <li class="contacts-item__item"></li>
                                    <?php } ?>                                           
                                   

                                    <li class="contacts-item__item value">
                                        <a class="contacts-item__link" href="tel:+7<?php echo $phone_block_phone_num; ?>" >
                                            <?php echo $phone_block_phone; ?>
                                        </a></li>
                                    <li class="contacts-item__item value"><?php echo $phone_block_time; ?></li>                          
                                </ul>

                            <?php endwhile; ?>
                            <?php endif; ?>
                        </div>

                    <?php } 

                    if( $email ) { ?>
                        <ul class="contacts-item__list d-flex flex-column flex-sm-row align-items-sm-center">                         
                            <li class="contacts-item__item name e-mail">E-mail</li>                          
                            <li class="contacts-item__item value"><?php echo $email; ?></li>                                           
                        </ul>
                    <?php } 

                    if( $telegram_channel ) { ?>
                        <ul class="contacts-item__list d-flex flex-column flex-sm-row align-items-sm-center">                         
                            <li class="contacts-item__item name telegram">Канал в Telegram</li>                          
                            <li class="contacts-item__item value"><?php echo $telegram_channel; ?></li>                                           
                        </ul>
                    <?php } 

                    if( $socials['whatsapp'] ) { ?>
                        <ul class="contacts-item__list d-flex flex-column flex-sm-row align-items-sm-center">                         
                            <li class="contacts-item__item name whatsapp">WhatsApp:</li>                          
                            <li class="contacts-item__item value">
                                <a class="contacts-item__link" href="https://api.whatsapp.com/send?phone=<?php echo $socials['whatsapp']; ?>" target="_blank" class="social__link whatsapp">									
                                    +7&nbsp;<?php echo $socials['whatsapp']; ?>
                                </a>
                            </li>                                           
                        </ul>
                    <?php } ?>
                    
                    <ul class="contacts-item__list d-flex flex-column flex-sm-row align-items-sm-center">                         
                        <li class="contacts-item__item name none">Связаться с нами:</li>                          
                        <li class="contacts-item__item value">
                            <?php get_template_part('template-parts/social'); ?>
                        </li>                                           
                    </ul>
                </div>

                <div class="contacts-wrap__item right">
                    <h4 class="contacts-wrap__title">
                        Реквизиты:
                    </h4> 
                    
                    <div class="post">
                        <?php echo $requisites; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>