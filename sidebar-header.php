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
		<?php (  dynamic_sidebar( 'sidebar-header' )  ?>

			


	</div><!-- #secondary -->
