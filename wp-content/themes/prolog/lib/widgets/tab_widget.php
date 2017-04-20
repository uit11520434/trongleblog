<?php

add_action('widgets_init','register_tab_widget');

function register_tab_widget()
{
	register_widget('Tab_Widget');
}

class Tab_Widget extends WP_Widget{

	function Tab_Widget()
	{
		$this->WP_Widget( 'tab_widget','Tab Widget',array('description' => 'Tab widget to display Popular, Latest posts and comments'));
	}


	/*-------------------------------------------------------
	 *				Front-end display of widget
	 *-------------------------------------------------------*/

	function widget($args, $instance)
	{
		extract($args);

		$title 			= apply_filters('widget_title', $instance['title'] );
		$popular_count 	= $instance['popular_count'];
		$latest_count 	= $instance['latest_count'];
		$comments_count = $instance['comments_count'];
		$tab1 			= $instance['tab1'];
		$tab2 			= $instance['tab2'];
		$tab3 			= $instance['tab3'];
		$tab1_title 	= $instance['tab1_title'];
		$tab2_title 	= $instance['tab2_title'];
		$tab3_title 	= $instance['tab3_title'];

		echo $before_widget;

		//if ( $title )
		//	echo $before_title . $title . $after_title;

		$popular 	= '';
		$latest 	= '';
		$comments 	= '';

		global $post;

		$args = array( 
			'orderby' => 'meta_value_num',
			'order' => 'DESC',
			'posts_per_page' => $popular_count,
			'meta_key' => '_post_views_count'
		);

		$posts = get_posts( $args );

		if(count($posts)>0){
			$popular .='<div class="tab-popular-posts">';

			foreach ($posts as $post): setup_postdata($post);
				$popular .='<div class="media">';

					if(has_post_thumbnail()):
						$popular .='<div class="pull-left">';
						$popular .='<a href="'.get_permalink().'">'.get_the_post_thumbnail($post->ID, 'xs-thumb', array('class' => 'img-responsive')).'</a>';
						$popular .='</div>';
					endif;

					$popular .='<div class="media-body">';
					$popular .= '<h3 class="entry-title"><a href="'.get_permalink().'">'. get_the_title() .'.</a></h3>';
					$popular .= '<div class="entry-meta small"><i class="fa fa-clock-o"></i> ' . get_the_time() . ' <i class="fa fa-calendar"></i> ' . get_the_date('d M Y') . '</div>';
					$popular .='</div>';

				$popular .='</div>';
			endforeach;

			wp_reset_query();

			$popular .='</div>';
		}


		$args = array( 'posts_per_page' => $latest_count);

		$posts = get_posts( $args );

		if(count($posts)>0){
			$latest .='<div class="tab-latest-posts">';

			foreach ($posts as $post): setup_postdata($post);
				$latest .='<div class="media">';

					if(has_post_thumbnail()):
						$latest .='<div class="pull-left">';
						$latest .='<a href="'.get_permalink().'">'.get_the_post_thumbnail($post->ID, 'xs-thumb', array('class' => 'img-responsive')).'</a>';
						$latest .='</div>';
					endif;

					$latest .='<div class="media-body">';
					$latest .= '<h4 class="entry-title"><a href="'.get_permalink().'">'. get_the_title() .'.</a></h4>';
					$latest .= '<div class="entry-meta small"><i class="fa fa-clock-o"></i> ' . get_the_time() . ' <i class="fa fa-calendar"></i> ' . get_the_date('d M Y') . '</div>';
					$latest .='</div>';

				$latest .='</div>';
			endforeach;

			wp_reset_query();

			$latest .='</div>';
		}


		//Latest Comments
		$args = array(
			'number' => $comments_count,
			'order' => 'DESC',
			'status' => 'approve'
		);

		$latest_comments = get_comments($args);


		if(count($posts)>0){
			$comments .='<div class="tab-latest-comments">';

			foreach ($latest_comments as $comment):
				$comments .='<div class="media">';

					$comments .='<div class="pull-left">';
					$comments .= '<a href="'.get_permalink( $comment->comment_post_ID ).'#comment-' . $comment->comment_ID . '">' . get_avatar( $comment->comment_author_email, 64 ) . '</a>';
					$comments .='</div>';
				
					$comments .='<div class="media-body">';
					$comments .= '<div class="entry-meta"><strong class="comment-author"><a href="'.get_permalink( $comment->comment_post_ID ).'#comment-' . $comment->comment_ID . '">'. $comment->comment_author .'.</a></strong> <span class="small comment-date"><i class="fa fa-clock-o"></i> ' . date('d M Y', strtotime($comment->comment_date)) . '</span></div>';
					$comments .= '<p class="comment-text">'. substr($comment->comment_content,0,60) .'...</p>';
					$comments .='</div>';

				$comments .='</div>';
			endforeach;

			$comments .='</div>';
		}

		//widget id
		$id = $widget_id;

		//Tab Titles
		$output ='<ul class="nav">';
		$output .='<li class="active"><a href="#' . $id . '-1" data-toggle="tab">' . $tab1_title . '</a></li>';
		$output .='<li><a href="#' . $id . '-2" data-toggle="tab">' . $tab2_title . '</a></li>';
		$output .='<li><a href="#' . $id . '-3" data-toggle="tab">' . $tab3_title . '</a></li>';
		$output .='</ul>';


		//Tab Contents
		if($tab1=='latest'){
			$tab1_content = $latest;
		} else if($tab1=='popular'){
			$tab1_content = $popular;
		} else {
			$tab1_content = $comments;
		}

		if($tab2=='latest'){
			$tab2_content = $latest;
		} else if($tab2=='popular'){
			$tab2_content = $popular;
		} else {
			$tab2_content = $comments;
		}

		if($tab3=='latest'){
			$tab3_content = $latest;
		} else if($tab3=='popular'){
			$tab3_content = $popular;
		} else {
			$tab3_content = $comments;
		}

		$output .='<div class="tab-content">';
		$output .='<div id="' . $id . '-1" class="tab-pane active fade in">' . $tab1_content . '</div>';
		$output .='<div id="' . $id . '-2" class="tab-pane fade">' . $tab2_content . '</div>';
		$output .='<div id="' . $id . '-3" class="tab-pane fade">' . $tab3_content . '</div>';
		$output .='</div>';

		echo $output;

		echo $after_widget;
	}


