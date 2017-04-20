<?php get_header('alternative'); 
/*
*Template Name: 404 Page Template
*/
?>

<div class="content-404">
	<h1><?php _e( '404','themeum');?> </h1>
	<h2><?php _e( 'Page Not Found', 'themeum' ); ?></h2>
	<a class="btn btn-lg btn-commom" href="<?php echo site_url(); ?>"><?php _e( 'Back to Homepage', 'themeum' ); ?></a>
</div>

<?php get_footer('alternative'); ?>
