<?php
/**
* I am a good place to put new functions for the child theme.
*/

/**
* Declare a global variable for option tree options as $options
*
* @since gethen 0.1
*/
if (! function_exists('gethen_global_options') ) :
function gethen_global_options() {
	global $options;
	$options = get_option('option_tree');
}
add_action('init', 'gethen_global_options');
endif; // ! gethen_global_options exists

/**
* Set Header Background IMAGE
*
*@since Gethen 0.1
*/
if (! function_exists('gethen_headerBG') ) :
function gethen_headerBG($use = '') {
	global $options;
	//set the value for the header image.
	if ($options['header_img'] != '' ) {
		$header_img = $options['header_img'];
	}
	else {
		$header_img = get_stylesheet_directory_uri().'/images/default-header.jpg';
	}
	//set the value for the body background image
	if ($options['skin'] != 'skin2') {
		$body_img_url = $options['sk1_bg_img'];
	}
	else {
		$body_img_url = $options['sk2_bg_img'];
	}
	if ($body_img_url == '' ) {
		$body_img_url = get_stylesheet_directory_uri().'/images/bg.jpg';
	}
	if (! $use == 'reinit') {
		echo '<script>     ';
	}
	echo '
			jQuery("#full-header").backstretch("'.$header_img.'");
			jQuery.backstretch("'.$body_img_url.'");
	';
	if (! $use == 'reinit') {
		echo '</script>';
	}
}
add_action('wp_footer', 'gethen_headerBG');
endif; //! gethen_headerBG exists

/**
*
*/
function gethen_clearing_gallery(  $number, $orderby = 'menu_order', $order = 'ASC') {
	echo '<ul class="clearing-thumbs" data-clearing>';
	if ($images = get_posts(array(
		'post_parent'    => get_the_ID(),
		'post_type'      => 'attachment',
		'numberposts'    => $number,
		'post_status'    => null,
		'post_mime_type' => 'image',
        'orderby'        => $orderby,
        'order'           => $order,
		))) 
	{			
		foreach($images as $image) {
			$thumb = wp_get_attachment_image_src( $image->ID, 'small');
			$large = wp_get_attachment_image_src( $image->ID, 'large');
			$caption = wp_get_attachment_metadata( $image->ID);
			$out = '<li><a href="'.$large[0].'"><img data-caption="'.$caption.'" src="'.$thumb[0].'"></a></li>';
			echo $out;
		}
	}
	echo '</ul>';
}
/**
* Don't use default gallery styles
*/
add_filter( 'use_default_gallery_style', '__return_false' );

