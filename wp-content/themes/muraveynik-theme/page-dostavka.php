<?php
/*
	Template name:  Доставка и оплата
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

		<div class="delivery__banner flex align-center justify-between">
				<div class="delivery__banner__content">
					<h3 class="delivery__banner__content__heading">Доставка по Клину</h3>
					<div class="delivery__banner__content__text">
						от 800 рублей
					</div>
				</div>
		</div>

		<?php if ($tabs_items = carbon_get_post_meta(get_the_ID(), 'crb_delivery_items')){
        ?>
           
                    <ul id="accordion" class="accordion__list">
                        <?php 
                        foreach($tabs_items as $tab_item){
                            ?>
                            <li class="delivery-wrap element-animation">
                                <div class="delivery-wrap__head align-center justify-between">
                                <h4><?php echo $tab_item['crb_delivery_title'];?></h4>
                                <svg width="15" height="25" viewBox="0 0 15 25" fill="none" xmlns="http://www.w3.org/2000/svg">
<path id="Vector 3" d="M1.52002 23.5L13.52 12.5L1.52002 1.5" stroke="#23C229" stroke-width="2" stroke-linecap="round"/>
</svg>
                                </div>
                                <div>
                                <?php echo $tab_item['crb_delivery_content'];?>
                                </div>
                            </li> 
                            <?php
                        }
                        ?>
                   
            </div>    
        <?php
            }
        ?>


	</div>
</section>





<?php get_footer();
