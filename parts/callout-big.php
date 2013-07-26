<?php
/**
 * 3 callout boxes in a regular row.
 *
 * @package geth
 * @since 0.1
 */
global $options;
?>
<div class="row" id="big-callout-row">
	<div class="large-12 columns" id="big-callout">
		<div class="row">
			<div class="large-3 columns large-offset-1" id="big-callout-image">
				<img src="<?php esc_html($options['big_callout_img']); ?>" />
			</div>
			<div class="large-6 columns">
				<h5 class="callout-title">
					<?php esc_textarea($options['big_callout_title']); ?>
				</h5>
				<?php esc_html($options['big_callout_content']); ?>
			</div>
		</div>
		<div class="row">
			<div class="large-2 columns" style=float:right;">
				<a href="<?php esc_html($options['big_callout_ctaLink']); ?>" class="button" id="cta-button">
					<?php esc_textarea($options['big_callout_ctaLabel']); ?>
				</a>
			</div>
		</div>
	</div>
</div>