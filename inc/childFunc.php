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
* http://cssmenumaker.com/blog/wordpress-3-drop-down-menu-tutorial
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
		$body_img_url = get_stylesheet_directory_uri().'/images/bg.png';
	}
	//get background image src for the 3 small callout boxes and put in arrary $sm_callout
	$sm_callout = array(
		$options['3_callout_img_1'],
		$options['3_callout_img_2'],
		$options['3_callout_img_3']
	);
	
	if (! $use == 'reinit') {
		echo '<script>     ';
	}
	//set background image and header
	echo '
			jQuery("#full-header").backstretch("'.$header_img.'");
			jQuery.backstretch("'.$body_img_url.'");
	';
	//set backgrounds for the three small callout boxes
	$x = 1;
	foreach ($sm_callout as $bg_img) {
		if ($bg_img != '' ) {
			echo 'jQuery("#callout-box-'.$x.'").backstretch("'.$bg_img.'");';
		}
		$x++;
	}
	if (! $use == 'reinit') {
		echo '</script>';
	}
}
add_action('wp_footer', 'gethen_headerBG');
endif; //! gethen_headerBG exists



/**
* Header and Footer Scripts From Options
*
* @since gethen 0.1
* @since gethen 0.1
*/
function gethen_option_headerScripts() {
	global $options;
	$out = $options['header_scripts'];
	if (! $out == '') {
		echo "\n" . stripslashes( $out ) . "\n";
	}
}
add_action('wp_head', 'gethen_option_headerScripts');
function gethen_option_footerScripts() {
	global $options;
	$out = $options['footer_scripts'];
	if (! $out == '') {
		echo "\n" . stripslashes( $out ) . "\n";
	}
}
add_action('wp_footer', 'gethen_option_footerScripts');


/**
 * Footer Widgets
 */
//initialize them
if (! function_exists('_sf_widgets_init') ) :
function gethen_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Footer One', '_sf' ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s footer-widget">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Two', '_sf' ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s footer-widget">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Three', '_sf' ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s footer-widget">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );
}
add_action( 'widgets_init', 'gethen_widgets_init' );
endif; //! _sf_widgets_init exists

//make space for them and hook them to tha_footer_bottom
if (! function_exists('gethen_footer_widget_area') ) :
function gethen_footer_widget_area() {
//get the option for footer-width
	global $options;
	$footer = $options['footer_width'];
	//To be safe, set it to full-width unless specifically set to regular-width.
	if ($footer != 'reg' ) {
		echo "<div class='row' id='footer-widgets'>";
	}
	else {
		echo "<div class='row full-row' id='footer-widgets'>";
	}
	

	echo "<div class='large-4 columns footer-widgets' id='footer-widget-1'> ";
	dynamic_sidebar( 'footer-1' );
	echo "</div>";
	
	echo "<div class='large-4 columns footer-widgets' id='footer-widget-2'>";
	dynamic_sidebar( 'footer-2' );
	echo "</div> ";
	
	echo "<div class='large-4 columns footer-widgets' id='footer-widget-3'>";
	dynamic_sidebar( 'footer-3' );
	echo "</div>";
	echo "</div><!--/#footer-widgets-row";
}
//add_action('footer-widgets', 'gethen_footer_widget_area');
endif; //! gethen_footer_widget_area exists

/**
* Stick header to top of page
*
* @since gethen 0.1
*/
if (! function_exists('gethen_header_stick') ) :
function gethen_header_stick() {
	global $options;
	if ($options['stick'] != 'unstick') {
		//echo "<style> #header-wrap{ position :fixed !important;} </style>";
		if (is_user_logged_in() ) {
			echo "<style> #header-wrap{ margin-top:19px; z-index:100; 	} </style>";
		}
	}
}
add_action('wp_head', 'gethen_header_stick');
endif; // ! gethen_header_stick exists

