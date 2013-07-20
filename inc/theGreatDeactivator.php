<?php
/**
* I am The Great Deactivator. I can be used to remove unneeded stuff from the parent theme.
* Note I do not do anything unless you remove some commented out lines.
* For more information see: https://github.com/Shelob9/_second_foundation/wiki/The-Great-Deactivator
* @since 1.2
**/

/**
* Remove Scripts and Styles
*/
 
function _sf_remove_scripts_styles() {
/**Foundation**/
	//remove_action( 'wp_enqueue_scripts', '_sf_scripts_foundation' );
	//remove_action( 'wp_footer', '_sf_js_init_foundation' );
/**Infinite Scroll**/
	remove_action( 'wp_enqueue_scripts', '_sf_scripts_infScroll' );
	remove_action( 'wp_footer', '_sf_js_init_infScroll' );
/**Masonry**/
	//remove_action( 'wp_enqueue_scripts', '_sf_scripts_masonry' );
	//remove_action( 'wp_footer', '_sf_js_init_masonry' );
/**Backstretch**/
	//remove_action( 'wp_enqueue_scripts', '_sf_scripts_backstretch' );
	remove_action( 'wp_footer', '_sf_js_init_backstretch' );
/**AJAX Page Loads**/
	//remove_action( 'wp_enqueue_scripts', '_sf_scripts_ajaxMenus' );
	//remove_action( 'wp_footer', '_sf_js_init_ajaxMenus' );
	
}
add_action('init', '_sf_remove_scripts_styles');
