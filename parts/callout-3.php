<?php
/**
 * 3 callout boxes in a regular row.
 *
 * @package geth
 * @since 0.1
 */
global $options;
?>
<div class="row" id="callout-3-row">
		<div class="large-4 columns panel radius callout-box" id="callout-box-1">
			<h5 class="callout-title">
				<a href="<?php $options['3_callout_link_1'];  ?>">
					<?php echo $options['3_callout_title_1']; ?>
				</a>
			</h5>
				<?php echo $options['3_callout_content_1']; ?>
		</div>
		<div class="large-4 columns panel radius callout-box" id="callout-box-2">
			<h5 class="callout-title">
				<a href="<?php  $options['3_callout_link_2'];  ?>">
					<?php echo $options['3_callout_title_2']; ?>
				</a>
			</h5>
				<?php echo $options['3_callout_content_2']; ?>
		</div>
		<div class="large-4 columns panel radius callout-box" id="callout-box-3">
			<h5 class="callout-title">
				<a href="<?php $options['3_callout_link_3'];  ?>">
					<?php echo $options['3_callout_title_3']; ?>
				</a>
			</h5>
				<?php echo $options['3_callout_content_3']; ?>
		</div>
</div>
				