<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package _sf
 */
?>
<div id="secondary" class="widget-area sidebar-float" role="complementary">
	<?php do_action( 'before_sidebar' ); ?>
	<?php if ( ! dynamic_sidebar( 'sidebar-cc' ) ) : ?>


		<aside id="archives" class="widget">
			<div class="widget-title"><h5><?php _e( 'Archives', '_s' ); ?></h5></div>
			<ul>
				<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
			</ul>
		</aside>

		<aside id="meta" class="widget">
			<div class="widget-title"><h5><?php _e( 'Meta', '_s' ); ?></h5></div>
			<ul>
				<?php wp_register(); ?>
				<li><?php wp_loginout(); ?></li>
				<?php wp_meta(); ?>
			</ul>
		</aside>

	<?php endif; // end sidebar widget area ?>
</div><!-- #secondary -->
