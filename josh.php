<?php
/**
/*
 * Template Name: Josh Page
 */
get_header(); 
$sidebar = get_theme_mod('_sf_default_sidebar');
_sf_open($sidebar);

function _sfSite_imgThing($id, $alt, $size) {
	$img = wp_get_attachment_image_src($id, $size);
	echo '<img src="'.$img[0].'" width="'.$img[1].'" height="'.$img[2].'" alt="'.$alt.'" />';
}

?>
<?php do_action( 'tha_entry_before' ); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php do_action( 'tha_entry_top' ); ?>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->
		
	<div class="entry-content">
		<div class="row">
			<div class="large-8 columns josh" id="about-josh">
				<p>I am a student of environmental studies, writer and WordPress guy. My master’s thesis is on practical sustainable design and is almost complete. I co-host a podcast called Ecohyphen, which is a light-hearted look at sustainability and Eco-philosophy. I do WordPress site setup, management and theme customization. My long-term goals are to develop social media tools for promoting sustainability via empathy and community building instead of guilt and fear and to be a perpetual student.
				</p>
				<div class="row">
					<div class="large-4 columns large-offset-2">
						<a target="_blank" href="http://complexwaveform.com/jp/resume/" title="Josh Pollock's Resume">Resume</a>
					</div>
					<div class="large-4 columns large-offset-2">
						<a target="_blank" href="http://complexwaveform.com/" title="Josh Pollock's Website">Wesbite</a>
					</div>
				</div>
			</div>
			<div class="large-4 columns josh" id="hs-josh">
				<?php $size='medium'; _sfSite_imgThing(118, 'Josh Pollock Headshot', $size); ?>
			</div>
		</div>
		<div class="row">
			<div class="large-4 columns josh">
				<a target="_blank" href="http://tiny.cc/YesIHaveHuggedATreeToday" title='Yes, I Have Hugged A Tree Today'>
					<?php _sfSite_imgThing(116, 'Yes, I Have Hugged A Tree Today Logo', $size); ?>
				</a>
			</div>
			<div class="large-4 columns josh">
				<a target="_blank" href="http://ecohyphen.com" title='Ecohyphen'>
					<?php _sfSite_imgThing(117, 'Ecohyphen Logo', $size); ?>
				</a>
			</div>
			
			<div class="large-4 columns josh">
				<a target="_blank" href="http://twitter.com/Josh412" title='Josh Pollock On Twitter'>
					<?php _sfSite_imgThing(115, 'Twitter Logo', $size); ?>
				</a>
			</div>
		</div>




	</div><!-- .entry-content -->
	<?php edit_post_link( __( 'Edit', '_sf' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
<?php do_action( 'tha_entry_bottom' ); ?>
</article><!-- #post-## -->
<?php do_action( 'tha_entry_after' ); ?>

<?php _sf_close($sidebar); ?>
