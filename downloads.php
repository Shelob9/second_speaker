<?php
/**
/*
 * Template Name: Downloads Page
 */
get_header(); 
$sidebar = get_theme_mod('_sf_default_sidebar');
_sf_open($sidebar);
global $themes;
?>
<?php do_action( 'tha_entry_before' ); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php do_action( 'tha_entry_top' ); ?>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->
		<h7>Download and Preview _Second Foundation and Child Themes</h7>
	<div class="entry-content">
   		<?php _sfSite_prevDownload_table($themes); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', '_s' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	<?php edit_post_link( __( 'Edit', '_s' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
<?php do_action( 'tha_entry_bottom' ); ?>
</article><!-- #post-## -->
<?php do_action( 'tha_entry_after' ); ?>

<?php _sf_close($sidebar); ?>
