<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Royale_News_Lite
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="big-news-content">
		<div class="news-image">
			<a href="<?php the_permalink(); ?>">
				<?php
				if( has_post_thumbnail() ) :
					the_post_thumbnail( 'royale-news-thumbnail-3', array( 'class' => 'img-responsive' ) );
				else :
					?>
					<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/image-1.jpg' ); ?>" class="img-responsive">
					<?php
				endif;
				?>
				<div class="mask"></div><!-- .mask -->
			</a>
			<?php royale_news_get_categories(); ?>
		</div><!-- .news-image -->
		<div class="news-detail">
			<h4 class="news-title">
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</h4><!-- .news-title -->
			<div class="entry-meta">
                <?php royale_news_get_date(); ?> 
	            <?php royale_news_get_author(); ?>
				<?php royale_news_get_comments_no(); ?>           
            </div><!-- .entry-meta -->
            <div class="news-content">
            	<?php the_excerpt(); ?>
            	<a href="<?php the_permalink(); ?>" class="btn-more">
	            	<?php echo esc_html__( 'Read More', 'royale-news-lite' ); ?>
	            </a><!-- .btn-more -->
            </div><!-- .news-content -->
		</div><!-- .news-detail -->
	</div><!-- .big-news-content -->
</article><!-- #post-id -->