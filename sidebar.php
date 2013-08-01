<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package _sf
 */
?>
<?php 
	do_action( 'tha_sidebars_before' );
	$sidebar = get_theme_mod('_sf_default_sidebar');
	_sf_sidebar_starter($sidebar);
	do_action( 'tha_sidebar_top' );
?>
	<?php do_action( 'before_sidebar' ); ?>
		<aside  class="widget widget_search">
			<?php get_search_form(); ?>
		</aside>
		
		<aside id="a2-box">
			<div class="row">
				<div class=" small-12 columns">
					<h5 class="widget-title">
						<a href="<a href="http://www.a2hosting.com/3966-0-1-147.html" target="_blank">Recommended Host:<br /> a2 Web Hosting</a>
					</h5>
					<p class="why"><a href="<?php echo get_permalink(81); ?>" >Why?</a></p>
				</div>
			
				<div class=" small-12 columns">
					<a href="http://www.a2hosting.com/3966-0-1-147.html" target="_blank"><img style="border:0px" src="https://affiliates.a2hosting.com/banners/250X250-2.png" width="250"  height="250" alt=""></a>
				</div>
				
			</div>
		</aside>
		<aside id="wpengine-box">
			<div class="row">
				<div class=" small-12 columns">
					<h5 class="widget-title">
						<a href="a target="_blank" href="http://www.shareasale.com/r.cfm?b=407413&u=819277&m=41388&urllink=&afftrack=">Recommended Managed Host:<br /> wpEngine</a>
					</h5>
					<p class="why"><a href="<?php echo get_permalink(82); ?>" >Why?</a></p>
				</div>
			</div>
			<div class="row">
				<div class=" small-12 columns">
			<a target="_blank" href="http://www.shareasale.com/r.cfm?b=407413&u=819277&m=41388&urllink=&afftrack="><img src="http://www.shareasale.com/image/41388/WPE_New_250x250.jpg"  width="250"  height="250" border="0"></a>
				</div>
			</div>
		</aside>
		<aside id="maxCDN-box">
			<div class="row">
				<div class=" small-12 columns">
					<h5 class="widget-title">
						<a href="http://www.jdoqocy.com/click-7167636-11373448" target="_blank">Recommended CDN:<br /> Max CDN</a>
					</h5>
					<p class="why"><a href="<?php echo get_permalink(83); ?>" >Why?</a></p>
				</div>
			</div>
			<div class="row">
				<div class=" small-12 columns">
			<a href="http://www.jdoqocy.com/click-7167636-11373448" target="_blank">
<img src="http://www.awltovhc.com/image-7167636-11373448" width="250" height="250" alt="" border="0"/></a>
				</div>
			</div>
		</aside>
	
		
			


	<?php do_action( 'tha_sidebar_bottom' ); ?>
	</aside><!-- #secondary -->
<?php do_action( 'tha_sidebars_after' ); ?>