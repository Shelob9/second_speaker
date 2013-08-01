<?php
/**
* I am a good place to put new functions for the child theme.
*/

function _sfSite_previews() {
	$url = get_bloginfo('url');
	$themes[] = 
		array(
			'name' => 'Cloud City- Dark Side',
			'folder' => 'cloud-city',
			
		);
	$themes[] = 
		array(
			'name' => 'Cloud City- Light Side',
			'folder' => 'cloud-city-ls',
		);
	$themes[] = 
		array(
			'name' => 'Gethen',
			'folder' => 'gethen'
		);
	$themes[] = 
		array(
			'name' => '_Second Foundation',
			'folder' => '_second_foundation',
		);
	echo '<a href="#" data-dropdown="prev-drop" class="button radius secondary dropdown theme-previews">Preview Themes</a><br>';
	echo '<ul id="prev-drop" class="f-dropdown">';
	foreach ($themes as $theme) {
		echo '<li>';
		echo '<a href="?themedemo='.$theme['folder'].'" title="Preview '.$theme['name'].'">'.$theme['name'].'</a>';
		echo '</li>';
	}
	echo '</ul>';
}
add_action('tha_sidebar_top', '_sfSite_previews');

/**
 * Register widgetized area and update sidebar with default widgets
 */
if (! function_exists('_sfSite_widgets_init') ) :
function _sfSite_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Header Sidebar', '_sd' ),
		'id'            => 'sidebar-header',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );
}
add_action( 'widgets_init', '_sfSite_widgets_init' );
endif; //! _sfSite_widgets_init exists

function _sfSite_headerWidget() {
	dynamic_sidebar( 'sidebar-header' );
}
//add_action('tha_footer_bottom', '_sfSite_headerWidget');
?>