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


function _scc_theChoice_css($side) {
	$options = get_option('option_tree');
	$side = $options['skin'];
	if ($side == 'light') {
		wp_enqueue_style('cloud-city', get_stylesheet_directory_uri().'/css/lightside.css');
	}
	else {
		wp_enqueue_style('cloud-city', get_stylesheet_directory_uri().'/css/darkside.css');
	}
}
add_action('wp_enqueue_scripts', '_scc_theChoice_css', 100);


function _scc_theChoice_js($use = '') {
	$options = get_option('option_tree');
	$side = $options['skin'];
	if ($side == 'light') {
		$body_img_url = $options['light_bg_img'];
	}
	else {
		$body_img_url = $dark_bg_img = $options['dark_bg_img'];
	}
		if (! $use == 'reinit') {
			echo '<script>';
		}
		echo 'jQuery.backstretch("';
		echo $body_img_url;
		echo '");     ';
		if (! $use == 'reinit') {
			echo '</script>';
		}
}
add_action('wp_footer', '_scc_theChoice_js');

/**
* Header and Footer Scripts From Options
*/
function _scc_option_headerScripts($options) {
	$options = get_option('option_tree');
	$out = $options['header_scripts'];
	if (! $out == '') {
		echo $out;
	}
}
add_action('wp_head', '_scc_option_headerScripts');
function _scc_option_footerScripts() {
	$options = get_option('option_tree');
	$out = $options['footer_scripts'];
	if (! $out == '') {
		echo $out;
	}
}
add_action('wp_footer', '_scc_option_footerScripts');

/**
* Set Masonry Brick Width CSS Dynamically
*
* @since _scc 0.1
*/
if (! function_exists('_scc_dynamic_width') ) :
function _scc_dynamic_width() {
	global $options;
	$howmany = $options['masonry_bricks'];
	//divide that by 100 to get the percent width
	$percent = 100/$howmany;
	//keep it to 4 if it's greater than 4 for mobile
	if ($howmany = 6) {
		$Spercent = 25;
	}
	echo '<style>';
	echo '.masonry-entry {width:';
	echo $percent.'%;';
	echo '} ';
	echo " @media screen and (min-width: 720px) {{ .masonry-entry { width:";
  		echo $Spercent.'%;';
   echo "} ";
   echo "}</style>";
}
add_action('wp_head', '_scc_dynamic_width');
endif; //! _scc_dynamic_width exists



?>