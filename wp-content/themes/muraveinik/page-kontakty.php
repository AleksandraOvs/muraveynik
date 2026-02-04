<?php get_header(); ?>

    <section class="contacts">
	<span style="display: none;" itemprop="name">Интернет-магазин "Муравейник"</span>
        <div class="container">
            <div class="breadcrumbs">
            <?php $args = array(
				'delimiter' => '<span>&nbsp;&nbsp;&#8250;&nbsp;&nbsp;</span>'
				);
				woocommerce_breadcrumb( $args ); 
			?>
            </div>
            <h1><?php wp_title(''); ?></h1>
            <div class="contacts__body">
                <div class="contacts__text">
                    <div class="contacts__text-item contacts__text-item--1" itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress"><i class="fa fa-map-marker fa-2x fa-fw" aria-hidden="true"></i><p itemprop="streetAddress"><?php the_field('contacts__address'); ?></p></div>
                    <div class="contacts__text-item"><i class="fa fa-bus fa-2x fa-fw" aria-hidden="true"></i><p><?php the_field('contacts__bus-station'); ?></p></div>
						<a  class="contacts__text-item" href="tel:<?php echo str_replace( ' ', '-', get_field( 'phone', 'option' )); ?>"><i class="fa fa-phone fa-2x fa-fw" aria-hidden="true"></i><p itemprop="telephone"><?php the_field( 'phone', 'option' ); ?></p></a>
						<a  class="contacts__text-item" href="mailto:<?php the_field( 'email', 'option' ); ?>"><i class="fa fa-envelope fa-2x fa-fw" aria-hidden="true"></i><p itemprop="email"><?php the_field( 'email', 'option' ); ?></p></a>
                    <div class="contacts__text-item"><i class="fa fa-clock-o fa-2x fa-fw" aria-hidden="true"></i><p><?php the_field('contacts__time'); ?></p></div>
                </div>
				
				<?php if(wp_is_mobile()): ?>
                <div class="contacts__map-mobile"><script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Ab2cb6e6816163f472bfb579a8573adea947e237d4f5568a4e251e389d8026de1&amp;width=100%25&amp;height=100%&amp;lang=ru_RU&amp;scroll=true"></script></div>
				<?php else: ?>
                <div class="contacts__map"><script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Ab2cb6e6816163f472bfb579a8573adea947e237d4f5568a4e251e389d8026de1&amp;width=100%25&amp;height=100%&amp;lang=ru_RU&amp;scroll=true"></script></div>
				<?php endif; ?>
            </div>
            <footer class="contacts__footer">
                <h2><?php the_field('contacts__footer-title'); ?></h2>
                <div class="contacts__footer-items">
                    <div class="contacts__footer-item">
						<a data-fancybox href="">
						<?php if( get_field('contacts__image-1') ): ?>
						<img src="<?php the_field('contacts__image-1'); ?>" alt="" />
						<?php endif; ?>
						</a>
					</div>
                    <div class="contacts__footer-item">
						<a data-fancybox href="">
						<?php if( get_field('contacts__image-2') ): ?>
						<img src="<?php the_field('contacts__image-2'); ?>" alt="" />
						<?php endif; ?>
						</a>
					</div>
                    <div class="contacts__footer-item">
						<a data-fancybox href="">
						<?php if( get_field('contacts__image-3') ): ?>
						<img src="<?php the_field('contacts__image-3'); ?>" alt="" />
						<?php endif; ?>
						</a>
					</div>
                </div>
            </footer>
        </div>
    </section>
	
<?php get_footer();