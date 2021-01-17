<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		// Post thumbnail.
		twentyfifteen_post_thumbnail();
	?>

	<header class="entry-header">
		<?php
			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			endif;
		?>
	</header><!-- .entry-header -->

	<h4 class="entry-meta">
		<?php twentyfifteen_entry_meta(); ?>
		<?php if ( is_single() ) {
			edit_post_link( __( 'Edit', 'twentyfifteen' ), '<span class="edit-link"> / ', '</span>' );
		}
		?>
	</h4>

	<div class="entry-content">
		<?php if ( is_single() && date('Y-m-d', strtotime('-1 year')) > get_the_modified_date('Y-m-d') ) : ?>
			<blockquote>
				<p>
					It's been over a year since this article was last updated.
					The information below might be outdated.
					Please contact the author for more.
				</p>
			</blockquote>
		<?php endif; ?>

		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading %s', 'twentyfifteen' ),
				the_title( '<span class="screen-reader-text">', '</span>', false )
			) );

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfifteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>

		<?php if ( is_single() ) : ?>
			<div class="entry-modified-date">
				<?php echo "Last edited on " . get_the_modified_date( 'M, d, Y \a\\t g:i a' ); ?>
			</div>
		<?php endif; ?>
	</div><!-- .entry-content -->
	
</article><!-- #post-## -->