/**
* Get #primary out from under the fixed header
*
* @since gethen 0.1
*/
global $options;
if ($options['stick'] != 'unstick') {
	if (! function_exists('_sf_js_init_fixedHeaderFix_code') ) :
	function _sf_js_init_fixedHeaderFix_code() {
		echo "
			$('#primary').css('padding-top', $('#header-wrap').height() + 'px');
			";
	}
	endif; // if ! _sf_js_init_fixedHeaderFix_code exists

	if (! function_exists('_sf_js_init_fixedHeaderFix') ) :
	function _sf_js_init_fixedHeaderFix() { 
		echo "
			<script>
				jQuery(document).ready(function($) {
		";
		_sf_js_init_fixedHeaderFix_code();
		echo "
				}); //end no conflict wrapper
			</script>
		";
	}
	add_action('wp_footer', '_sf_js_init_fixedHeaderFix');
	endif; //! _sf_js_init_fixedHeaderFix
}
/**
* If no options are set for option tree, try and get them from 'gethen' entry, if not write this array of defaults.
*
* @since gethen 1.0
*/
if (! function_exists('gethen_restore') ) :
function gethen_restore() {
	$preexistence = get_option('gethen', 'nothing');
	if ($preexistence != 'nothing' ) {
		$options = $preexistence;
	}
}
add_action('after_switch_theme', 'gethen_restore');
endif; //! gethen_restore exists

if (! function_exists('gethen_reset') ) :
function gethen_reset() {
	global $options;
	if ( empty($options) ) {
		$options = array(
            'skin' => 'skin1',
            'sk1_bg_img' => get_stylesheet_directory_uri().'/images/bg.png',
            'stick' =>  'unstick',
            'header_img' =>  get_stylesheet_directory_uri().'/images/default-header.jpg',
			'header_scripts' =>  '', 
			'remove_credit' =>  'no',
			'footer_text' =>  '',
			'footer_scripts' =>  '',
			'footer_width' =>  'yes',
			'front_posts' =>  'yes',
			'big_callout_use' => 'yes',
			'big_callout_title' =>  'Big Callout Box Title',
			'big_callout_content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla lobortis arcu ut tortor ullamcorper, vel sodales lacus tristique. Pellentesque gravida rutrum lectus, a lacinia leo. Etiam lobortis, sapien nec imperdiet pulvinar, nisl nisl volutpat ante, in aliquam augue eros a nibh. Nulla sollicitudin suscipit malesuada. Suspendisse vel egestas urna, in tempor dolor. Phasellus tincidunt tempor lectus. Ut adipiscing, risus ac sodales cursus, diam justo rutrum dolor, in tincidunt mauris tortor quis tellus.',
			'big_callout_cta' => 'Call To Action',
			'big_callout_ctaLabel' =>  'CTA Button',
			'big_callout_ctaLink' =>  '',
			'big_callout_img' =>  'http://placekitten.com/600/800',
			'3_callout_use' =>  'yes',
			'3_callout_title_1' =>  'Small Callout 1 Title',
			'3_callout_link_1' =>  '#',
			'3_callout_content_1' =>  'Small Callout Box 1 Content. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris mi justo, bibendum non consectetur quis, adipiscing sit amet nulla. Praesent nibh libero, consequat eget sodales nec, varius ut tellus.',
			'3_callout_img_1' =>  '',
			'3_callout_title_2' =>  'Small Callout 2 Title',
			'3_callout_link_2' =>  '#',
			'3_callout_content_2' =>  'Small Callout Box 2 Content. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris mi justo, bibendum non consectetur quis, adipiscing sit amet nulla. Praesent nibh libero, consequat eget sodales nec, varius ut tellus.',
			'3_callout_img_2' =>  '',
			'3_callout_title_3' =>  'Small Callout 3 Title',
			'3_callout_link_3' =>  '#',
			'3_callout_content_3' => 'Small Callout Box 3 Content. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris mi justo, bibendum non consectetur quis, adipiscing sit amet nulla. Praesent nibh libero, consequat eget sodales nec, varius ut tellus.',
			'3_callout_img_3' =>  '',
		);
	update_option('option_tree', $options);
	}
}
add_action('init', 'gethen_reset');
endif; // !gethen_reset exists

/**
* On theme deactivation: save all options set in option tree to database as 'gethen' and empty out optiontree options.
*
* @since _gethen 1.0
*/

if (! function_exists('gethen_theme_deactivation') ) :
function gethen_theme_deactivation() {
	global $options;
	update_option('gethen', $options);
	$nothing = array();
	update_option( 'option_tree', $nothing ); 
	update_option( 'option_tree_settings', $nothing ); 
}
add_action('switch_theme', 'gethen_theme_deactivation');
endif; // ! gethen_theme_deactivation exists
?>