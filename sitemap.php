<?php
/**
 * The template for displaying the sitemap
 *
 * Contains all the content of this entire WordPress site.
 *
 * Template Name: Sitemap Template
 * @package Eliane
 * @since Eliane 1.0
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php
                    // Post thumbnail.
                    twentyfifteen_post_thumbnail();
                ?>

                <header class="entry-header">
                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                </header><!-- .entry-header -->

                <h4 class="entry-meta"></h4>

                <div class="entry-content">
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
                </div><!-- .entry-content -->

    		</main><!-- .site-main -->
	</section><!-- .content-area -->

<?php get_footer(); ?>