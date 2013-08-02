<?php
/**
* I am a good place to put new functions for the child theme.
*/

/**theme previe/download shits**/

//first setup array of themes.
	global $themes;
	$themes[] = 
		array(
			'name' => 'Cloud City',
			'folder' => 'cloud-city',
			'download' => 'cloud-city.zip',
			'github' => 'https://github.com/Shelob9/second_speaker/tree/cloud-city',
			'skins' => true,
			'skin2' => 'Light Side',
			'skin2slug' => 'lightside',
			'skin1' => 'Dark Side',
			'skin1slug' => 'darkside',
			
		);
	$themes[] = 
		array(
			'name' => 'Gethen',
			'folder' => 'gethen',
			'download' => 'gethen.zip',
			'github' => 'https://github.com/Shelob9/second_speaker/tree/gethen',
			'skins' => false
		);
	$themes[] = 
		array(
			'name' => '_Second Foundation',
			'folder' => '_second_foundation',
			'download' => '_second-foundation.zip',
			'github' => 'https://github.com/Shelob9/_second_foundation',
			'skins' => false
		);

//preview thing for sidebar		
function _sfSite_previews() {
	global $themes;
	$url = get_bloginfo('url');
	echo '<a href="#" data-dropdown="prev-drop" class="button radius secondary dropdown theme-previews">Preview Themes</a><br>';
	echo '<ul id="prev-drop" class="f-dropdown">';
	foreach ($themes as $theme) {
		echo '<li>';
		if ($theme['skins'] != false ) {
			echo '<a href="'.$url.'?theme='.$theme['folder'].'-'.$theme[
			'skin1slug'].'" title="Preview '.$theme['name'].' With '.$theme['skin1'].' Skin">'.$theme['name'].' - '.$theme['skin1'].'</a>';
			echo '</li><li>';
			echo '<a href="'.$url.'?theme='.$theme['folder'].'-'.$theme[
			'skin2slug'].'" title="Preview '.$theme['name'].' With '.$theme['skin2'].' Skin">'.$theme['name'].' - '.$theme['skin2'].' Skin</a>';
		}
		else {
			echo '<a href="'.$url.'?theme='.$theme['folder'].'" title="Preview '.$theme['name'].'">'.$theme['name'].'</a>';
		}
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
		$github = '<a target="_blank" href="'.$theme['github'].'" title="'.$theme['name'].' Github Repository">Github</a>';
		//$github = $theme['github'];
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