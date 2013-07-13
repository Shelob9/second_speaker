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
$sidebar = $options['sidebar'];
_sf_open($options['sidebar']);
?>
		<?php _sf_home_slider(); ?>
		<?php if ( have_posts() ) : ?>
		<ul class="block-grid-small-2">
		<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();
				get_template_part( 'content' );
				endwhile;
		?>
		</ul>
			<?php _sf_content_nav( 'nav-below' ); ?>
		<?php else : ?>
			<?php get_template_part( 'no-results', 'index' ); ?>
		<?php endif; ?>
		
<?php _sf_close($options['sidebar']); ?>
