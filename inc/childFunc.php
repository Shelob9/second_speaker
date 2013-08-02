<?php
/**
* I am a good place to put new functions for the child theme.
*/

/**theme previe/download shits**/

//first setup array of themes.
	global $themes;
	$themes[] = 
		array(
			'name' => 'Cloud City- Dark Side',
			'folder' => 'cloud-city',
			'download' => 'cloud-city.zip',
			'github' => 'Coming Soon'
			
		);
	$themes[] = 
		array(
			'name' => 'Gethen',
			'folder' => 'gethen',
			'download' => 'gethen.zip',
			'github' => 'Coming Soon'
		);
	$themes[] = 
		array(
			'name' => '_Second Foundation',
			'folder' => '_second_foundation',
			'download' => '_second-foundation.zip',
			'github' => '<a href="https://github.com/Shelob9/_second_foundation">Github</a>'
		);

//preview thing for sidebar		
function _sfSite_previews() {
	global $themes;
	$url = get_bloginfo('url');
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

//create the download/preview table
function _sfSite_prevDownload_table($themes) {
	//start table and do top row
	echo '<div class="download-table">
			<table>
				<thead>
					<tr>
					<th>Theme</th>
						<th width="150">Preview</th>
						<th width="150">Download</th>
						<th width="150">Github</th>
					</tr>
		';
	//contents
	foreach ($themes as $theme) {
		$name = $theme['name'];
		$prev = '<a href="?themedemo='.$theme['folder'].'" title="Preview '.$theme['name'].'">Preview</a>';
		$download = '<a href="/downloads/'.$theme['download'].'" title="Preview '.$theme['name'].'">Download</a>';
		//$git = '<a href="'.$theme['git'].'" title="Preview '.$theme['name'].'">Github</a>';
		$github = $theme['github'];
		echo "<tr>";
		echo "<td>".$name."</td>";
		echo "<td>".$prev."</td>";
		echo "<td>".$download."</td>";
		echo "<td>".$github."</td>";
	}
	//end table
		echo '				</thead>
						<tbody>
					 </tbody>
				</table>
			</div>
		';
}

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