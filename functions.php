<?php
/**
*
*/


/**
*Child scripts and styles
*/
//replace init form parent with the child one. Make sure to keep current.
function _sf_child_init() {
	wp_dequeue_script('_sf_init');
	if ( !is_admin() ) :
			wp_enqueue_script('child-init', get_stylesheet_directory_uri().'/js/_sf_child-init.js', array(), false, true);
	endif;
}
add_action('wp_enqueue_scripts', '_sf_child_init');

//child style override style sheet
function _sf_child_style() {
		if ( !is_admin() ) :
			wp_enqueue_style('child-style', get_stylesheet_directory_uri().'/css/child.css');
		endif;

}
add_action('wp_enqueue_scripts', '_sf_child_init');

/**
* Include child theme functions
*/

require_once('inc/childFunc.php');

/**
/* Deactivate Parent Scripts or Whole Sets of Functions
*/

require_once('inc/theGreatDeactivator.php');

?>