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
		<div class="large-4 columns callout-box" id="callout-box-1">
			<h3 class="callout-title">
				<a href="<?php $options['3_callout_link_1'];  ?>">
					<?php echo $options['3_callout_title_1']; ?>
				</a>
			</h3>
				<?php echo $options['3_callout_content_1']; ?>
		</div>
		<div class="large-4 columns callout-box" id="callout-box-2">
			<h3 class="callout-title">
				<a href="<?php  $options['3_callout_link_2'];  ?>">
					<?php echo $options['3_callout_title_2']; ?>
				</a>
			</h3>
				<?php echo $options['3_callout_content_2']; ?>
		</div>
		<div class="large-4 columns callout-box" id="callout-box-3">
			<h3 class="callout-title">
				<a href="<?php $options['3_callout_link_3'];  ?>">
					<?php echo $options['3_callout_title_3']; ?>
				</a>
			</h3>
				<?php echo $options['3_callout_content_3']; ?>
		</div>
</div>
				