<?php
/**
* I am a good place to put new functions for the child theme.
*/

global $options;
$options = get_option('option_tree');

/**
* Set Header Background IMAGE
*
*@since Gethen 0.1
*/
if ( function_exists('gethen_headerBG') ) :
function gethen_headerBG($options) {
	if ($options['header_img'] != '' ) {
		$header_img = $options['header_img'];
	}
	else {
		$header_img = get_stylesheet_directory_uri().'/images/default-header.jpg';
	}
	echo '<script>
		jQuery.(#full-header).backstretch("'.$header_img.'");
	';
}
add_action('wp_footer', 'gethen_headerBG');
endif; //! gethen_headerBG exists