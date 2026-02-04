<?php
    /*
        Template name: Страница контактов
    */
?>

<?php get_header() ?>
    <section class="basic-page">
	    <div class="container">
		    <div class="breadcrumbs">
        	    <?php $args = array(
				    'delimiter' => '<span>&nbsp;&nbsp;&#8250;&nbsp;&nbsp;</span>');
				    woocommerce_breadcrumb( $args ); 
			    ?>
            </div>

		    <h2><?php the_title() ?></h2>

            <div class="contacts__block flex justify-between align-stretch">
               <ul class="contacts__block__left">
                    <li class="contacts__block__left__item address">
                        <div class="contacts__left__inner flex align-center">
                            <?php
                                $contacts_left_icon_address = carbon_get_post_meta(get_the_ID(), 'crb_contact_item_img');
                            ?>
                            <div class="contacts__left__inner__img">
                            <img src="<?php  echo wp_get_attachment_image_url($contacts_left_icon_address); ?>" alt="">
                            </div>
                            <div class="contacts__left__content rich_text">
                                <?php if ($contacts_address = carbon_get_post_meta(get_the_ID(), 'crb_contact_address')){
                                    echo $contacts_address;
                                }
                                ?>
                            </div>
                        </div>
                    </li>

                    <li class="contacts__block__left__item phones">
                        <div class="contacts__left__inner flex align-center">
                            <?php
                                $contacts_left_icon_phone = carbon_get_post_meta(get_the_ID(), 'crb_contact_item_phones_img');
                            ?>
                            <div class="contacts__left__inner__img">
                                <img src="<?php  echo wp_get_attachment_image_url($contacts_left_icon_phone); ?>" alt="">
                            </div>
                            <div class="contacts__left__content rich_text">
                                <?php if ($contacts_phone = carbon_get_post_meta(get_the_ID(), 'crb_contact_item_phone')){
                                    echo $contacts_phone;
                                }
                                ?>
                            </div>

                        </div>
                    </li>

                    <li class="contacts__block__left__item working-hours">
                        <div class="contacts__left__inner flex justify-between align-center">
                            <?php
                                $contacts_left_icon_working = carbon_get_post_meta(get_the_ID(), 'crb_contact_item_working_img');
                            ?>
                                <div class="contacts__left__inner__img">
                                    <img src="<?php  echo wp_get_attachment_image_url($contacts_left_icon_working); ?>" alt="">
                                </div>

                            <div class="contacts__left__content rich_text">
                                <?php if ($contacts_working = carbon_get_post_meta(get_the_ID(), 'crb_contact_item_working')){
                                    echo $contacts_working;
                                }
                                ?>
                            </div>
                        </div>
                    </li>

                    <li class="contacts__block__left__item messengers">
                        <div class="contacts__left__inner flex justify-between align-center">
                            <?php 
                                if($contacts_list = carbon_get_post_meta(get_the_ID(), 'crb_contacts_messengers')){
                                ?>
                                    <ul class="contacts__left__list">
                                        <?php
                                        foreach ($contacts_list as $contacts_left_item){
                                            ?>
                                                <li class="contacts__left__list__item  flex align-center">
                                                    <?php
                                                        $thumb_contact_list = wp_get_attachment_image_url( $contacts_left_item ['crb_contact_item_working_img'], 'full' );
                                                    ?>
                                                    <div class="contacts__left__list__item__img">
                                                         <?php
                                                    if( $thumb_contact_list ){     
                                                        echo '<img src="' . $thumb_contact_list . '">';
                                                    }
                                                    ?>
                                                    </div>
                                                   
                                                    <div class="rich_text">
                                                        <?php echo $contacts_left_item[('crb_contact_item_working')]; ?>
                                                    </div>
                                                </li>
                                            <?php
                                        }

                                        ?>
                                    </ul>
                                <?php
                                }
                                ?>

                        </div>
                    </li>
                </ul>

               <div class="contacts__block__right">
                                <?php
                                if ($contacts_map = carbon_get_post_meta(get_the_ID(), 'crb_contact_map')){
                                    echo $contacts_map;
                                }
                                ?>

               </div>
            </div>
            
            <?php
                if ($driving_imgs = carbon_get_post_meta(get_the_ID(), 'crb_contacts_driving'))
            ?>
            <h3 class="title2">Схема проезда</h3>
            <div class="contacts__driving">
                <?php
                foreach ($driving_imgs as $driving_img){
                    ?>
                    <?php
                            $driving_scheme = wp_get_attachment_image_url($driving_img['crb_contacts_driving_img'], 'full');
                            ?>
                        <a data-fancybox="gallery" href="<?php echo $driving_scheme ?>" class="contacts__driving__item">
                            
                            <img  src="<?php echo $driving_scheme ?>" alt="">
                        </a>
                    <?php
                }

                ?>

            </div>

            

        </div>
    </section>

<?php get_footer() ?>