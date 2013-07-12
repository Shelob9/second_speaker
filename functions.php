<?php
/**
*
*/


/**
*Child scripts and styles
* Use if you want to enqueue jQuery in one script file the simple way.
* If so, remove comment lines from line 18 before add_action
*/
//replace js init fromm parent with the child one. Make sure to keep current.
function _sf_child_init() {

		wp_enqueue_script('child-init', get_stylesheet_directory_uri().'/js/child-init.js', array(), false, false);
}
add_action('wp_enqueue_scripts', '_sf_child_init');

//child style override style sheet
function _sf_child_style() {
		if ( !is_admin() ) :
			wp_enqueue_style('style', get_stylesheet_directory_uri().'/style.css');
		endif;

}
add_action('wp_enqueue_scripts', '_sf_child_style', 100);

/**
* Include child theme functions
*/

require_once('inc/childFunc.php');

/**
/* Deactivate Parent Scripts or Whole Sets of Functions
*/

require_once('inc/theGreatDeactivator.php');

/**
* Options Tree
*/
add_filter( 'ot_theme_mode', '__return_true' );
add_filter( 'ot_show_pages', '__return_false' );

require_once('admin/ot-loader.php');
//require_once('inc/theme-options.php');
?>
