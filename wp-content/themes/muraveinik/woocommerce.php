<?php get_header(); 

	if(is_product() || is_cart()): woocommerce_content();
	else: ?>
	<section class="catalog">
        <div class="container">
            <div class="breadcrumbs">
			
            <?php $args = array(
				'delimiter' => '<span>&nbsp;&nbsp;&#8250;&nbsp;&nbsp;</span>'
				);
				woocommerce_breadcrumb( $args ); 
			?>
			
            </div>
			<h1><?php woocommerce_page_title(); ?></h1>
            <div class="catalog__body">
             
			<?php get_sidebar(); ?>
				
				<div class="catalog__content">
				<header class="catalog__header">
                        <div class="catalog__option">
                            <span>Сортировать по:</span>
                            <a href="?orderby=price">возрастанию цены</a>
                            <a href="?orderby=price-desc">убыванию цены</a>
							<div class="empty-block"></div>
                        </div>
                        <div class="catalog__filter-button"><i class="fa fa-filter fa-3x" aria-hidden="true"></i></div>
                        <div class="catalog__option">
                            <span>Показать товаров:</span>
                            <p>12</p>
                            <p>24</p>
                            <p>36</p>
                            <p>Все</p>
                            <select name="count-sort" id="count-sort">
                                <option value="12">12</option>
                                <option value="24">24</option>
                                <option value="36">36</option>
                                <option value="Все">Все</option>
                            </select>
                        </div>
                    </header>
                    <div class="catalog__items">
					
					<?php woocommerce_content(); ?>
					
					</div>
                </div>
            </div>
		</div>
	</section>
	
	<?php endif;
		
get_footer();
	
	