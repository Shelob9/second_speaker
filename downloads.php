<?php
/**
/*
 * Template Name: Downloads Page
 */
get_header(); 
$sidebar = get_theme_mod('_sf_default_sidebar');
_sf_open($sidebar);

function _sfSite_prevDownload_table() {
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
}
?>
<?php do_action( 'tha_entry_before' ); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php do_action( 'tha_entry_top' ); ?>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->
		<h7>Download and Preview _Second Foundation and Child Themes</h7>
	<div class="entry-content">
		<table>
  <thead>
    <tr>
      
      <th>Theme</th>
      <th width="150">Preview</th>
      <th width="150">Download</th>
      <th width="150">Github</th>
    </tr>
   <?php _sfSite_prevDownload_table(); ?>
  </thead>
  <tbody>
  
  </tbody>
</table>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', '_s' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	<?php edit_post_link( __( 'Edit', '_s' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
<?php do_action( 'tha_entry_bottom' ); ?>
</article><!-- #post-## -->
<?php do_action( 'tha_entry_after' ); ?>

<?php _sf_close($sidebar); ?>
