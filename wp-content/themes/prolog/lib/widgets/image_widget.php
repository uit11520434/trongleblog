<?php

add_action('widgets_init','register_prolog_image_widget');

function register_prolog_image_widget()
{
	register_widget('Prolog_Image_Widget');
}

class Prolog_Image_Widget extends WP_Widget{

	function Prolog_Image_Widget()
	{
		$this->WP_Widget( 'prolog_image_widget','Image Ads',array('description' => 'This Image Ads Widgets'));
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

		?>

		<div class="single-ads">
			<?php	if($instance['ads_img1'])
			echo '<a href="'.$instance['ads_img_link1'].'" target="_blank"><img src="'. get_site_url() . $instance['ads_img1'].'" class="img-responsive" alt=""></a>';
			?>
		</div>




		<ul class="double-ads">
			<?php 
				if($instance['ads_img2'])
				echo '<li><a href="'.$instance['ads_img_link2'].'" target="_blank"><img src="'. get_site_url() . $instance['ads_img2'].'" class="img-responsive" alt=""></a></li>';				
				if($instance['ads_img3'])
				echo '<li><a href="'.$instance['ads_img_link3'].'" target="_blank"><img src="'. get_site_url() . $instance['ads_img3'].'" class="img-responsive" alt=""></a></li>';			
			?>		

			<?php 
				if($instance['ads_img4'])
				echo '<li><a href="'.$instance['ads_img_link4'].'" target="_blank"><img src="'. get_site_url() . $instance['ads_img4'].'" class="img-responsive" alt=""></a></li>';		
		
				if($instance['ads_img5'])
				echo '<li><a href="'.$instance['ads_img_link5'].'" target="_blank"><img src="'. get_site_url() . $instance['ads_img5'].'" class="img-responsive" alt=""></a></li>';		
			?>
		</ul>

		<?php echo $after_widget;
	}


	/*-------------------------------------------------------
	 *				Sanitize data, save and retrive
	 *-------------------------------------------------------*/

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		//Strip tags from title and name to remove HTML 
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['ads_img_link1'] 		= $new_instance['ads_img_link1'];
		$instance['ads_img1'] 	= $new_instance['ads_img1'];
		$instance['ads_img_link2'] 		= $new_instance['ads_img_link2'];
		$instance['ads_img2'] 	= $new_instance['ads_img2'];		
		$instance['ads_img_link3'] 		= $new_instance['ads_img_link3'];
		$instance['ads_img3'] 	= $new_instance['ads_img3'];
		$instance['ads_img_link4'] 		= $new_instance['ads_img_link4'];
		$instance['ads_img4'] 	= $new_instance['ads_img4'];			
		$instance['ads_img_link5'] 		= $new_instance['ads_img_link5'];
		$instance['ads_img5'] 	= $new_instance['ads_img5'];		