	function update( $new_instance, $old_instance )
	{
		$instance = $old_instance;

		$instance['title'] 			= strip_tags( $new_instance['title'] );
		$instance['popular_count'] 	= strip_tags( $new_instance['popular_count'] );
		$instance['latest_count'] 	= strip_tags( $new_instance['latest_count'] );
		$instance['comments_count'] = strip_tags( $new_instance['comments_count'] );
		$instance['tab1'] 			= strip_tags( $new_instance['tab1'] );
		$instance['tab1_title'] 	= strip_tags( $new_instance['tab1_title'] );
		$instance['tab2'] 			= strip_tags( $new_instance['tab2'] );
		$instance['tab2_title'] 	= strip_tags( $new_instance['tab2_title'] );
		$instance['tab3'] 			= strip_tags( $new_instance['tab3'] );
		$instance['tab3_title'] 	= strip_tags( $new_instance['tab3_title'] );

		return $instance;
	}


	function form($instance)
	{
		$defaults = array( 'title' => ' ',
			'popular_count' => 5, 'latest_count' => 5, 'comments_count' => 5,
			'tab1' => ' ', 'tab1_title' => 'Tab1',
			'tab2' => ' ', 'tab2_title' => 'Tab2',
			'tab3' => ' ', 'tab3_title' => 'Tab3' );
		$instance = wp_parse_args( (array) $instance, $defaults );
	?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e("Widget Title:",'themeum'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'popular_count' ); ?>"><?php _e("Popular Count:",'themeum'); ?></label>
			<input id="<?php echo $this->get_field_id( 'popular_count' ); ?>" name="<?php echo $this->get_field_name( 'popular_count' ); ?>" value="<?php echo $instance['popular_count']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'latest_count' ); ?>"><?php _e("Latest Count:",'themeum'); ?></label>
			<input id="<?php echo $this->get_field_id( 'latest_count' ); ?>" name="<?php echo $this->get_field_name( 'latest_count' ); ?>" value="<?php echo $instance['latest_count']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'comments_count' ); ?>"><?php _e("Comments Count:",'themeum'); ?></label>
			<input id="<?php echo $this->get_field_id( 'comments_count' ); ?>" name="<?php echo $this->get_field_name( 'comments_count' ); ?>" value="<?php echo $instance['comments_count']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'tab1' ); ?>"><?php _e("Tab1:",'themeum'); ?></label>
			<?php 
				$options = array(
					'popular' 	=> 'Popular',
					'latest' 	=> 'Latest', 
					'comments'	=> 'Comments'
					);
				if(isset($instance['tab1'])) $tab1 = $instance['tab1'];
			?>
			<select class="widefat" id="<?php echo $this->get_field_id( 'tab1' ); ?>" name="<?php echo $this->get_field_name( 'tab1' ); ?>">
				<?php
				$op = '<option value="%s"%s>%s</option>';
				foreach ($options as $key=>$value ) {

					if ($tab1 === $key) {
			            printf($op, $key, ' selected="selected"', $value);
			        } else {
			            printf($op, $key, '', $value);
			        }
			    }
				?>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'tab1_title' ); ?>"><?php _e("Tab1 Title:",'themeum'); ?></label>
			<input id="<?php echo $this->get_field_id( 'tab1_title' ); ?>" name="<?php echo $this->get_field_name( 'tab1_title' ); ?>" value="<?php echo $instance['tab1_title']; ?>" style="width:100%;" />
		</p><!--/tab1-->


