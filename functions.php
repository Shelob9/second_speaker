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
	if ( !is_admin() ) :
			wp_enqueue_script('child-init', get_stylesheet_directory_uri().'/js/child-init.js', array(), false, true);
	endif;
}
//add_action('wp_enqueue_scripts', '_sf_child_init');

//child style override style sheet
function _sf_child_style() {
		if ( !is_admin() ) :
			wp_enqueue_style('style', get_stylesheet_directory_uri().'/style.css');
			wp_enqueue_style('child-style', get_stylesheet_directory_uri().'/css/gethen.css');
		endif;

}
add_action('wp_enqueue_scripts', '_sf_child_style', 10001);

/**
* Include child theme functions
*/

require_once(trailingslashit( get_stylesheet_directory() ) .'inc/childFunc.php');

/**
/* Deactivate Parent Scripts or Whole Sets of Functions
*/

require_once(trailingslashit( get_stylesheet_directory() ) .'inc/theGreatDeactivator.php');

/**
* sliding sidebar
*/
require_once(trailingslashit( get_stylesheet_directory() ) .'lib/slideSidebar.php');

/**
 * Theme options
 */
    require_once(trailingslashit( get_stylesheet_directory() ) .'inc/gethen-options.php');

    /**
     * gethen open-close
     * Replaces lib/open-close.php
     */
    require_once(trailingslashit(get_stylesheet_directory()).'inc/gethen-open-close.php');
?>
