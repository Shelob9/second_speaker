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
		$body_img_url = get_stylesheet_directory_uri().'/images/bg.jpg';
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
* Gethen Footer Stuff
*
* @since gethen 0.1
*/
if (! function_exists('gethen_footer_fun') ) :
function gethen_footer_fun() {
?>
		<div class="site-info large-12 columns">
		<?php if (! $options['remove_credit'] = 'no') : ?>
		<a href="http://wordpress.org/" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', '_sf' ); ?>" rel="generator"><?php printf( __( 'Powered by %s', '_s' ), 'WordPress' ); ?></a>
					<span class="sep"> | </span>
					<?php printf( __( 'Theme: %1$SGethen by %2$s.', '_sf' ), 'Gethen', '<a href="http://ComplexWaveform.com/" rel="designer">Josh Pollock</a>' ); ?>
		<?php 
			endif; //$options['remove_credit'] != 'no';
			/*
			if ( $options['footer_text'] != '') {
				echo $options['footer_text'];
			}
			*/
			$footerText = ot_get_option('footer_text');
			if ( $footerText != '') {
				echo $footerText;
			}
		?>
	</div><!-- .site-info -->
<?php
}
add_action('tha_footer_bottom', 'gethen_footer_fun');
endif; // ! gethen_footer_fun exists

/**
* Header and Footer Scripts From Options
*
* @since _scc 0.1
* @since gethen 0.1
*/
function _scc_option_headerScripts($options) {
	$options = get_option('option_tree');
	$out = $options['header_scripts'];
	if (! $out == '') {
		echo "\n" . stripslashes( $out ) . "\n";
	}
}
add_action('wp_head', '_scc_option_headerScripts');
function _scc_option_footerScripts() {
	$options = get_option('option_tree');
	$out = $options['footer_scripts'];
	if (! $out == '') {
		echo "\n" . stripslashes( $out ) . "\n";
	}
}
add_action('wp_footer', '_scc_option_footerScripts');


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
add_action('tha_footer_bottom', 'gethen_footer_widget_area');
endif; //! gethen_footer_widget_area exists
?>