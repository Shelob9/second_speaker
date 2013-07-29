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
global $options;
get_header(); 
$sidebar = 'right';
_sf_open($sidebar);

	 if ($options['big_callout_use'] != 'no') {
	 	get_template_part('parts/callout', 'big');
	 }
	 if ($options['3_callout_use'] != 'no') {
	 	get_template_part('parts/callout', '3');
	 }
	 if ($options['front_posts'] != 'no')  {
		 if ( have_posts() ) : 
			/* Start the Loop */
			while ( have_posts() ) : the_post();
			get_template_part( 'content', get_post_format() );
			endwhile;
	}
	 else : 
		 get_template_part( 'no-results', 'index' ); 
	 endif; 
	
_sf_close($sidebar); 

?>