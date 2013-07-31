<?php
/**
 * @package gethen
 * @ since gethen 0.1
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>
	<?php if ( has_post_thumbnail()) { ?>
		<div class="large-3 columns">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_post_thumbnail('large'); ?></a>
		</div>
		<div class="large-9 columns">
	<?php } else { 
	?>
		<div class="large-12 columns">
	<?php } ?>
	
		<header class="entry-header">
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', '_sf' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
		</header>
		<?php the_content(); ?>
	</div>
</article>
