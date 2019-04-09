<?php
/**
 * Child theme functions
 *
 * Functions file for child theme, enqueues parent and child stylesheets by default.
 *
 * @since	1.0.0
 * @package Royale_News_Lite
 */

// Exit if accessed directly.

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'royale_news_lite_setup' ) ) {

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function royale_news_lite_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Royale News, use a find and replace
         * to change 'royale-news' to the name of your theme in all the template files.
         */
        load_theme_textdomain( 'royale-news-lite', get_template_directory() . '/languages' );

        /*
         * Add theme support for custom header image and custom header text color
         */
        add_theme_support( 'custom-header', apply_filters( 'royale_news_lite_custom_header_args', array(
            'default-image'          => '',
            'default-text-color'     => '000000',
            'width'                  => 1920,
            'height'                 => 600,
            'flex-height'            => true,
            'wp-head-callback'       => 'royale_news_header_style',
        ) ) );
    }
}
add_action( 'after_setup_theme', 'royale_news_lite_setup', 10 );

if ( ! function_exists( 'royale_news_lite_enqueue_styles' ) ) {
	/**
	 * Enqueue Styles.
	 *
	 * Enqueue parent style and child styles where parent are the dependency
	 * for child styles so that parent styles always get enqueued first.
	 *
	 * @since 1.0.0
	 */
	function royale_news_lite_enqueue_styles() {

		// Enqueue Parent theme's stylesheet.
		wp_enqueue_style( 'royale-news-lite-parent-style', get_template_directory_uri() . '/style.css' );
		// Enqueue Parent theme's main stylesheet
		wp_enqueue_style( 'royale-news-lite-parent-main', get_template_directory_uri() . '/assets/dist/css/main.css' );

		// Enqueue Child theme's stylesheet.
		// Setting 'parent-style' as a dependency will ensure that the child theme stylesheet loads after it.
		wp_enqueue_style( 'royale-news-lite-child-style', get_stylesheet_directory_uri() . '/style.css', array( 'royale-news-lite-parent-style' ) );

		wp_enqueue_style( 'royale-news-lite-child-fonts', royale_news_lite_fonts_url() );

		wp_enqueue_style( 'royale-news-lite-child-main', get_stylesheet_directory_uri() . '/assets/dist/css/main.css' );
	}
}
// Add enqueue function to the desired action.
add_action( 'wp_enqueue_scripts', 'royale_news_lite_enqueue_styles', 10 );


/**
 * Funtion To Get Google Fonts
 */
if ( !function_exists( 'royale_news_lite_fonts_url' ) ) {
    /**
     * Return Font's URL.
     *
     * @since 1.0.0
     * @return string Fonts URL.
     */
    function royale_news_lite_fonts_url() {

        $fonts_url = '';
        $fonts = array();
        $subsets = 'latin,latin-ext';

        /* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
        if ('off' !== _x('on', 'Cormorant Garamond font: on or off', 'royale-news-lite')) {
            $fonts[] = 'Cormorant+Garamond:400,400i,600,600i,700,700i';
        }

        /* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
        if ('off' !== _x('on', 'Poppins font: on or off', 'royale-news-lite')) {
            $fonts[] = 'Poppins:400,400i,500,600,700,700i';
        }

        if ($fonts) {
            $fonts_url = add_query_arg(array(
                'family' => urldecode(implode('|', $fonts)),
                'subset' => urldecode($subsets),
            ), 'https://fonts.googleapis.com/css');
        }
        return $fonts_url;
    }
}


/**
 * Funtion to define custom menu wrapper.
 */
if( ! function_exists( 'royale_news_lite_main_menu_wrap' ) ) {
	/**
     * Return HTML markup.
     *
     * @since 1.0.0
     * @return HTML markup.
     */
	function royale_news_lite_main_menu_wrap() {

	  	$wrap  = '<ul id="%1$s" class="%2$s">';
	  	
	  	$wrap .= '<li class="menu-home-icon"><a href="' . esc_url( home_url( '/' ) ) . '"><i class="fa fa-home" aria-hidden="true"></i></a></li>';

	  	$wrap .= '%3$s';

	  	$wrap .= '</ul>';

	  	return $wrap;
	}
}

/**
 * Funtion to define fallback menu when menu is not set. 
 */
if ( !function_exists( 'royale_news_lite_primary_navigation_fallback' ) ) {
	/**
     * Return HTML markup.
     *
     * @since 1.0.0
     * @return HTML markup.
     */
    function royale_news_lite_primary_navigation_fallback() {
        ?>
        <ul>
        	<li><a href="<?php echo esc_url( home_url( '/' ) );?>"><i class="fa fa-home" aria-hidden="true"></i></a></li>
            <?php 
            wp_list_pages( array( 
                'title_li' => '', 
                'depth' => 3,
            ) ); 
            ?>
        </ul>
        <?php    
    }
}