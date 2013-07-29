<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package _sf
 */
?><!DOCTYPE html>
<?php do_action( 'tha_html_before' ); ?>
<html <?php language_attributes(); ?> >
    <!-- html contents -->
</div>
<head>
<?php do_action( 'tha_head_top' ); ?>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
 <?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>
<?php 
	do_action( 'tha_head_bottom' );
	wp_head(); 
?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<div id="main" class="site-main">
	<?php get_template_part('parts/top'); ?>
