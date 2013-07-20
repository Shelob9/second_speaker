<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package _sf
 */
get_header(); 
$sidebar = 'value3';
_sf_open($sidebar);
?>
	<?php 
	global $options;
	if ($options['sidebar'] != 'value3' ) {
		get_sidebar('floated');
	}
	var_dump($options);
	?>
	<?php _sf_home_slider(); ?>
	<?php if ( have_posts() ) : 
		echo '<div id="masonry-loop"><!--start masonry-loop-->';
			/* Start the Loop */
			while ( have_posts() ) : the_post();
				get_template_part( 'content', 'masonry' );
			endwhile;
		echo '</div><!--end masonry-loop-->';
	?>
	
	<?php else : ?>
		<?php get_template_part( 'no-results', 'index' ); ?>
	<?php endif; ?>
		
<?php _sf_close($sidebar); ?>
