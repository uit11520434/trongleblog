<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php global $themeum_options; ?>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
	<?php 

	if(isset($themeum_options['favicon'])){ ?>
		<link rel="shortcut icon" href="<?php echo $themeum_options['favicon']['url']; ?>" type="image/x-icon"/>
	<?php }else{ ?>
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri().'/images/plus.png' ?>" type="image/x-icon"/>
	<?php } ?>
	<link rel="stylesheet" type="text/css" href="">

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->

	<?php wp_head(); ?>
</head>

<body <?php body_class() ?>>
	<div id="page" class="hfeed site">
		<header id="masthead" class="site-header header" role="banner">
			<div class="container">
				<div id="navigation" class="navbar navbar-default">
                    <div class="row">
                        <div class="col-sm-3">
        					<div class="navbar-header">
        						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        							<span class="icon-bar"></span>
        							<span class="icon-bar"></span>
        							<span class="icon-bar"></span>
        						</button>
        	                    <a class="navbar-brand" href="<?php echo site_url(); ?>">
        	                    	<h1 class="logo-wrapper">
        		                    	<?php
        									if (isset($themeum_options['logo']))
        								   {
        								   		
        										if($themeum_options['logo-text-en']) {
        											echo $themeum_options['logo-text'];
        										}
        										else
        										{
        											if(!empty($themeum_options['logo'])) {
        											?>
        												<img class="enter-logo" src="<?php echo $themeum_options['logo']['url']; ?>" title="">
        											<?php
        											}else{
        												echo get_bloginfo('name');
        											}
        										}
        								   }
        									else
        								   {
        								    	echo get_bloginfo('name');
        								   }
        								?>
        		                    </h1>
        		                </a>
        					</div>
                        </div>

                        <div id="main-menu" class="col-sm-9">
                            <div class="hidden-xs">
                                <?php 
                                if ( has_nav_menu( 'primary' ) ) {
                                    wp_nav_menu(  array(
                                        'theme_location' => 'primary',
                                        'container'      => '', 
                                        'menu_class'     => 'nav navbar-nav navbar-main',
                                        'fallback_cb'    => 'wp_page_menu',
                                        'depth'          => 3,
                                        'walker'         => new wp_bootstrap_navwalker()
                                        )
                                    ); 
                                }
                                ?>
                            </div>
                        </div><!--/#main-menu-->

                        <div id="mobile-menu" class="visible-xs">
                            <div class="collapse navbar-collapse">
                                <?php 
                                if ( has_nav_menu( 'primary' ) ) {
                                    wp_nav_menu( array(
                                        'theme_location'      => 'primary',
                                        'container'           => false,
                                        'menu_class'          => 'nav navbar-nav',
                                        'fallback_cb'         => 'wp_page_menu',
                                        'depth'               => 3,
                                        'walker'              => new wp_bootstrap_mobile_navwalker()
                                        )
                                    ); 
                                }
                                ?>
                            </div>
                        </div><!--/.#mobile-menu-->

                    </div><!--/.row--> 
				</div><!--/.container--> 
			</div>
		</header><!--/#header-->

