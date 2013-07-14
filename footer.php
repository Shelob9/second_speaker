<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package _sf
 */
 $options= get_option('option_tree');
?>

	</div><!-- #main -->

	<footer id="colophon" class="site-footer row" role="contentinfo">
	<?php _sf_content_nav( 'nav-below' ); ?>
		<div class="site-info large-12 columns">
			<?php if (! $options['remove_credit'] = 'no') : ?>
			<?php do_action( '_sf_credits' ); ?>
			<?php printf( __( 'Theme:', '_sf' )); ?> <a href="http://complexwaveform.com/jp/sf" title="<?php esc_attr_e( 'A _Second Foundation Child Theme', '_sf' ); ?>"><?php printf( __( 'Cloud City', '_sf' )); ?></a>
			<?php printf( __( 'By:', '_sf' )); ?> <a href="http://ComplexWaveform.com/" rel="designer">
			<?php printf( __( 'Josh Pollock', '_sf' )); ?></a>
			<span class="sep"> | </span>
			<?php endif; //$options['remove_credit'] != 'no';
			?>
		<?php
			if ( $options['footer_text'] != '') {
				echo $options['footer_text'];
			}
		
		 
		?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>