		<p>
			<label for="<?php echo $this->get_field_id( 'tab2' ); ?>"><?php _e("Tab2",'themeum'); ?></label>
			<?php 
				$options = array(
					'popular' 	=> 'Popular',
					'latest' 	=> 'Latest', 
					'comments'	=> 'Comments'
					);
				if(isset($instance['tab2'])) $tab2 = $instance['tab2'];
			?>
			<select class="widefat" id="<?php echo $this->get_field_id( 'tab2' ); ?>" name="<?php echo $this->get_field_name( 'tab2' ); ?>">
				<?php
				$op = '<option value="%s"%s>%s</option>';
				foreach ($options as $key=>$value ) {

					if ($tab2 === $key) {
			            printf($op, $key, ' selected="selected"', $value);
			        } else {
			            printf($op, $key, '', $value);
			        }
			    }
				?>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'tab2_title' ); ?>"><?php _e("Tab2 Title:",'themeum'); ?></label>
			<input id="<?php echo $this->get_field_id( 'tab2_title' ); ?>" name="<?php echo $this->get_field_name( 'tab2_title' ); ?>" value="<?php echo $instance['tab2_title']; ?>" style="width:100%;" />
		</p><!--/Tab2-->


		<p>
			<label for="<?php echo $this->get_field_id( 'tab3' ); ?>"><?php _e("Tab3",'themeum'); ?></label>
			<?php 
				$options = array(
					'popular' 	=> 'Popular',
					'latest' 	=> 'Latest', 
					'comments'	=> 'Comments'
					);
				if(isset($instance['tab3'])) $tab3 = $instance['tab3'];
			?>
			<select class="widefat" id="<?php echo $this->get_field_id( 'tab3' ); ?>" name="<?php echo $this->get_field_name( 'tab3' ); ?>">
				<?php
				$op = '<option value="%s"%s>%s</option>';
				foreach ($options as $key=>$value ) {

					if ($tab3 === $key) {
			            printf($op, $key, ' selected="selected"', $value);
			        } else {
			            printf($op, $key, '', $value);
			        }
			    }
				?>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'tab3_title' ); ?>"><?php _e("Tab3 Title:",'themeum'); ?></label>
			<input id="<?php echo $this->get_field_id( 'tab3_title' ); ?>" name="<?php echo $this->get_field_name( 'tab3_title' ); ?>" value="<?php echo $instance['tab3_title']; ?>" style="width:100%;" />
		</p><!--/tab3-->

	<?php
	}
}