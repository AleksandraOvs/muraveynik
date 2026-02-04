<?php
/*
	Template name:  О компании
*/
?>

<?php
get_header('frontpage');
?>

<section class="basic-page">
	<div class="container">
		<div class="breadcrumbs">
        	<?php $args = array(
				'delimiter' => '<span>&nbsp;&nbsp;&#8250;&nbsp;&nbsp;</span>');
				woocommerce_breadcrumb( $args ); 
			?>
        </div>
		<h2><?php the_title() ?></h2>

		

		<?php if ($about_items = carbon_get_post_meta(get_the_ID(), 'crb_about_items')){
        ?>
           
                    <ul id="about-company" class="about-list">
                        <?php 
                        foreach($about_items as $about_item){
                            ?>
                            <li class="about-list__item element-animation">
                                <div class="about-list__content">
                                    <h2 class="about-list__item__heading"><?php echo $about_item['crb_about_title'];?></h2> 
                                    <p><?php echo $about_item['crb_about_content'];?></p>
                                </div>
                                <div class="about-list__image">
                                    <?php
                                        $about_photo = wp_get_attachment_image_url( $about_item['crb_about_img'], 'full' );
                                        if( $about_photo ){     
                                            echo '<img src="' . $about_photo . '" alt="О компании Муравейник">';
                                        } else {
                                            echo '<img src="' . get_stylesheet_directory_uri() . '/images/placeholder.png" alt="О компании Муравейник">';
                                        }
                                    ?>
                                </div>
                                
                            </li> 
                            <?php
                        }
                        ?>
                    </ul>    
        <?php
            }
        ?>
        <?php if ($adv_items = carbon_get_post_meta(get_the_ID(), 'crb_adv_items')){
                ?>
        <div class="about-adv element-animation">
            <h4 class="about-adv__heading">Наши преимущества</h4>
            
                <ul class="about-adv__list">
                    <?php 
                        foreach ($adv_items as $adv_item){
                        ?>
                            <li class="about-adv__list__item flex align-center">
                                <?php
                                    $adv_icon = wp_get_attachment_image_url( $adv_item['crb_adv_img'], 'full' );
                                        if( $adv_icon ){     
                                            echo '<img src="' . $adv_icon . '" alt="Преимущества компании">';
                                        } else {
                                            echo '<img src="' . get_stylesheet_directory_uri() . '/images/placeholder.png" alt="Компания Муравейник">';
                                        }
                                ?>

                                <div class="about-adv__list__item__p">
                                    <?php echo $adv_item['crb_adv_item']?>
                                </div>

                            </li>
                        <?php
                        }
                    ?>
                </ul>
            
            </ul>

            <div class="about-adv__img">
                <img src="<?php echo get_stylesheet_directory_uri() . '/images/about04.png' ?>" alt="Преимущества компании">
            </div>
        </div>
        <?php
                }
            ?>
        <div class="page-content">
            <?php the_content(); ?>
        </div>
	</div>
</section>





<?php get_footer();
