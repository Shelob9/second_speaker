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
			<?php do_action( '_sf_credits' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>