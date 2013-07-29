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

//get the option for footer-width
global $options;
$footer = $options['footer_width'];
//To be safe, set it to full-width unless specifically set to regular-width.
if ($footer != 'reg' ) {
	$footer = 'full';
}
?>
	</div><!-- #main -->
	<?php do_action( 'tha_footer_before' ); ?>
	<?php get_template_part('parts/foot', $footer); ?>
</div><!-- #page -->
<?php wp_footer(); ?>
<?php do_action( 'tha_footer_bottom' ); ?>
</body>
</html>