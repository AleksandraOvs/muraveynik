<?php get_header(); ?>

<section class="actions container" itemscope="" itemtype="https://schema.org/WebPage">
        <div class="breadcrumbs">
        <?php $args = array(
			'delimiter' => '<span>&nbsp;&nbsp;&#8250;&nbsp;&nbsp;</span>'
			);
			woocommerce_breadcrumb( $args ); 
		?>
        </div>
        <h1 itemprop="name"><?php wp_title(''); ?></h1>
        <div class="actions__items">
            <div class="actions__item">
			<?php 
			$link = get_field('actions__link-1');
			if( $link ): ?>
				<a href="<?php echo esc_url( $link ); ?>">
					<span class="actions__image">
					<?php if( get_field('actions__image-1') ): ?>
						<img data-src="<?php the_field('actions__image-1'); ?>" alt="" />
					<?php endif; ?>
					</span>
				</a>
			<?php endif; ?>
			<?php 
			$link = get_field('actions__link-1');
			if( $link ): ?>
				<a href="<?php echo esc_url( $link ); ?>">
					<h2><?php the_field('actions__title-1'); ?></h2>
				</a>
			<?php endif; ?>
			<p><?php the_field('actions__subtitle-1'); ?></p>
            </div>
            <div class="actions__item">
            <?php 
			$link = get_field('actions__link-2');
			if( $link ): ?>
				<a href="<?php echo esc_url( $link ); ?>">
					<span class="actions__image">
					<?php if( get_field('actions__image-2') ): ?>
						<img data-src="<?php the_field('actions__image-2'); ?>" alt="" />
					<?php endif; ?>
					</span>
				</a>
			<?php endif; ?>
			<?php 
			$link = get_field('actions__link-2');
			if( $link ): ?>
				<a href="<?php echo esc_url( $link ); ?>">
					<h2><?php the_field('actions__title-2'); ?></h2>
				</a>
			<?php endif; ?>
			<p><?php the_field('actions__subtitle-2'); ?></p>
            </div>
            <div class="actions__item">
            <?php 
			$link = get_field('actions__link-3');
			if( $link ): ?>
				<a href="<?php echo esc_url( $link ); ?>">
					<span class="actions__image">
					<?php if( get_field('actions__image-3') ): ?>
						<img data-src="<?php the_field('actions__image-3'); ?>" alt="" />
					<?php endif; ?>
					</span>
				</a>
			<?php endif; ?>
			<?php 
			$link = get_field('actions__link-3');
			if( $link ): ?>
				<a href="<?php echo esc_url( $link ); ?>">
					<h2><?php the_field('actions__title-3'); ?></h2>
				</a>
			<?php endif; ?>
			<p><?php the_field('actions__subtitle-3'); ?></p>
            </div>
            <div class="actions__item">
            <?php 
			$link = get_field('actions__link-4');
			if( $link ): ?>
				<a href="<?php echo esc_url( $link ); ?>">
					<span class="actions__image">
					<?php if( get_field('actions__image-4') ): ?>
						<img data-src="<?php the_field('actions__image-4'); ?>" alt=""/>
					<?php endif; ?>
					</span>
				</a>
			<?php endif; ?>
			<?php 
			$link = get_field('actions__link-4');
			if( $link ): ?>
				<a href="<?php echo esc_url( $link ); ?>">
					<h2><?php the_field('actions__title-4'); ?></h2>
				</a>
			<?php endif; ?>
			<p><?php the_field('actions__subtitle-4'); ?></p>
            </div>
        </div>
    </section>
	
<?php get_footer();