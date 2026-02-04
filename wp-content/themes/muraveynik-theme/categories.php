<?php
/*
    Template name: Каталог (категории)
*/
?>

<?php get_header()?>
    <section class="basic-page">
        <div class="container">
            <div class="breadcrumbs">
        	    <?php $args = array(
				    'delimiter' => '<span>&nbsp;&nbsp;&#8250;&nbsp;&nbsp;</span>');
				    woocommerce_breadcrumb( $args ); 
			    ?>
            </div>

            <h2><?php the_title(); ?></h2>
            
            <!-- <div class="categories__slider"> -->
                <!-- <div class="categories-slider__controls flex justify-between"> -->
	                <!-- <div class="categories-slider-prev">
		                <svg width="19" height="32" viewBox="0 0 19 32" fill="none" xmlns="http://www.w3.org/2000/svg">
			                <path d="M17 30L3 16L17 2" stroke="#23C229" stroke-width="3" stroke-linecap="round"/>
		                </svg>
	                </div>
	                <div class="categories-slider-next">
		                <svg width="19" height="32" viewBox="0 0 19 32" fill="none" xmlns="http://www.w3.org/2000/svg">
			                <path d="M2 30L16 16L2 2" stroke="#23C229" stroke-width="3" stroke-linecap="round"/>
		                </svg>
	                </div> -->
                <!-- </div> -->
            <ul class="catalog__list"> 
                
            <?php
                echo get_categories_product();
            ?>
            </ul> 
            <!-- </div> -->


        </div>
    </section>
<?php get_footer()?>