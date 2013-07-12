<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package _sf
 */
?>
<?php 
	$sidebar = get_theme_mod('_sf_default_sidebar');
	_sf_sidebar_starter($sidebar);
?>
		<?php do_action( 'before_sidebar' ); ?>
		<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>


			<aside id="archives" class="widget">
				<div class="widget-title"><h1><?php _e( 'Archives', '_s' ); ?></h1></div>
				<ul>
					<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
				</ul>
			</aside>

			<aside id="meta" class="widget">
				<div class="widget-title"><h1><?php _e( 'Meta', '_s' ); ?></h1></div>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>
			</aside>

		<?php endif; // end sidebar widget area ?>
	</div><!-- #secondary -->
