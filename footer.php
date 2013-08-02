<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after.
 * 
 * Shows part/footer-full.php, a full-width footer, unless options say to use parts/footer-no.php, which is a noular width footer.
 * @package geth
 * @ since geth 0.1
 */
?>
	</div><!-- #main -->
	<?php do_action( 'tha_footer_before' ); 
	//get the option for footer-width
	global $options;
	$footer = $options['footer_width'];
	//To be safe, set it to full-width unless specifically set to noular-width.
	if ($footer != 'yes' ) {
		echo '<footer id="colophon" class="site-footer row" role="contentinfo">';
	}
	else {
		echo '<footer id="colophon" class="site-footer full-row" role="contentinfo">';
	}
	do_action('tha_footer_top');
	echo "<div class='row' id='post-nav-row'>";
	echo "<div class='large-12 columns'>";
	_sf_content_nav( 'nav-below' );
	echo "</div></div>";
	if ($footer != 'yes' ) {
		echo "<div class='row' id='footer-widgets'>";
	}
	else {
		echo "<div class='row full-row' id='footer-widgets'>";
	}
	echo "<div class='large-4 columns footer-widgets' id='footer-widget-1'> ";
	if (  ! dynamic_sidebar ('footer-1' ) ) : ?>
		<aside id="archives" class="widget">
				<h1 class="widget-title"><?php _e( 'Archives', '_sf' ); ?></h1>
				<ul>
					<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
				</ul>
			</aside>
	<?php
	endif;
	echo "</div>";
	
	echo "<div class='large-4 columns footer-widgets' id='footer-widget-2'>";
	if (  ! dynamic_sidebar ('footer-2' ) ) : ?>
		<aside id="archives" class="widget">
				<h1 class="widget-title"><?php _e( 'Archives', '_sf' ); ?></h1>
				<ul>
					<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
				</ul>
		</aside>
	<?php
	endif;
	echo "</div> ";
	
	echo "<div class='large-4 columns footer-widgets' id='footer-widget-3'>";
	if (  ! dynamic_sidebar ('footer-3' ) ) : ?>
		<aside id="archives" class="widget">
				<h1 class="widget-title"><?php _e( 'Footer Widget 3', '_sf' ); ?></h1>
				<ul>
					<?php _e( 'In addition to the hidden sidebar, this theme has three footer widget areas.', '_sf' ); ?>
				</ul>
		</aside>
	<?php
	endif;
	echo "</div>";
	echo "</div><!--/#footer-widgets-row-->";
	if ($footer != 'yes' ) {
		echo "<div class='row' id='site-info-row'>";
	}
	else {
		echo "<div class='row full-row' id='site-info-row'>";
	}
	do_action('_sf_credit_links');
	do_action('tha_footer_bottom');
	echo '</div>';
	echo '</footer>';
	do_action( 'tha_footer_after' ); ?>
</div><!-- #page -->
<?php wp_footer(); ?>
<?php do_action( 'tha_body_bottom' ); ?>
</body>
</html>