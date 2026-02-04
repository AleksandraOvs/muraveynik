<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package muraveinik
 */
 ?>
 
        <div class="container">
            <div class="breadcrumbs">
			<?php $args = array(
				'delimiter' => '<span>&nbsp;&nbsp;&#8250;&nbsp;&nbsp;</span>'
				);
				woocommerce_breadcrumb( $args ); 
			?>
            </div>
            <h2><?php the_title() ?></h2>
            <div class="basic-page__body">

	<?php the_content(); ?>
	
			</div>
		</div>




