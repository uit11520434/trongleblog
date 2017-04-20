<?php

add_action('widgets_init','register_adsense_widget');

function register_adsense_widget()
{
	register_widget('Adsense_Widget');
}

class Adsense_Widget extends WP_Widget{

	function Adsense_Widget()
	{
		$this->WP_Widget( 'adsense_widget','Adsense Widgets',array('description' => 'This Adsense Widgets'));
	}


	/*-------------------------------------------------------
	 *				Front-end display of widget
	 *-------------------------------------------------------*/

 function widget( $args, $instance ) {
		extract( $args );

		//Our variables from the widget settings.
		$title = apply_filters('widget_title', $instance['title'] );

		echo $before_widget;

		if ( $title )
			echo $before_title . $title . $after_title;

			if($instance['adsense'])
				echo '<div class="google-adsense">'.$instance['adsense'].'</div>';

		echo $after_widget;
	}


	/*-------------------------------------------------------
	 *				Sanitize data, save and retrive
	 *-------------------------------------------------------*/

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		//Strip tags from title and name to remove HTML 
		$instance['title'] = strip_tags( $new_instance['title'] );

		$instance['adsense'] = $new_instance['adsense'];

		return $instance;
	}


	/*-------------------------------------------------------
	 *				Back-End display of widget
	 *-------------------------------------------------------*/
	
	function form( $instance )
	{

		$defaults = array(  'title' => '',
							'adsense' => ''
			);

		$instance = wp_parse_args( (array) $instance, $defaults );
	?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'adsense' ); ?>">Description:</label>
			<textarea class="widefat" id="<?php echo $this->get_field_id('adsense');?>" name="<?php echo $this->get_field_name('adsense'); ?>" style="height:150px;"><?php echo $instance['adsense']; ?></textarea> 
		</p>
	<?php
	}
}