		return $instance;
	}


	/*-------------------------------------------------------
	 *				Back-End display of widget
	 *-------------------------------------------------------*/
	
	function form( $instance )
	{

		$defaults = array(  'title' => '',
			'ads_img_link1' => '#',
			'ads_img1' => '',
			'ads_img_link2' => '#',
			'ads_img2' => '',
			'ads_img_link3' => '#',
			'ads_img3' => '',
			'ads_img_link4' => '#',
			'ads_img4' => '',
			'ads_img_link5' => '#',
			'ads_img5' => ''
			);
		$instance = wp_parse_args( (array) $instance, $defaults );
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'ads_img_link1' ); ?>"><?php _e( 'Ads Link', 'themeum' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('ads_img_link1');?>" name="<?php echo $this->get_field_name('ads_img_link1'); ?>" value="<?php echo $instance['ads_img_link1']; ?>">
			

			<label for="<?php echo $this->get_field_id( 'ads_img1' ); ?>"><?php _e( 'Ads Image URL', 'themeum' ); ?></label>

			<input type="hidden" id="<?php echo $this->get_field_id('ads_img1');?>" name="<?php echo $this->get_field_name('ads_img1');?>" class="<?php echo $this->get_field_id('ads_img1');?>" value="<?php echo $instance['ads_img1']; ?>"/>
 			<button id="<?php echo $this->get_field_id('ads_img1');?>" class="custom-upload button" data-url="<?php echo get_site_url(); ?>"><?php echo __('Upload image','themeum'); ?></button>
 			<img class="<?php echo $this->get_field_id('ads_img1');?>" src="<?php echo get_site_url() . $instance['ads_img1']; ?> "/>
		</p>
	

		<p>
			<label for="<?php echo $this->get_field_id( 'ads_img_link2' ); ?>"><?php _e( 'Ads Link', 'themeum' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('ads_img_link2');?>" name="<?php echo $this->get_field_name('ads_img_link2'); ?>" value="<?php echo $instance['ads_img_link2']; ?>">
			

			<label for="<?php echo $this->get_field_id( 'ads_img2' ); ?>"><?php _e( 'Ads Image URL', 'themeum' ); ?></label>

			<input type="hidden" id="<?php echo $this->get_field_id('ads_img2');?>" name="<?php echo $this->get_field_name('ads_img2');?>" class="<?php echo $this->get_field_id('ads_img2');?>" value="<?php echo $instance['ads_img2']; ?>"/>
 			<button id="<?php echo $this->get_field_id('ads_img2');?>" class="custom-upload button" data-url="<?php echo get_site_url(); ?>"><?php echo __('Upload image','themeum'); ?></button>
 			<img class="<?php echo $this->get_field_id('ads_img2');?>" src="<?php echo get_site_url() . $instance['ads_img2']; ?> "/>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'ads_img_link3' ); ?>"><?php _e( 'Ads Link', 'themeum' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('ads_img_link3');?>" name="<?php echo $this->get_field_name('ads_img_link3'); ?>" value="<?php echo $instance['ads_img_link3']; ?>">
			

			<label for="<?php echo $this->get_field_id( 'ads_img3' ); ?>"><?php _e( 'Ads Image URL', 'themeum' ); ?></label>

			<input type="hidden" id="<?php echo $this->get_field_id('ads_img3');?>" name="<?php echo $this->get_field_name('ads_img3');?>" class="<?php echo $this->get_field_id('ads_img3');?>" value="<?php echo $instance['ads_img3']; ?>"/>
 			<button id="<?php echo $this->get_field_id('ads_img3');?>" class="custom-upload button" data-url="<?php echo get_site_url(); ?>"><?php echo __('Upload image','themeum'); ?></button>
 			<img class="<?php echo $this->get_field_id('ads_img3');?>" src="<?php echo get_site_url() . $instance['ads_img3']; ?> "/>
		</p>			

		<p>
			<label for="<?php echo $this->get_field_id( 'ads_img_link4' ); ?>"><?php _e( 'Ads Link', 'themeum' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('ads_img_link4');?>" name="<?php echo $this->get_field_name('ads_img_link4'); ?>" value="<?php echo $instance['ads_img_link4']; ?>">
			

			<label for="<?php echo $this->get_field_id( 'ads_img4' ); ?>"><?php _e( 'Ads Image URL', 'themeum' ); ?></label>

			<input type="hidden" id="<?php echo $this->get_field_id('ads_img4');?>" name="<?php echo $this->get_field_name('ads_img4');?>" class="<?php echo $this->get_field_id('ads_img4');?>" value="<?php echo $instance['ads_img4']; ?>"/>
 			<button id="<?php echo $this->get_field_id('ads_img4');?>" class="custom-upload button" data-url="<?php echo get_site_url(); ?>"><?php echo __('Upload image','themeum'); ?></button>
 			<img class="<?php echo $this->get_field_id('ads_img4');?>" src="<?php echo get_site_url() . $instance['ads_img4']; ?> "/>
		</p>		

		<p>
			<label for="<?php echo $this->get_field_id( 'ads_img_link5' ); ?>"><?php _e( 'Ads Link', 'themeum' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('ads_img_link5');?>" name="<?php echo $this->get_field_name('ads_img_link5'); ?>" value="<?php echo $instance['ads_img_link5']; ?>">
			

			<label for="<?php echo $this->get_field_id( 'ads_img5' ); ?>"><?php _e( 'Ads Image URL', 'themeum' ); ?></label>

			<input type="hidden" id="<?php echo $this->get_field_id('ads_img5');?>" name="<?php echo $this->get_field_name('ads_img5');?>" class="<?php echo $this->get_field_id('ads_img5');?>" value="<?php echo $instance['ads_img5']; ?>"/>
 			<button id="<?php echo $this->get_field_id('ads_img5');?>" class="custom-upload button" data-url="<?php echo get_site_url(); ?>"><?php echo __('Upload image','themeum'); ?></button>
 			<img class="<?php echo $this->get_field_id('ads_img5');?>" src="<?php echo get_site_url() . $instance['ads_img5']; ?> "/>
		</p>		



		<?php
	}
}