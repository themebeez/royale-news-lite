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
add_action( 'wp_enqueue_scripts', 'royale_news_lite_enqueue_styles', 20 );


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