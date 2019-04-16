<?php
/**
 * The main template file
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
	<div id="primary" class="content-area <?php royale_news_home_inner_container_class(); ?>">
		<main id="main" class="site-main">
			<?php
			$enable_feature = royale_news_get_option( 'royale_news_enable_featured_post' );
			if ( is_active_sidebar( 'sidebar-2' ) && $enable_feature == 1 ) {
				?>
				<div class="featured-widget-container">
					<div class="container">
					<?php dynamic_sidebar( 'sidebar-2' ); ?>
					</div><!-- .container -->
				</div>
				<?php
			}
			?>
			<div class="container">
				<div class="row">
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
						<div class="row">
							<?php
							if( $sidebar_position == 'none' || !is_active_sidebar( 'sidebar-1' ) ) {

								$count = 0;
								/* Start the Loop */
								while ( have_posts() ) : 
									the_post();

									if( $count%3 == 0 && $count > 0 ) :
										?>
										<div class="row clearfix visible-lg visible-md"></div>
										<?php 
									endif; 

									if( $count%2 == 0 && $count > 0 ) :
										?>
										<div class="row clearfix visible-sm hidden-md hidden-lg"></div>
										<?php
									endif;
									?>
									<div class="col-md-4 col-sm-6">
										<?php
										/*
										 * Include the Post-Format-specific template for the content.
										 * If you want to override this in a child theme, then include a file
										 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
										 */
										get_template_part( 'template-parts/content', get_post_format() );
										?>
									</div>
									<?php
									$count++;
								endwhile;
							} else {

								$count = 0;
								/* Start the Loop */
								while ( have_posts() ) : 
									the_post(); 

									if( $count%2 == 0 && $count > 0 ) :
										?>
										<div class="row clearfix visible-sm visible-md visible-lg"></div>
										<?php
									endif;
									?>
									<div class="col-md-6 col-sm-6">
										<?php
										/*
										 * Include the Post-Format-specific template for the content.
										 * If you want to override this in a child theme, then include a file
										 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
										 */
										get_template_part( 'template-parts/content', get_post_format() );
										?>
									</div>
									<?php
									$count++;
								endwhile;
							}

							/**
							* Hook - royale_news_pagination.
							*
							* @hooked royale_news_pagination_action - 10
							*/
							do_action( 'royale_news_pagination' );
							?>
						</div><!-- .row.clearfix.news-section -->
					</div><!-- .esc_attr( $class ) -->

					<?php
					if( $sidebar_position == 'right' ) {
						get_sidebar();
					}
					?>
				</div><!-- .row.section -->
			</div><!-- .container -->
		</main><!-- .main-container -->
	</div>
<?php
get_footer();
