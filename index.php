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
	?>

		<?php _sf_home_slider(); ?>
		<?php if ( have_posts() ) : ?>
		<ul class="small-block-grid-3">
		<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();
				get_template_part( 'content' );
				endwhile;
		?>
		</ul>
			
		<?php else : ?>
			<?php get_template_part( 'no-results', 'index' ); ?>
		<?php endif; ?>
		
<?php _sf_close($sidebar); ?>
