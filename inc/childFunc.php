<?php
/**
* I am a good place to put new functions for the child theme.
*/

/**
 * Register widgetized area and update sidebar with default widgets
 */
if (! function_exists('_scc_widgets_init') ) :
function _scc_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', '_sf' ),
		'id'            => 'sidebar-cc',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title"><h5>',
		'after_title'   => '</h5></div>',
	) );
}
add_action( 'widgets_init', '_scc_widgets_init' );
endif; //! _scc_widgets_init exists

$side = get_theme_mod('side', 'light');
function _sf_theChoice_css($side) {
	if ($side = 'light') {
		wp_enqueue_style('cloud-city', get_stylesheet_directory_uri().'/css/lightside.css');
	}
	else {
		wp_enqueue_style('cloud-city', get_stylesheet_directory_uri().'/css/darkside.css');
	}
}
add_action('wp_enqueue_scripts', '_sf_theChoice_css');


function _sf_theChoice_js($side, $use = '') {
	if ($side = 'light') {
		$light_bg_img = get_theme_mod('light_bg_img', 'none');
		if ($light_bg_img = 'none') {
			$body_img_url = get_stylesheet_directory_uri().'/images/bg.jpg';
		}
		if ($light_bg_img != 'none') {
			$body_img_url = $light_bg_img;
		}
	}
	if ($side = 'dark') {
		$dark_bg_img = get_theme_mod('dark_bg_img', 'none');
		if ($dark_bg_img = 'none') {
			$body_img_url = get_stylesheet_directory_uri().'/images/bg-invert.jpg';
		}
		if ($dark_bg_img != 'none') {
			$body_img_url = $dark_bg_img;
		}
	}
		if (! $use == 'reinit') {
			echo '<script>';
		}
		echo ' jQuery.backstretch("';
		echo $body_img_url;
		echo '");     ';
		if (! $use == 'reinit') {
			echo '</script>';
		}
}
add_action('wp_footer', '_sf_theChoice_js');
?>