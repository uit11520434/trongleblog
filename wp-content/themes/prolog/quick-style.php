<?php
header('Content-type: text/css');

$parse_uri = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
$wp_load = $parse_uri[0].'wp-load.php';
require_once($wp_load);

global $themeum_options;

$output = '';

if (isset($themeum_options['custom-preset-en']) && $themeum_options['custom-preset-en']) {
	$link_color = $themeum_options['link-color'];

	if(isset($link_color)){
		$output .= '.calender-date{ background-color: '. $link_color .'; }';
		$output .= '.navbar-main .dropdown-menu{ border-top: 3px solid '. $link_color .'; }';
		$output .= '.widget ul li a:hover{ border-left: 10px solid '. $link_color .'; }';
		$output .= '.entry-link h4, a, .comingsoon .social-share ul li a:hover, .format-link .entry-header, #comingsoon-countdown .countdown-period, .navbar-main .dropdown-menu > li:hover > a, .navbar-main .dropdown-menu > li.active > a, .navbar-main .dropdown-menu > li:focus > a, .navbar-main .dropdown-menu > li.current-menu-item > a, .navbar-main .dropdown-menu > li.current-menu-ancestor > a, .widget .nav > li.active > a, .widget .nav > li:hover > a, .widget.widget_mc4wp_widget .button i, .navbar-main .dropdown-menu>li>a:hover, .navbar-main .dropdown-menu>li>a:focus, .widget.widget_mc4wp_widget h3:before, .widget .tagcloud a:hover, .widget caption, .widget thead th, .footer-menu >li >a:hover{ color: '. $link_color .'; }';
		$output .= '.progress-bar, input[type="submit"], .subtitle, .single-post .post-navigation, .widget .nav, .book_wrapper a.btn-download, .btn-commom, .profile-tab ul.nav-tabs>li>a:hover, .profile-tab ul.nav-tabs>li.active>a, .profile-tab ul.nav-tabs>li.active>a:hover, .profile-tab ul.nav-tabs>li.active>a:focus, .pagination>.active>a, .pagination>.active>span, .pagination>.active>a:hover, .pagination>.active>span:hover, .pagination>.active>a:focus, .pagination>.active>span:focus, .pagination>li>a:hover, .pagination>li>span:hover, .pagination>li>a:focus, .pagination>li>span:focus, .widget h3.widget_title, .single-post .post-navigation .post-controller .previous-post a, .single-post .post-navigation .post-controller .next-post a, .post-content.media .post-format i, #searchform .btn-search, #blog-gallery-slider .carousel-control.left, #blog-gallery-slider .carousel-control.right{ background: '. $link_color .'; }';
	}

	if(isset($themeum_options['hover-color'])){
		$output .= 'a:hover, #navigation .navbar-main > li.current-menu-item > a, #navigation .navbar-main > li.current-menu-ancestor > a, #navigation .navbar-main > li.current-menu-parent > a, #navigation .navbar-main > li > a:hover, .post-content.media h2.entry-title a:hover{ color: '.$themeum_options['hover-color'] .'; }';
		$output .= '.btn-commom:hover{ background: '.$themeum_options['hover-color'] .'; }';
	}
}




$contentbg = $themeum_options['content-bg'];

if(isset($contentbg)){
	$output .= '.comment-list .comment-avartar:before{ border-color: transparent transparent' . $contentbg . 'transparent; }';
	$output .= '.archive-wrap, #respond textarea, #comments , .profile-tab .tab-content, .profile-tab ul.nav-tabs, #about-me .profile, .single-post .post-navigation ul.breadcrumb, .page #content article.post,.blog #content article.post, .archive #content article.post, .search-results #content article.status-publish, .single #content article.post{ background: '. $contentbg .'; }';
}


if(isset($themeum_options['sidebar-bg'])){
	$output .= '.widget .nav > li.active > a, .widget .nav > li:hover > a, .widget, .my-profile .profile-desc, #searchform input, .book_wrapper{ background: '.$themeum_options['sidebar-bg'] .'; }';
}

if(isset($themeum_options['header-bg'])){
	$output .= '.navbar.navbar-default{ background: '.$themeum_options['header-bg'] .'; }';
}

if ($themeum_options['header-fixed']){
	$output .= '#masthead.sticky{ position:fixed; z-index:99999;margin:0 auto 30px; width:100%;}';
	$output .= '#masthead.sticky .navbar.navbar-default{ background: rgba(255,255,255,.95); border-bottom:1px solid #f5f5f5}';
}

if(isset($themeum_options['header-margin-top'])){
	$output .= '.header{ margin-top: '.$themeum_options['header-margin-top'] .'; }';
}

if(isset($themeum_options['header-margin-bottom'])){
	$output .= '.header{ margin-bottom: '.$themeum_options['header-margin-bottom'] .'; }';
}

if(isset($themeum_options['footer-bg'])){
	$output .= '.footer{ background: '.$themeum_options['footer-bg'] .'; }';
}

if (isset($themeum_options['comingsoon-en']) && $themeum_options['comingsoon-en']) {
	$output .= "body {
		background: #fff;
		display: table;
		width: 100%;
		height: 100%;
		min-height: 100%;
	}";
}

if(isset($themeum_options['custom-css'])){
	$output .= $themeum_options['custom-css'];
}




echo $output;