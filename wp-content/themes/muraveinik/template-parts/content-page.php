<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package muraveinik
 */
 ?>
 
	<section class="basic-page">
        <div class="container">
            <div class="breadcrumbs">
			<?php $args = array(
				'delimiter' => '<span>&nbsp;&nbsp;&#8250;&nbsp;&nbsp;</span>'
				);
				woocommerce_breadcrumb( $args ); 
			?>
            </div>
            <h1><?php wp_title(''); ?></h1>
            <div class="basic-page__body">

	<?php the_content(); ?>
	
			</div>
		</div>
	</section>
	




