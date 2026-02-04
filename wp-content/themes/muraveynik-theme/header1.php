<!DOCTYPE html>
<html <?php language_attributes(); ?> itemscope itemtype="https://schema.org/Organization">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<meta name="msapplication-TileImage" content="https://muraveynik.su/wp-content/themes/muraveinik/assets/images/favicon.svg" />
	
<?php wp_head(); ?>
	
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="show-temp"><?php echo get_current_template(); ?></div>
<span style="display: none;" itemprop="url">https://muraveynik.su/</span>
    
	<?php if (is_front_page()) :
	echo '<div class="main-page__decor element-animation3"></div>';
	endif; ?>

	<header class="header header-front">
        <div class="header-front__top">
            <div class="container  flex align-center justify-between">
                <div class="header-front__top__working__address">
                    <div class="header-front__top__working flex align-between">
                        <?php
          			    if ($working_icon= carbon_get_theme_option('crb_working_icon')){
            			        echo '<img class="header__work-icon" width="21" height="20" src="'.wp_get_attachment_image_url($working_icon).'" alt="" >';
          			        } 
          			    ?>  
					    <?php
					        if ($working_info= carbon_get_theme_option('crb_working')){
						        echo '<p class="header__work-info">' . $working_info . '</p>';
					        }
					    ?>
                    </div><!-- ./end of header__inner__working -->

                    <div class="header-front__top__address flex align-between">
                        <?php
          			        if ($address_icon= carbon_get_theme_option('crb_address_icon')){
            			        echo '<img class="header__address-icon" width="21" height="20" src="'.wp_get_attachment_image_url($address_icon).'" alt="" >';
          			        } 
          			    ?>
					    <?php
					        if ($address= carbon_get_theme_option('crb_address')){
						        echo '<p class="header__address">' . $address . '</p>';
					        }
					    ?>
                    </div> <!-- ./end of header__inner__address -->
                </div> <!-- ./end of header__inner__working__address -->

                <div class="header-front__top__contacts flex align-center justify-end">

                    <div class="header-front__top__phone">
                        <?php
                            if ($phone_link= carbon_get_theme_option('tel_contact_link') && $phone_link_vis= carbon_get_theme_option('tel_contact') ){
                        ?>
                        <a class="header__phone-link flex align-center" href="tel:<?php echo $phone_link; ?>">
                            <?php
                                if ($phone_link_icon= carbon_get_theme_option('tel_contact_link_icon')){
                                echo '<img class="header__phone-link__img" width="25" height="25" src="'.wp_get_attachment_image_url($phone_link_icon).'" alt="" >';
                                } 
                            ?>
                        <span class="link-span"><?php echo $phone_link_vis; ?></span></a>
                        <?php
                        }
                        ?>
                    </div><!-- ./end of header-front__top__phone -->

                    <?php 
					    if( $contacts = carbon_get_theme_option('contacts' ) ) {
    			    ?>
   				        <ul class="header-front__top__messengers">
        		            <?php
					            foreach( $contacts as $contact ) {
    			            ?>
     				        <li class="social__item">
    					        <a href="<?php echo $contact[ 'contact_link']; ?>" class="social__link">
  				                    <?php
    				                    $thumb_contact = wp_get_attachment_image_url( $contact                                  ['contact_image'], 'full' );
				                    ?>		
					                <img class="social__img" width="25" height="25" src="<?php echo $thumb_contact; ?>" alt="<?php echo $contact[ 'contact_name']; ?>">
  						        </a>
    				        </li>
				            <?php
					            }
    			            ?>
    			        </ul>
    			    <?php
					    }
				    ?>
                  

                </div>
            </div><!-- ./end of container -->
        </div><!-- ./end of header-front__top -->
        
        <div class="header-front__bottom"
		<?php if (!is_front_page()){
			echo 'style="background: #ededed;"';
		}?>
		>
            <div class="container">
                <div class="header-front__bottom__inner flex align-center">
                    <a href="/" class=" logo">
  					    <?php
  						    $header_logo = get_theme_mod('header_logo');
  						    $img = wp_get_attachment_image_src($header_logo, 'full');
  						    if ($img) : echo '<img src="' . $img[0] . '" alt="">';
  						    endif;
                        ?>
				    </a>
					
					<div class="header-front__bottom__inner__mob">
						
					<div class="mob__contacts">
					<?php
                          if (carbon_get_theme_option('tel_contact_link') && carbon_get_theme_option('tel_contact_link_icon') ){ ?>

                        <a class="mob__contacts__link" href="tel:<?php echo carbon_get_theme_option('tel_contact_link') ?>">
                            <?php
                                echo '<img class="mob__contacts__link__img" width="25" height="25" src="'.wp_get_attachment_image_url(carbon_get_theme_option('tel_contact_link_icon')).'" alt="" >';
                                } 
                            ?>
                        </a>
                        <?php
                        //}
                        ?>

							<a class="mob__cart" href="<?php echo site_url()?>/cart/">
								<svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
						    		<path id="Vector" d="M8.75553 24.1213C7.15555 24.1213 5.84646 25.4304 5.84646 27.0304C5.84646 28.6304 7.15555 29.9395 8.75553 29.9395C10.3555 29.9395 11.6646 28.6304 11.6646 27.0304C11.6646 25.4304 10.3555 24.1213 8.75553 24.1213ZM0.0283203 0.848755V3.75783H2.93739L8.17372 14.8123L6.13737 18.3032C5.99192 18.7395 5.84646 19.3214 5.84646 19.7577C5.84646 21.3577 7.15555 22.6668 8.75553 22.6668H26.21V19.7577H9.33735C9.1919 19.7577 9.04644 19.6123 9.04644 19.4668V19.3213L10.3555 16.8486H21.1191C22.2827 16.8486 23.1554 16.2668 23.5918 15.3941L28.8281 5.93963C29.119 5.64872 29.119 5.50327 29.119 5.21236C29.119 4.33964 28.5372 3.75783 27.6645 3.75783H6.13737L4.82829 0.848755H0.0283203ZM23.3009 24.1213C21.7009 24.1213 20.3918 25.4304 20.3918 27.0304C20.3918 28.6304 21.7009 29.9395 23.3009 29.9395C24.9009 29.9395 26.21 28.6304 26.21 27.0304C26.21 25.4304 24.9009 24.1213 23.3009 24.1213Z" fill="#23C229"/>
								</svg>
								<span class="header__cart__count"><span><?php echo WC()->cart->get_cart_contents_count(); ?><span>
							</a>
					</div>
					<button id="burger" class="burger"></button>
					</div>
					<div class="header-front__bottom__inner-block flex align-center justify-between">
				
						<div class="header__catalog">
                        	<button class="header__catalog__link">Каталог</button>
						    	<?php
							    wp_nav_menu(
								    array(
									    'theme_location' => 'menu-catalog',
									    'container' => false,
									    'menu_class' => 'catalog__menu',
									    'walker'          => new My_Walker_Nav_Menu(),
									    'depth'           => 5,
								    )
							    );
						    	?>
				   		 </div><!-- ./end of header__catalog -->
							<a class="header__cart" href="<?php echo site_url()?>/cart/">
								<svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
						    		<path id="Vector" d="M8.75553 24.1213C7.15555 24.1213 5.84646 25.4304 5.84646 27.0304C5.84646 28.6304 7.15555 29.9395 8.75553 29.9395C10.3555 29.9395 11.6646 28.6304 11.6646 27.0304C11.6646 25.4304 10.3555 24.1213 8.75553 24.1213ZM0.0283203 0.848755V3.75783H2.93739L8.17372 14.8123L6.13737 18.3032C5.99192 18.7395 5.84646 19.3214 5.84646 19.7577C5.84646 21.3577 7.15555 22.6668 8.75553 22.6668H26.21V19.7577H9.33735C9.1919 19.7577 9.04644 19.6123 9.04644 19.4668V19.3213L10.3555 16.8486H21.1191C22.2827 16.8486 23.1554 16.2668 23.5918 15.3941L28.8281 5.93963C29.119 5.64872 29.119 5.50327 29.119 5.21236C29.119 4.33964 28.5372 3.75783 27.6645 3.75783H6.13737L4.82829 0.848755H0.0283203ZM23.3009 24.1213C21.7009 24.1213 20.3918 25.4304 20.3918 27.0304C20.3918 28.6304 21.7009 29.9395 23.3009 29.9395C24.9009 29.9395 26.21 28.6304 26.21 27.0304C26.21 25.4304 24.9009 24.1213 23.3009 24.1213Z" fill="#23C229"/>
								</svg>
								<span class="header__cart__count"><span><?php echo WC()->cart->get_cart_contents_count(); ?><span>
							</a>
						<div class="header__actions flex align-center">
							<button class="header__search-btn" type="button">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						    		<g id="&#208;&#159;&#208;&#190;&#208;&#184;&#209;&#129;&#208;&#186;">
						        		<path id="&#208;&#159;&#208;&#190;&#208;&#184;&#209;&#129;&#208;&#186;_2" d="M17.6125 15.4914C18.7935 13.8786 19.4999 11.8976 19.4999 9.75004C19.4999 4.37405 15.1259 0 9.74993 0C4.37398 0 0 4.37405 0 9.75004C0 15.126 4.37403 19.5001 9.74998 19.5001C11.8975 19.5001 13.8787 18.7936 15.4915 17.6125L21.8789 24L24 21.8789L17.6125 15.4914ZM9.74998 16.5C6.02782 16.5 3.00001 13.4722 3.00001 9.75004C3.00001 6.02785 6.02782 3.00003 9.74998 3.00003C13.4721 3.00003 16.5 6.02785 16.5 9.75004C16.5 13.4722 13.4721 16.5 9.74998 16.5Z" fill="#23C229"/>
						    		</g>
								</svg>
                    		</button>

							<div class="header__actions__search">
                        		<?php if ( is_active_sidebar( 'sidebar-search-header' ) ){ ?>
		               	    		<?php dynamic_sidebar( 'sidebar-search-header' ); ?>
									<?php //get_search_form(); ?>
                        		<?php } ?>
                            	<!-- <button class="search__close" type="button">
                                	<span class="sr-only">Закрыть поиск</span>
                        		</button> -->
                       			<div class="search__list__wrapper" >
									<ul id="result"></ul>
									
								</div>
                    	</div>
						</div>
				
					<div class="header-st__burger">
                        <span></span>
                    </div>	

                    <?php
					    wp_nav_menu(
						    array(
							       'theme_location' => 'menu-1',
							    'container' => false,
							    'menu_class' => 'header-st__menu',
						    )
					    );
				    ?>

                 
					</div>
                    
                    
                    
                </div>

            </div><!-- ./end of container -->
        </div>
        
    </header>
	
	<?php
	if (is_front_page()) {
		echo '<main class="grey-bg main-front">';
	} else {
		echo '<main>';
	}
