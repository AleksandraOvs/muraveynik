<?php get_header(); ?>	
	
	<div class="buyers">
        <div class="container">
            <div class="breadcrumbs">
            <?php $args = array(
				'delimiter' => '<span>&nbsp;&nbsp;&#8250;&nbsp;&nbsp;</span>'
				);
				woocommerce_breadcrumb( $args ); 
			?>
            </div>
            <div class="buyers__items">
                <!--<div class="buyers__item">
				<?php 
				$link = get_field('buyers__link-1');
				if( $link ): ?>
				<a href="<?php echo esc_url( $link ); ?>">
					<?php if( get_field('buyers__image-1') ): ?>
						<img data-src="<?php the_field('buyers__image-1'); ?>" alt=""/>
					<?php endif; ?>
				</a>
				<?php endif; ?>
				</div>-->
				
				<div class="buyers__item">
				<?php 
				$link = get_field('buyers__link-4');
				if( $link ): ?>
				<a href="<?php echo esc_url( $link ); ?>">
					<?php if( get_field('buyers__image-4') ): ?>
						<img data-src="<?php the_field('buyers__image-4'); ?>" alt=""/>
					<?php endif; ?>
				</a>
				<?php endif; ?>
				</div>
                
                <div class="buyers__item">
				<?php 
				$link = get_field('buyers__link-3');
				if( $link ): ?>
				<a href="<?php echo esc_url( $link ); ?>">
					<?php if( get_field('buyers__image-3') ): ?>
						<img data-src="<?php the_field('buyers__image-3'); ?>" alt=""/>
					<?php endif; ?>
				</a>
				<?php endif; ?>
				</div>
				
				<div class="buyers__item">
				<?php 
				$link = get_field('buyers__link-2');
				if( $link ): ?>
				<a href="<?php echo esc_url( $link ); ?>">
					<?php if( get_field('buyers__image-2') ): ?>
						<img data-src="<?php the_field('buyers__image-2'); ?>" alt=""/>
					<?php endif; ?>
				</a>
				<?php endif; ?>
				</div>
            </div>
        </div>
    </div>
	
<?php get_footer();