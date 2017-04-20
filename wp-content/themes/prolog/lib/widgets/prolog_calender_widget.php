<?php
add_action('widgets_init','register_prolog_calender_widget'); 

function register_prolog_calender_widget()
{
	register_widget('Prolog_Calender_Widget');
}

class Prolog_Calender_Widget extends WP_Widget {

	function Prolog_Calender_Widget()
	{
		$this->WP_Widget( 'Prolog_calender_widget','Prolog Calender',array('description' => 'Prolog Calendar Widget'));
	}

	function widget( $args, $instance ) {
		extract($args);

		/** This filter is documented in wp-includes/default-widgets.php */
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

		echo $before_widget;
		if ( $title )
			echo $before_title . $title . $after_title;
		?>
		<time class="calender-date">
			<span class="day"><?php echo date('l'); ?></span>
			<span class="month"><?php echo date('d, M'); ?></span>
		</time>
		
		<?php 
		echo '<div id="calendar_wrap">';
		get_calendar();
		echo '</div>';
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);

		return $instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
		$title = strip_tags($instance['title']);
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','themeum'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>		

		<?php
	}
}