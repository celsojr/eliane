<?php
/**
 * The template part for displaying a message that posts cannot be found
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php _e( 'Nothing Found', 'twentyfifteen' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">

		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'twentyfifteen' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'twentyfifteen' ); ?></p>
			<?php get_search_form(); ?>

		<?php else : ?>

			<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'twentyfifteen' ); ?></p>
			<?php get_search_form(); ?>

		<?php endif; ?>

		<!-- Sitemap -->
		<h1>Sitemap</h1>
        <h4>Feeds</h4>  
            <ul>  
                <li><a title="Full content" href="feed:<?php bloginfo('rss2_url'); ?>">Main RSS</a></li>  
                <!--<li><a title="Comment Feed" href="feed:<?php bloginfo('comments_rss2_url'); ?>">Comment Feed</a></li>  -->
            </ul>  
		<h4>Pages</h4>  
            <ul><?php wp_list_pages("title_li=" ); ?></ul>  
        <h4>Categories</h4>  
            <ul><?php wp_list_cats('sort_column=name&optioncount=1&hierarchical=0&feed=RSS'); ?></ul>  
        <h4>Archives</h4>  
            <ul>  
                <?php wp_get_archives('type=monthly&show_post_count=true'); ?>  
            </ul>
		<h4>Tags</h4>
			<ul>
				<?php $tags = get_tags( array('orderby' => 'count', 'order' => 'DESC') );
					foreach ( (array) $tags as $tag ) {
						echo '<li><a href="' . get_tag_link ($tag->term_id) . '" rel="tag">' . $tag->name . ' (' . $tag->count . ') </a></li>';
					} ?>
			</ul>

		<h4>All Blog Posts</h4>  
            <ul><?php $archive_query = new WP_Query('showposts=1000&cat=-8');  
                    while ($archive_query->have_posts()) : $archive_query->the_post(); ?>  
                        <li>  
                            <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a>  
                        <!--(<?php comments_number('0', '1', '%'); ?>)  -->
                        </li>  
                    <?php endwhile; ?>  
            </ul>

	</div><!-- .page-content -->
</section><!-- .no-results -->
