<?php
/**
 * Full-width top row at top of page. Shows menu inside of a full-width background iamge or slider.
 *
 * @package geth
 * @since 0.1
 */
?>
<header class="full-row" id="full-header">
<?php do_action( 'tha_header_top' ); ?>
		<hgroup class="large-8 columns large-centered" id="site-meta">
			<h1 class="site-title">Site Title</h1>
			<h2 class="site-description">Site Description ipsum noredium.</h2>
		</hgroup>
<?php do_action( 'tha_header_bottom' ); ?>
</header>