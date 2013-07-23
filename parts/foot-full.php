<?php
/**
 * Displays the footer. Called inside footer.php.
 *
 * @package geth
 * @ since geth 0.1
 */
?>
<footer id="colophon" class="site-footer full-row" role="contentinfo">
		<div class="site-info large-12 columns">
			<?php do_action( '_sf_credits' ); ?>
			<a href="http://wordpress.org/" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', '_sf' ); ?>" rel="generator"><?php printf( __( 'Powered by %s', '_s' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$SSecond Foundation by %2$s.', '_sf' ), '_Second Foundation', '<a href="http://ComplexWaveform.com/" rel="designer">Josh Pollock</a>' ); ?>
		</div><!-- .site-info -->
</footer><!-- #colophon -->