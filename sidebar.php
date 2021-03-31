<?php
/**
 * The sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

if ( has_nav_menu( 'primary' ) || has_nav_menu( 'social' ) || is_active_sidebar( 'sidebar-1' )  ) : ?>
	<div id="secondary" class="secondary">

		<?php if ( has_nav_menu( 'primary' ) ) : ?>
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<?php
					// Primary navigation menu.
					wp_nav_menu( array(
						'menu_class'     => 'nav-menu',
						'theme_location' => 'primary',
					) );
				?>
			</nav><!-- .main-navigation -->
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
			<div id="widget-area" class="widget-area" role="complementary">
				<?php dynamic_sidebar( 'sidebar-1' ); ?>
				<aside id="text-2" class="widget widget_text">
					<div class="textwidget">© <?php echo date("Y"); ?> Celso Jr. All rights reserved.<br>
						Eliane is a <a href="https://wordpress.org/">WordPress</a> theme based on the TwentyFifteen
						made with ♥ by <a href="<?php echo get_site_url(); ?>">Celso Jr</a>.<br>
						Commit <a href="<?php echo COMMIT_URL; ?>"><?php echo GITHUB_SHA_SHORT; ?></a><br>
						<a href="<?php echo get_site_url() . '/terms-conditions'; ?>">Terms of Use</a> / <a href="<?php echo get_site_url() . '/privacy-policy'; ?>">Privacy Policy</a> / <a href="<?php echo get_site_url() . '/sitemap'; ?>">Site Map</a>
					</div>
				</aside>
			</div><!-- .widget-area -->
		<?php endif; ?>
	</div><!-- .secondary -->

<?php endif; ?>
