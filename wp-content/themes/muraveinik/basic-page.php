<?php
/*
Template Name: Базовая страница
*/
get_header();
?>

    <section class="basic-page">
        <div class="container">
            <div class="breadcrumbs <?php the_field('basic-page__breadcrumbs-option'); ?>">
			<?php $args = array(
				'delimiter' => '<span>&nbsp;&nbsp;&#8250;&nbsp;&nbsp;</span>'
				);
				woocommerce_breadcrumb( $args ); 
			?>
            </div>
            <h1><?php wp_title(''); ?></h1>
            <div class="basic-page__body">
                <div class="basic-page__image <?php the_field('basic-page__image-size'); ?>">
				<?php if( get_field('basic-page__image') ): ?>
					<img data-src="<?php the_field('basic-page__image'); ?>" alt=""/>
				<?php endif; ?>
				</div>
				
                <?php the_field('basic-page__text'); ?>
				
            </div>
        </div>
    </section>
	
<?php get_footer();