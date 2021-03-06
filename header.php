<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Royale_News_Lite
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'royale-news-lite' ); ?></a>
	<?php if( get_background_image() ) { ?>
    <div class="main-wrapper">
    <?php } ?>
    	<header class="site-header">
    		<?php if( has_header_image() ) { ?>
    		<div class="logo-section" style="background-image: url(<?php header_image(); ?>);">
    			<div class="header-mask"></div><!-- .header-mask -->
    		<?php } else { ?>
    		<div class="logo-section">
    		<?php } ?>
    			<div class="container">
    				<div class="site-identity">
	    				<?php
	    				if( has_custom_logo() ) {
	    					the_custom_logo();
	    				} else {
	    					?>
	    					<div class="site-title">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			                        <?php bloginfo( 'name' ); ?>
			                    </a>
							</div><!-- .site-title -->
							<div class="site-description">
								<p><?php echo esc_html( get_bloginfo( 'description' ) ); ?></p>
							</div><!-- .site-description -->
							<?php
	    				}
	    				?>
	    			</div><!-- .site-identity -->
	    		</div><!-- .container -->
	    	</div><!-- .logo-section -->
	    	<div class="menu-section">
	    		<div class="container">
	    			<div class="row">
	    				<div class="col-md-11">
	    					<div class="menu-container clearfix">
								<nav id="site-navigation" class="main-navigation" role="navigation">
				                    <?php
			                        wp_nav_menu(
			                            array(
			                                'theme_location' 	=> 'primary',
			                                'menu_id'        	=> 'primary-menu',
			                                'menu_class'        => 'primary-menu',
			                                'container'     	=> 'div',
			                                'container_class'   => 'primary-menu-container',
			                                'items_wrap' 		=> royale_news_lite_main_menu_wrap(),
			                                'fallback_cb'    	=> 'royale_news_lite_primary_navigation_fallback',
			                            )
			                        );
				                    ?>
				                </nav><!-- #site-navigation -->
				            </div><!-- .menu-container.clearfix -->
	    				</div>
	    				<?php
    					if( royale_news_get_option( 'royale_news_enable_search_btn' ) == 1 ) {
    						?>
    						<div class="col-md-1 hidden-xs hidden-sm">
								<div class="search-container pull-right">
									<div class="search-icon">
										<i class="fa fa-search"></i><!-- .fa.fa-search -->
									</div><!-- .search-icon -->
								</div><!-- .search-container.pull-right -->
							</div><!-- .col-md-2.hidden-xs.hidden-sm -->
							<div class="col-md-12 search-form-main-container">
								<div class="search-form-container">
									<?php get_search_form(); ?>
								</div><!-- .search-form-container -->				
							</div><!-- .col-md-12 -->
    						<?php
    					}
    					?>
	    			</div>
	    		</div>
	    	</div>
    	</header><!-- .site-header -->