<!DOCTYPE html>
<html <?php language_attributes(); ?> itemscope itemtype="https://schema.org/Organization">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<meta name="msapplication-TileImage" content="https://muraveynik.su/wp-content/themes/muraveinik/assets/images/favicon.svg" />
	
<?php wp_head(); ?>
	
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="show-temp"><?php echo get_current_template(); ?></div>
<span style="display: none;" itemprop="url">https://muraveynik.su/</span>
    
	<?php if (is_front_page()) :
	echo '<div class="main-page__decor element-animation3"></div>';
	endif; ?>

	<header class="header header-front">
        <div class="header-front__top">
            <div class="container  flex align-center justify-between">
                <div class="header-front__top__working__address">
                    <div class="header-front__top__working flex align-between">
                        <?php
          			    if ($working_icon= carbon_get_theme_option('crb_working_icon')){
            			        echo '<img class="header__work-icon" width="21" height="20" src="'.wp_get_attachment_image_url($working_icon).'" alt="" >';
          			        } 
          			    ?>  
					    <?php
					        if ($working_info= carbon_get_theme_option('crb_working')){
						        echo '<p class="header__work-info">' . $working_info . '</p>';
					        }
					    ?>
                    </div><!-- ./end of header__inner__working -->

                    <div class="header-front__top__address flex align-between">
                        <?php
          			        if ($address_icon= carbon_get_theme_option('crb_address_icon')){
            			        echo '<img class="header__address-icon" width="21" height="20" src="'.wp_get_attachment_image_url($address_icon).'" alt="" >';
          			        } 
          			    ?>
					    <?php
					        if ($address= carbon_get_theme_option('crb_address')){
						        echo '<p class="header__address">' . $address . '</p>';
					        }
					    ?>
                    </div> <!-- ./end of header__inner__address -->
                </div> <!-- ./end of header__inner__working__address -->

                <div class="header-front__top__contacts flex align-center justify-end">

                    <div class="header-front__top__phone">
                        <?php
                            if ($phone_link= carbon_get_theme_option('tel_contact_link') && $phone_link_vis= carbon_get_theme_option('tel_contact') ){
                        ?>
                        <a class="header__phone-link flex align-center" href="tel:<?php echo $phone_link; ?>">
                            <?php
                                if ($phone_link_icon= carbon_get_theme_option('tel_contact_link_icon')){
                                echo '<img class="header__phone-link__img" width="25" height="25" src="'.wp_get_attachment_image_url($phone_link_icon).'" alt="" >';
                                } 
                            ?>
                        <span class="link-span"><?php echo $phone_link_vis; ?></span></a>
                        <?php
                        }
                        ?>
                    </div><!-- ./end of header-front__top__phone -->

                    <?php 
					    if( $contacts = carbon_get_theme_option('contacts' ) ) {
    			    ?>
   				        <ul class="header-front__top__messengers">
        		            <?php
					            foreach( $contacts as $contact ) {
    			            ?>
     				        <li class="social__item">
    					        <a href="<?php echo $contact[ 'contact_link']; ?>" class="social__link">
  				                    <?php
    				                    $thumb_contact = wp_get_attachment_image_url( $contact                                  ['contact_image'], 'full' );
				                    ?>		
					                <img class="social__img" width="25" height="25" src="<?php echo $thumb_contact; ?>" alt="<?php echo $contact[ 'contact_name']; ?>">
  						        </a>
    				        </li>
				            <?php
					            }
    			            ?>
    			        </ul>
    			    <?php
					    }
				    ?>
                  

                </div>
            </div><!-- ./end of container -->
        </div><!-- ./end of header-front__top -->
        
        <div class="header-front__bottom"
		<?php if (!is_front_page()){
			echo 'style="background: #ededed;"';
		}?>
		>
            <div class="container">
                <div class="header-front__bottom__inner flex align-center">
                    <a href="/" class=" logo">
  					    <?php
  						    $header_logo = get_theme_mod('header_logo');
  						    $img = wp_get_attachment_image_src($header_logo, 'full');
  						    if ($img) : echo '<img src="' . $img[0] . '" alt="">';
  						    endif;
                        ?>
				    </a>
					
					<div class="header-front__bottom__inner__mob">
						
					<div class="mob__contacts">
					<?php
                          if (carbon_get_theme_option('tel_contact_link') && carbon_get_theme_option('tel_contact_link_icon') ){ ?>

                        <a class="mob__contacts__link" href="tel:<?php echo carbon_get_theme_option('tel_contact_link') ?>">
                            <?php
                                echo '<img class="mob__contacts__link__img" width="25" height="25" src="'.wp_get_attachment_image_url(carbon_get_theme_option('tel_contact_link_icon')).'" alt="" >';
                                } 
                            ?>
                        </a>
                        <?php
                        //}
                        ?>

							<a class="mob__cart" href="<?php echo site_url()?>/cart/">
								<svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
						    		<path id="Vector" d="M8.75553 24.1213C7.15555 24.1213 5.84646 25.4304 5.84646 27.0304C5.84646 28.6304 7.15555 29.9395 8.75553 29.9395C10.3555 29.9395 11.6646 28.6304 11.6646 27.0304C11.6646 25.4304 10.3555 24.1213 8.75553 24.1213ZM0.0283203 0.848755V3.75783H2.93739L8.17372 14.8123L6.13737 18.3032C5.99192 18.7395 5.84646 19.3214 5.84646 19.7577C5.84646 21.3577 7.15555 22.6668 8.75553 22.6668H26.21V19.7577H9.33735C9.1919 19.7577 9.04644 19.6123 9.04644 19.4668V19.3213L10.3555 16.8486H21.1191C22.2827 16.8486 23.1554 16.2668 23.5918 15.3941L28.8281 5.93963C29.119 5.64872 29.119 5.50327 29.119 5.21236C29.119 4.33964 28.5372 3.75783 27.6645 3.75783H6.13737L4.82829 0.848755H0.0283203ZM23.3009 24.1213C21.7009 24.1213 20.3918 25.4304 20.3918 27.0304C20.3918 28.6304 21.7009 29.9395 23.3009 29.9395C24.9009 29.9395 26.21 28.6304 26.21 27.0304C26.21 25.4304 24.9009 24.1213 23.3009 24.1213Z" fill="#23C229"/>
								</svg>
								<span class="header__cart__count"><span><?php echo WC()->cart->get_cart_contents_count(); ?><span>
							</a>
					</div>
					<button id="burger" class="burger"></button>
					</div>
					<div class="header-front__bottom__inner-block flex align-center justify-between">
				
						<div class="header__catalog">
                        	<button class="header__catalog__link">Каталог</button>
						    	<?php
							    wp_nav_menu(
								    array(
									    'theme_location' => 'menu-catalog',
									    'container' => false,
									    'menu_class' => 'catalog__menu',
									    'walker'          => new My_Walker_Nav_Menu(),
									    'depth'           => 5,
								    )
							    );
						    	?>
				   		 </div><!-- ./end of header__catalog -->
							<a class="header__cart" href="<?php echo site_url()?>/cart/">
								<svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
						    		<path id="Vector" d="M8.75553 24.1213C7.15555 24.1213 5.84646 25.4304 5.84646 27.0304C5.84646 28.6304 7.15555 29.9395 8.75553 29.9395C10.3555 29.9395 11.6646 28.6304 11.6646 27.0304C11.6646 25.4304 10.3555 24.1213 8.75553 24.1213ZM0.0283203 0.848755V3.75783H2.93739L8.17372 14.8123L6.13737 18.3032C5.99192 18.7395 5.84646 19.3214 5.84646 19.7577C5.84646 21.3577 7.15555 22.6668 8.75553 22.6668H26.21V19.7577H9.33735C9.1919 19.7577 9.04644 19.6123 9.04644 19.4668V19.3213L10.3555 16.8486H21.1191C22.2827 16.8486 23.1554 16.2668 23.5918 15.3941L28.8281 5.93963C29.119 5.64872 29.119 5.50327 29.119 5.21236C29.119 4.33964 28.5372 3.75783 27.6645 3.75783H6.13737L4.82829 0.848755H0.0283203ZM23.3009 24.1213C21.7009 24.1213 20.3918 25.4304 20.3918 27.0304C20.3918 28.6304 21.7009 29.9395 23.3009 29.9395C24.9009 29.9395 26.21 28.6304 26.21 27.0304C26.21 25.4304 24.9009 24.1213 23.3009 24.1213Z" fill="#23C229"/>
								</svg>
								<span class="header__cart__count"><span><?php echo WC()->cart->get_cart_contents_count(); ?><span>
							</a>
						<div class="header__actions flex align-center">
							<button class="header__search-btn" type="button">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						    		<g id="&#208;&#159;&#208;&#190;&#208;&#184;&#209;&#129;&#208;&#186;">
						        		<path id="&#208;&#159;&#208;&#190;&#208;&#184;&#209;&#129;&#208;&#186;_2" d="M17.6125 15.4914C18.7935 13.8786 19.4999 11.8976 19.4999 9.75004C19.4999 4.37405 15.1259 0 9.74993 0C4.37398 0 0 4.37405 0 9.75004C0 15.126 4.37403 19.5001 9.74998 19.5001C11.8975 19.5001 13.8787 18.7936 15.4915 17.6125L21.8789 24L24 21.8789L17.6125 15.4914ZM9.74998 16.5C6.02782 16.5 3.00001 13.4722 3.00001 9.75004C3.00001 6.02785 6.02782 3.00003 9.74998 3.00003C13.4721 3.00003 16.5 6.02785 16.5 9.75004C16.5 13.4722 13.4721 16.5 9.74998 16.5Z" fill="#23C229"/>
						    		</g>
								</svg>
                    		</button>

							<div class="header__actions__search">
                        		<?php if ( is_active_sidebar( 'sidebar-search-header' ) ){ ?>
		               	    		<?php dynamic_sidebar( 'sidebar-search-header' ); ?>
									<?php //get_search_form(); ?>
                        		<?php } ?>
                            	<!-- <button class="search__close" type="button">
                                	<span class="sr-only">Закрыть поиск</span>
                        		</button> -->
                       			<div class="search__list__wrapper" >
									<ul id="result"></ul>
									
								</div>
                    	</div>
						</div>
				
					<div class="header-st__burger">
                        <span></span>
                    </div>	

                    <?php
					    wp_nav_menu(
						    array(
							       'theme_location' => 'menu-1',
							    'container' => false,
							    'menu_class' => 'header-st__menu',
						    )
					    );
				    ?>

                 
					</div>
                    
                    
                    
                </div>

            </div><!-- ./end of container -->
        </div>
        
    </header>
	
	<?php
	if (is_front_page()) {
		echo '<main class="grey-bg main-front">';
	} else {
		echo '<main>';
	}
