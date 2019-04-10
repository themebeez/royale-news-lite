<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Royale_News_Lite
 */

get_header(); 
	?>
	<div id="primary" class="content-area <?php royale_news_inner_container_class(); ?>">
		<main id="main" class="site-main">
			<div class="container">
				<div class="row">
					<?php
					$sidebar_position = royale_news_get_option( 'royale_news_sidebar_position' );

					if( $sidebar_position == 'none' || !is_active_sidebar( 'sidebar-1' ) ) {
						$class = 'col-md-12';
					} else {
						$class = 'col-md-8';
					}

					if( $sidebar_position == 'left' ) {
						get_sidebar();
					}
					?>
					<div class="<?php echo esc_attr( $class ); ?> sticky-section">
						<div class="row">
							<div class="col-md-12">
								<div class="news-section-info clearfix">
									<?php the_archive_title( '<h3 class="section-title">', '</h3>' ); ?>
								</div><!-- .news-section-info -->
								<div class="archive-description news-section">
									<?php the_archive_description( '<p>', '</p>' ); ?>
								</div><!-- .archive-description -->
							</div>
						</div>
						<?php
						if( have_posts() ) {
							?>
							<div class="row">
								<div class="grid-posts-container">
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
												get_template_part( 'template-parts/content', 'search' );
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
												<div class="row clearfix"></div>
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
												get_template_part( 'template-parts/content', 'search' );
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
								</div>
							</div>
							<?php
						} else {
							?>
							<div class="row">
								<div class="col-md-12">
									<?php get_template_part( 'template-parts/content', 'none' ); ?>
								</div>
							</div>
							<?php
						}
						?>
					</div>
					<?php
					if( $sidebar_position == 'right' ) {
						get_sidebar();
					}
					?>
				</div><!-- .row.section -->
			</div><!-- .container -->
		</main><!-- .main-container -->
	</div><!-- #primary.content-area -->
	<?php
get_footer();