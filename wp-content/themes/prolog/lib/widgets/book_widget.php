<?php

add_action('widgets_init','register_prolog_book_widget');

function register_prolog_book_widget()
{
	register_widget('Prolog_Book_Widget');
}

class Prolog_Book_Widget extends WP_Widget{

	function Prolog_Book_Widget()
	{
		$this->WP_Widget( 'Prolog_book_widget','Book',array('description' => 'Add Your Book'));
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


		if($instance['book_img'])
		echo '<a href="'.$instance['book_img'].'" target="_blank"><img src="'. get_site_url() . $instance['book_img'].'" class="img-responsive" alt=""></a>';
		?>

		<div class="book_wrapper">
			<div class="media">	
				<div class="pull-right">
					<?php if($instance['book_download_link'])
						echo '<a class="btn-download" href="'.$instance['book_download_link'].'" target="_blank"><i class="fa fa-book"></i></a>';?>
				</div>

				<div class="media-body">
					<h3><?php if($instance['book_title']) echo $instance['book_title'];?></h3>
					<h4 class="sub-title"><?php if($instance['book_sub_title']) echo $instance['book_sub_title'];?></h4>
				</div>
			</div>

		</div>
		

		<?php echo $after_widget;
	}


	/*-------------------------------------------------------
	 *				Sanitize data, save and retrive
	 *-------------------------------------------------------*/

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		//Strip tags from title and name to remove HTML 
		$instance['title'] 					= strip_tags( $new_instance['title'] );
		$instance['book_img'] 				= $new_instance['book_img'];
		$instance['book_title'] 			= $new_instance['book_title'];
		$instance['book_sub_title'] 				= $new_instance['book_sub_title'];
		$instance['book_download_link'] 	= $new_instance['book_download_link'];						

		return $instance;
	}


	/*-------------------------------------------------------
	 *				Back-End display of widget
	 *-------------------------------------------------------*/
	
	function form( $instance )
	{

		$defaults = array(  'title' => '',
			'book_img' => '',
			'book_title' => '',
			'book_sub_title' => '',
			'book_download_link' => '#'
			);

		$instance = wp_parse_args( (array) $instance, $defaults );
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'book_img' ); ?>"><?php _e( 'Book Image URL', 'themeum' ); ?></label>
			<input type="hidden" id="<?php echo $this->get_field_id('book_img');?>" name="<?php echo $this->get_field_name('book_img');?>" class="<?php echo $this->get_field_id('book_img');?>" value="<?php echo $instance['book_img']; ?>"/>
 			<button id="<?php echo $this->get_field_id('book_img');?>" class="custom-upload button" data-url="<?php echo get_site_url(); ?>"><?php echo __('Upload image','themeum'); ?></button>
 			<img class="<?php echo $this->get_field_id('book_img');?>" src="<?php echo get_site_url() . $instance['book_img']; ?> "/>
		</p>
	

		<p>
			<label for="<?php echo $this->get_field_id( 'book_title' ); ?>"><?php _e( 'Book Title', 'themeum' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('book_title');?>" name="<?php echo $this->get_field_name('book_title'); ?>" value="<?php echo $instance['book_title']; ?>">
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'book_sub_title' ); ?>"><?php _e( 'Author Title', 'themeum' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('book_sub_title');?>" name="<?php echo $this->get_field_name('book_sub_title'); ?>" value="<?php echo $instance['book_sub_title']; ?>">
		</p>	
				
		<p>
			<label for="<?php echo $this->get_field_id( 'book_download_link' ); ?>"><?php _e( 'Dowbload Link', 'themeum' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('book_download_link');?>" name="<?php echo $this->get_field_name('book_download_link'); ?>" value="<?php echo $instance['book_download_link']; ?>">
		</p>		
	
		<?php
	}
}