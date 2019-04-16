<?php
/**
 * Template Name: FrontPage
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Royale_News_Lite
 */

get_header(); 
	
	royale_news_pro_ticker_news();
	?>
	<main class="main-container">
		<?php
		if ( is_active_sidebar( 'sidebar-2' ) ) {
			?>
			<div class="featured-widget-container">
				<div class="container">
				<?php dynamic_sidebar( 'sidebar-2' ); ?>
				</div><!-- .container -->
			</div>
			<?php
		}
		?>
		<div class="<?php royale_news_home_middle_class(); ?>">
			<div class="container">
				<div class="row clearfix middle-section">
					<?php
					$sidebar_position = royale_news_get_option( 'royale_news_sidebar_position' );

					if( $sidebar_position == 'none' || !is_active_sidebar( 'sidebar-1' ) ) {
						$class = 'col-md-12';
					} else {
						$class = 'col-md-8 sticky-section';
					}

					if( $sidebar_position == 'left' ) {
						get_sidebar();
					}
					?>
					<div class="<?php echo esc_attr( $class ); ?>">
						<?php
						if ( is_active_sidebar( 'sidebar-3' ) ) {
							dynamic_sidebar( 'sidebar-3' );
						}
						?>
					</div>
					<?php
					if( $sidebar_position == 'right' ) {
						get_sidebar();
					}
					?>
				</div><!-- .row.clearfix.section -->	
			</div><!-- .container -->
		</div>
		<?php
		if( is_active_sidebar( 'sidebar-6' ) ) {
			?>
			<div class="bottom-widget-container">
				<div class="container">
					<?php dynamic_sidebar( 'sidebar-6' ); ?>
				</div>
			</div>
			<?php
		}
		?>
	</main><!-- .main-container -->
	<?php
get_footer();