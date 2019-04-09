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
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'style-blog-fame' ); ?></a>

    <div class="main-wrapper">

    	<header class="site-header">
    		<div class="logo-section">
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
    	</header><!-- .site-header -->
