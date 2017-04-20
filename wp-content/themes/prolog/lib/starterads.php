<?php

add_action( 'admin_notices', 'starter_ads' );
function starter_ads()
{
	$output = '<a href="https://www.themeum.com/wordpress/themes/starter-pro-responsive-onepage-wordpress-theme/"><img style="max-width:100%;" src="http://demo.themeum.com/demo-image/starter-ads-large.jpg"></a>';

	add_settings_error('starter_ads', esc_attr( 'settings_updated' ), $output, 'notice-warning');

	settings_errors( 'starter_ads' );
}
