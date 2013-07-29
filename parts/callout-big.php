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
	<div class="large-12 columns callout-box" id="big-callout">
		<div class="row">
			<div class="large-4 columns" id="big-callout-image">
				<h3 class="callout-title">
					<?php echo $options['big_callout_title'] ?>
				</h3>
				<img src="<?php echo $options['big_callout_img']; ?>" />
				<div class="row">
					<div id="cta-button-container" class="large-8 small-centered large-centered columns" >
						<a href="<?php $options['big_callout_ctaLink']; ?>" class="button radius" id="cta-button">
							<?php echo $options['big_callout_ctaLabel']; ?>
						</a>
					</div>
				</div>
			</div>
			<div class="large-6 columns">
				<?php echo $options['big_callout_content']; ?>
			</div>
		</div>	
	</div>
</div>