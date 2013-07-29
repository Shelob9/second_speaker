<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after.
 * 
 * Shows part/footer-full.php, a full-width footer, unless options say to use parts/footer-reg.php, which is a regular width footer.
 * @package geth
 * @ since geth 0.1
 */
?>
	</div><!-- #main -->
	<?php do_action( 'tha_footer_before' ); 
	//get the option for footer-width
	global $options;
	$footer = $options['footer_width'];
	//To be safe, set it to full-width unless specifically set to regular-width.
	if ($footer != 'reg' ) {
		echo '<footer id="colophon" class="site-footer row" role="contentinfo">';
	}
	else {
		echo '<footer id="colophon" class="site-footer row full-row" role="contentinfo">';
	}
	do_action('tha_footer_top');
	_sf_content_nav( 'nav-below' );
	do_action('tha_footer_bottom');
	echo '</footer>';
	do_action( 'tha_footer_after' ); ?>
</div><!-- #page -->
<?php wp_footer(); ?>
<?php do_action( 'tha_body_bottom' ); ?>
</body>
</html>