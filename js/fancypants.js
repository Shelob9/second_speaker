jQuery(document).ready(function($) {
	$(".fancybox")
		.attr('rel', 'gallery')
		.fancybox({
			openEffect  : 'elastic',
			closeEffect : 'fade',
			nextEffect  : 'none',
			prevEffect  : 'none',
			padding     : 0,
			autoCenter : true,
			minHeight: '80%',
			
		});
});