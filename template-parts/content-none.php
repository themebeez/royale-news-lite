<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Royale_News_Lite
 */
?>

<section class="no-results not-found">

	<div class="section-info-container">
		<h3 class="section-info-title"><?php esc_html_e( 'Nothing Found', 'royale-news-lite' ); ?></h3>
	</div><!-- .page-header -->

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) {
			?>
			<p>
				<?php
				printf(
					wp_kses(
						/* translators: 1: link to WP admin new post page. */
						__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'royale-news-lite' ),
						array(
							'a' => array(
								'href' => array(),
							),
						)
					),
					esc_url( admin_url( 'post-new.php' ) )
				);
				?>
			</p>
			<?php 
		} else if ( is_search() ) { 
			?>
			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'royale-news-lite' ); ?></p>
			<?php 
			get_search_form();

		} else { 
			?>
			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'royale-news-lite' ); ?></p>
			<?php
			get_search_form();

		}
		?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
