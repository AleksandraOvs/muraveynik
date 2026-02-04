<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package muraveinik
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> itemscope itemtype="https://schema.org/Organization">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	
	<link rel="icon" href="https://muraveynik.su/wp-content/themes/muraveinik/assets/images/favicon.svg" sizes="32x32" />
	<link rel="icon" href="https://muraveynik.su/wp-content/themes/muraveinik/assets/images/favicon.svg" sizes="192x192" />
	<link rel="apple-touch-icon" href="https://muraveynik.su/wp-content/themes/muraveinik/assets/images/favicon.svg" />
	<meta name="msapplication-TileImage" content="https://muraveynik.su/wp-content/themes/muraveinik/assets/images/favicon.svg" />
	
<?php wp_head(); ?>
	
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
	<span style="display: none;" itemprop="url">https://muraveynik.su/</span>
	<header class="header">
        <div class="container header__container">
            <div class="header__wrapper">
                <div class="header__header">
                    <div class="header__item">
                        <div class="header__time-img"><img src="<?php echo get_template_directory_uri() ?>/assets/images/icon-open.png" alt=""></div>
                        <p>Пн-сб с 8.30 до 19.00, вс - выходной</p>
                    </div>
                    <div class="header__item">
                        <i class="fa fa-map-marker fa-3x fa-fw" aria-hidden="true"></i>
                        <p>г. Клин, ул. Терешковой, д. 48</p>
                    </div>
                    <div class="header__item">
                        <a href="tel:<?php echo str_replace( ' ', '-', get_field( 'phone', 'option' ) ); ?>">
                            <i class="fa fa-mobile fa-3x fa-fw" aria-hidden="true"></i>
                        </a>
                        <a href="tel:<?php echo str_replace( ' ', '-', get_field( 'phone', 'option' ) ); ?>"><?php the_field( 'phone', 'option' ); ?></a>
                    </div>
                    <div class="header__item">
                        <!-- Временно отключила ВК
                        <a href="#"><i class="fa fa-vk fa-2x" aria-hidden="true"></i></a>-->
                    </div>
                </div>

                    <div class="header__center">
				
				<?php if(is_front_page()): ?>
				
                    <div class="header__logo-img"><a><img src="<?php echo get_template_directory_uri() ?>/assets/images/logo-header.png" alt="" itemprop="logo"></a></div>
					
				<?php else: ?>
					
                    <div class="header__logo-img"><a href="/"><img src="<?php echo get_template_directory_uri() ?>/assets/images/logo-header.png" alt="" itemprop="logo"></a></div>
                    
				<?php endif; ?>
					
					<?php get_product_search_form(); ?>
                    <div class="header__cart"><a href="/korzina/"><img src="<?php echo get_template_directory_uri() ?>/assets/images/icon-cart.png" alt=""></a><div class="header__cart-counter"><?php echo WC()->cart->get_cart_contents_count(); ?></div></div>
                </div>
                <div class="header__footer">
                    <!--<div class="button header__button">Каталог</div>-->
                    <a href="https://muraveynik.su/product-category/metalloprokat/" class="button header__button">Каталог</a>
                    <nav>
                    <?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'container' => false,
							'menu_class' => 'header__menu',
						)
					);
					?>
                    </nav>
                    <div class="header__footer-logo"><img src="<?php echo get_template_directory_uri() ?>/assets/images/logo.png" alt=""></div>
                </div>
                
                <div class="header__header-mobile">
				
				<?php if(is_front_page()): ?>
				
                    <div class="header__header-mobile-logo"><a><img src="<?php echo get_template_directory_uri() ?>/assets/images/logo-header.png" alt=""></a></div>
				
				<?php else: ?>
				
                    <div class="header__header-mobile-logo"><a href="/"><img src="<?php echo get_template_directory_uri() ?>/assets/images/logo-header.png" alt=""></a></div>
					
				<?php endif; ?>
				
                    <div class="header__header-mobile-search" data-fancybox data-src="#modalSearch"><i class="fa fa-search fa-3x" aria-hidden="true"></i></div>
                    <div class="header__header-mobile-phone"><a href="tel:<?php echo str_replace( ' ', '-', get_field( 'phone', 'option' ) ); ?>"><i class="fa fa-mobile fa-3x" aria-hidden="true"></i></a></div>
                    <div class="header__header-mobile-map" data-fancybox data-src="#modalMap"><i class="fa fa-map-marker fa-3x" aria-hidden="true"></i></div>
                    <div class="header__header-mobile-cart"><a href="/korzina/"><img src="<?php echo get_template_directory_uri() ?>/assets/images/icon-cart-mobile.png" alt=""></a></div>
                    <div class="header__burger">
                        <div class="header__burger-item"></div>
                        <div class="header__burger-item"></div>
                        <div class="header__burger-item"></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
