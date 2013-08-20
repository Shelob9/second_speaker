<?php
/**
For child themes category.
slug: cat-themes-2
id: 14.
 *
 * @package _sf
 */
get_header(); 
$sidebar = get_theme_mod('_sf_default_sidebar');
_sf_open($sidebar);
global $themes;

function _sf_child_theme_excerpt_length( $length ) {
	
		return 55;

}
add_filter( 'excerpt_length', '_sf_child_theme_excerpt_length', 999 );
?>
		<?php if ( have_posts() ) : ?>
		<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();
			get_template_part( 'content', get_post_format() );
			endwhile;
		?>
		<hr />
		<?php _sfSite_prevDownload_table($themes); ?>
		
		<?php else : ?>
			<?php get_template_part( 'no-results', 'index' ); ?>
		<?php endif; ?>
		
<?php _sf_close($sidebar); ?>
