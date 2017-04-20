<?php

/*-------------------------------------------------------------------
 *				Container Shortcodes
 *------------------------------------------------------------------*/

add_shortcode('themeum_container','themeum_container_shortcode');

function themeum_container_shortcode($atts,$content = null)
{
	$output = '';
	$output .= '<div class="row">';
	$output .= do_shortcode($content);
	$output .= '</div>';

	return $output;
}

/*-------------------------------------------------------------------
 *				Divider Shortcodes
 *------------------------------------------------------------------*/

add_shortcode( 'themeum_divider', function( $atts, $content= null ){

	$atts = shortcode_atts(
		array(
			'size'  => 'default'
			), $atts);

	extract($atts);

	return '<div class="clearfix ' . $size . ' "></div>';
});


/*-------------------------------------------------------------------
 *				Column Shortcodes
 *------------------------------------------------------------------*/

add_shortcode('themeum_column','themeum_column_shortcode');

function themeum_column_shortcode( $atts, $content = null)
{
	extract(shortcode_atts(array( 'col'=> 'col-md-12' ),$atts));

	$col_val = 	array(	
		'1' 	=> 'col-sm-12',
		'1/2' 	=> 'col-sm-6', 
		'1/3' 	=> 'col-sm-4', 
		'1/4' 	=> 'col-sm-3', 
		'2/3' 	=> 'col-sm-8', 
		'3/4' 	=> 'col-sm-9'
		);

	$output = '';
	$output .= '<div class="'.$col_val[$col].'">';
	$output .= do_shortcode($content);
	$output .= '</div>';

	return $output;
}

/*-------------------------------------------------------------------
 *				Divider Shortcodes
 *------------------------------------------------------------------*/

add_shortcode('themeum_button', 'themeum_button_shortcode');

function themeum_button_shortcode($atts, $content = null)
{
	extract(shortcode_atts(array( 'size' => '', 'type' => '', 'url' => '', 'text' => 'Button'),$atts));

	$output = '';

	if(!$url):
		$output .= ' <button type="button" class="btn btn-'.$type.' btn-'.$size.' ">'.$text.'</button>';
	else:
		$output .= '<a href="'.$url.'" class="btn btn-'.$type.' btn-'.$size.'" role="button">'.$text.'</a>';
	endif;

	return $output;
}

/*-------------------------------------------------------------------
 *				Alert Shortcodes
 *------------------------------------------------------------------*/

add_shortcode('themeum_alert','themeum_alert_shortcode');

function themeum_alert_shortcode( $atts, $content = null )
{
	extract(shortcode_atts(array( 'close' => '', 'type' => '', 'title' => ''),$atts));

	$close_class = '';

	if($close == 'yes')
	{
		$close_class = 'alert-dismissable';
	}

	$output = '';
	$output .= '<div class="alert alert-'.$type.' '.$close_class.'">';

	if($close == 'yes'):
		$output .= '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
	endif;

	if($title):
		$output .= '<strong>'.$title.'</strong>';
	endif;

	$output .= '<p>'.do_shortcode($content).'</p>';
	$output .= '</div>';

	return $output;
}

/*-------------------------------------------------------------------
 *				Skill Shortcodes
 *------------------------------------------------------------------*/

function themeum_skill_shortcode($atts, $content = null) {
	extract(shortcode_atts(
        array(
				'width' => '80',
				'label' => ''
    ), $atts));

    $output = '';
    $output .= '<div class="single-skill">';
    $output .= '<span>'.$label.'<span class="badge pull-right">'.$width.'%</span></span>';
	$output .= '<div class="progress">';
	$output .= '<div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="'.$width.'" aria-valuemin="0" aria-valuemax="100" style="width:'.$width.'%"><span class="sr-only">'.$width.' Complete</span></div>';
	$output .= '</div>';
	$output .= '</div>';
	return $output;
}

add_shortcode('themeum_skill', 'themeum_skill_shortcode');

/*-------------------------------------------------------------------
 *				Tab Shortcodes
 *------------------------------------------------------------------*/

add_shortcode('themeum_tabs','themeum_tabs_shortcode');

function themeum_tabs_shortcode( $atts, $content = null)
{
	return '<div class="sportson-tab">'.do_shortcode($content).'</div>';
}


add_shortcode('tab_nav','tab_nav_shortcode');

function tab_nav_shortcode( $atts, $content = null )
{
	extract(shortcode_atts(array(),$atts));

	$output = '';

	$output .= '<ul class="nav nav-tabs">';

	$i = 1;

	foreach($atts as $key => $value){

		$active = '';

		if ($i == 1) {
			$active = 'class="active"';
		}
		$output .= '<li '.$active.'><a href="#'.$key.'" data-toggle="tab">'.$value.'</a></li>';

		$i++;
	}

	$output .= '</ul>';
	$output .= '<div class="tab-content">';
	$output .= do_shortcode($content);
	$output .= '</div>';

	return $output;
}


add_shortcode('tab_text','tab_text_shortcode');

function tab_text_shortcode($atts, $content = null)
{
	extract(shortcode_atts(array( 'id' => ''),$atts));

	$output = '';

	$active = '';

	if($id == "title11")
	{
		$active = 'in active';
	}

	$output .= '<div class="tab-pane fade '.$active.'" id="'.$id.'">';
	$output .= do_shortcode($content);
	$output .= '</div>';

	return $output;
}


/*-------------------------------------------------------------------
 *				Accordion Shortcodes
 *------------------------------------------------------------------*/

add_shortcode('themeum_accordion','themeum_accordion_shortcode');

function themeum_accordion_shortcode( $atts, $content = null )
{
	$output = '';
	$output .= '<div id="accordion" class="panel-group">';
	$output .= do_shortcode($content);
	$output .='</div>';

	return $output;
}

add_shortcode('themeum_collaps','themeum_collaps_shortcode');

function themeum_collaps_shortcode( $atts, $content = null )
{
	extract(shortcode_atts(array( 'title' => '', 'id' => ''),$atts));

	$output = '';
	$output .= '';

	$acc_class = '';

	if( $id  == 'id11' ){
		$acc_class = 'in';
	}

	$output .= '<div class="panel panel-default">';
	$output .= '<div class="panel-heading">';
	$output .= '<h4 class="panel-title">';
	$output .= '<a data-toggle="collapse" data-parent="#accordion" href="#'.$id.'">'.$title.'</a>';
	$output .= '</h4>';
	$output .= '</div>';
	$output .= '<div id="'.$id.'" class="panel-collapse collapse '.$acc_class.'">';
	$output .= '<div class="panel-body">'.do_shortcode($content).'</div>';
	$output .= '</div>';
	$output .= '</div>';
	
	return $output;
}