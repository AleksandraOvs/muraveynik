<?php get_header(); ?>

<section class="services" itemscope="" itemtype="https://schema.org/WebPage">
        <div class="container">
            <div class="breadcrumbs">
            <?php $args = array(
				'delimiter' => '<span>&nbsp;&nbsp;&#8250;&nbsp;&nbsp;</span>'
				);
				woocommerce_breadcrumb( $args ); 
			?>
            </div>
            <h1 itemprop="name"><?php wp_title(''); ?></h1>
            <div class="services__items">
                <div class="services__item">
                    <div class="services__image">
                    <?php if( get_field('services__image-1') ): ?>
						<img data-src="<?php the_field('services__image-1'); ?>" alt="" />
					<?php endif; ?>
                    </div>
                    <div class="services__lable">
					<?php 
					$link = get_field('services__link-1');
					if( $link ): ?>
						<a href="<?php echo esc_url( $link ); ?>"><?php the_field('services__title-1'); ?></a>
					<?php endif; ?>
					</div>
                </div>
                <div class="services__item">
                <div class="services__image">
                    <?php if( get_field('services__image-2') ): ?>
						<img data-src="<?php the_field('services__image-2'); ?>" alt="" />
					<?php endif; ?>
                    </div>
                    <div class="services__lable">
					<?php 
					$link = get_field('services__link-2');
					if( $link ): ?>
						<a href="<?php echo esc_url( $link ); ?>"><?php the_field('services__title-2'); ?></a>
					<?php endif; ?>
					</div>   
                </div>
                <div class="services__item">
                <div class="services__image">
                    <?php if( get_field('services__image-3') ): ?>
						<img data-src="<?php the_field('services__image-3'); ?>" alt="" />
					<?php endif; ?>
                    </div>
                    <div class="services__lable">
					<?php 
					$link = get_field('services__link-3');
					if( $link ): ?>
						<a href="<?php echo esc_url( $link ); ?>"><?php the_field('services__title-3'); ?></a>
					<?php endif; ?>
					</div>
                </div>
                <div class="services__item">
                <div class="services__image">
                    <?php if( get_field('services__image-4') ): ?>
						<img data-src="<?php the_field('services__image-4'); ?>" alt="" />
					<?php endif; ?>
                    </div>
                    <div class="services__lable">
					<?php 
					$link = get_field('services__link-4');
					if( $link ): ?>
						<a href="<?php echo esc_url( $link ); ?>"><?php the_field('services__title-4'); ?></a>
					<?php endif; ?>
					</div>
                </div>
            </div>
        </div>
    </section>
	
<?php get_footer();