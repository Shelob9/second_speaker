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
* Vertical Menu
*
*@since gethen 0.1
*/
class CSS_Menu_Maker_Walker extends Walker {

  var $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );
  
  function start_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul>\n";
  }
  
  function end_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat("\t", $depth);
    $output .= "$indent</ul>\n";
  }
  
  function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
  
    global $wp_query;
    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
    $class_names = $value = ''; 
    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
    
    /* Add active class */
    if(in_array('current-menu-item', $classes)) {
      $classes[] = 'active';
      unset($classes['current-menu-item']);
    }
    
    /* Check for children */
    $children = get_posts(array('post_type' => 'nav_menu_item', 'nopaging' => true, 'numberposts' => 1, 'meta_key' => '_menu_item_menu_item_parent', 'meta_value' => $item->ID));
    if (!empty($children)) {
      $classes[] = 'has-sub';
    }
    
    $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
    $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
    
    $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
    $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
    
    $output .= $indent . '<li' . $id . $value . $class_names .'>';
    
    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
    
    $item_output = $args->before;
    $item_output .= '<a'. $attributes .'>';
    $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
    $item_output .= '</a>';
    $item_output .= $args->after;
    
    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
  }
  
  function end_el( &$output, $item, $depth = 0, $args = array() ) {
    $output .= "</li>\n";
  }
}

/**
* Hook menu to before_sidebar action
*
*@since gethen 0.1
*/

if (! function_exists('gethen_vertical_menu') ) :
function gethen_vertical_menu() {
	wp_nav_menu(array(
	  'menu' => 'Main Menu', 
	  'container_id' => 'cssmenu', 
	  'walker' => new CSS_Menu_Maker_Walker()
	)); 
}
add_action('before_sidebar', 'gethen_vertical_menu');
endif; //! gethen_vertical_menu exists
?>