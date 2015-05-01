<?php
	/**********************************************************************
	***********************************************************************
	LEX WIDGETS
	**********************************************************************/

/******************************************************** 
Lex Text Widget
********************************************************/
class Lex_Text extends WP_Widget {
	public function __construct() {
		parent::__construct('lex_text', __('Lex Text','lex'), array('description' =>__('Lex Text Widget','lex') ));
	}
	public function widget( $args, $instance ) {
		extract($args);
		$title = empty( $instance['title'] ) ?  __('Lex Text','lex') : $instance['title'];
		$text = empty( $instance['text'] ) ? '' : $instance['text'];

		echo $before_widget.
				$before_title.$title.$after_title.
				'<p>'.$text.'</p>'.
			 $after_widget;	
	}
 	public function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '' ) );
		
		$title = esc_attr( $instance['title'] );
		$text = esc_attr( $instance['text'] );

		echo '<p><label for="'.esc_attr($this->get_field_id('title')).'">'.__( 'Title:', 'lex' ).'</label>';
		echo '<input type="text" class="widefat" id="'.esc_attr($this->get_field_id('title')).'"  name="'.esc_attr($this->get_field_name('title')).'" value="'.$title.'"></p>';		
		
		echo '<p><label for="'.esc_attr($this->get_field_id('text')).'">'.__( 'Text:', 'lex' ).'</label>';
		echo '<textarea class="widefat" id="'.esc_attr($this->get_field_id('text')).'"  name="'.esc_attr($this->get_field_name('text')).'">'.$text.'</textarea></p>';
	}
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		$instance['text'] = $new_instance['text'];
		return $instance;	
	}	
}

/******************************************************** 
Lex Social Widget
********************************************************/
class Lex_Social extends WP_Widget {
	public function __construct() {
		parent::__construct('lex_social', __('Lex Social','lex'), array('description' =>__('Lex Social Widget','lex') ));
	}
	public function widget( $args, $instance ) {
		extract($args);
		$title = empty( $instance['title'] ) ? __('Lex Social','lex') : esc_attr( $instance['title'] );
		$twitter = empty( $instance['twitter'] ) ? '' : '<a href="'.esc_url( $instance['twitter'] ).'"><i class="fa fa-twitter-square"></i></a>';
		$facebook = empty( $instance['facebook'] ) ? '' : '<a href="'.esc_url( $instance['facebook'] ).'"><i class="fa fa-facebook-square"></i></a>';
		$google = empty( $instance['google'] ) ? '' : '<a href="'.esc_url( $instance['google'] ).'"><i class="fa fa-google-plus-square"></i></a>';
		$instagram = empty( $instance['instagram'] ) ? '' : '<a href="'.esc_url( $instance['instagram'] ).'"><i class="fa fa-instagram-square"></i></a>';
		
		echo $before_widget.
				$before_title.$title.$after_title.
				'<div class="social in-widget text-left">
					'.$twitter.'						
					'.$facebook.'						
					'.$google.'						
					'.$instagram.'					
				</div>'.
			$after_widget;
	}
 	public function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'twitter' => '', 'facebook' => '', 'google' => '', 'instagram' => '' ) );
		
		$title = esc_attr( $instance['title'] );
		$twitter = esc_attr( $instance['twitter'] );
		$facebook = esc_attr( $instance['facebook'] );
		$google = esc_attr( $instance['google'] );
		$instagram = esc_attr( $instance['instagram'] );
		
		echo '<p><label for="'.esc_attr($this->get_field_id('title')).'">'.__( 'Title:', 'lex' ).'</label>';
		echo '<input type="text" class="widefat" id="'.esc_attr($this->get_field_id('title')).'"  name="'.esc_attr($this->get_field_name('title')).'" value="'.$title.'"></p>';
		
		echo '<p><label for="'.esc_attr($this->get_field_id('twitter')).'">'.__( 'Twitter page link:', 'lex' ).'</label>';
		echo '<input type="text" class="widefat" id="'.esc_attr($this->get_field_id('twitter')).'"  name="'.esc_attr($this->get_field_name('twitter')).'" value="'.$twitter.'"></p>';
				
		echo '<p><label for="'.esc_attr($this->get_field_id('facebook')).'">'.__( 'Facebook page link:', 'lex' ).'</label>';
		echo '<input type="text" class="widefat" id="'.esc_attr($this->get_field_id('facebook')).'"  name="'.esc_attr($this->get_field_name('facebook')).'" value="'.$facebook.'"></p>';
				
		echo '<p><label for="'.esc_attr($this->get_field_id('google')).'">'.__( 'Google+ page link:', 'lex' ).'</label>';
		echo '<input type="text" class="widefat" id="'.esc_attr($this->get_field_id('google')).'"  name="'.esc_attr($this->get_field_name('google')).'" value="'.$google.'"></p>';				
		
		echo '<p><label for="'.esc_attr($this->get_field_id('instagram')).'">'.__( 'Instagram page link:', 'lex' ).'</label>';
		echo '<input type="text" class="widefat" id="'.esc_attr($this->get_field_id('instagram')).'"  name="'.esc_attr($this->get_field_name('instagram')).'" value="'.$instagram.'"></p>';
	}
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		$instance['twitter'] = $new_instance['twitter'];
		$instance['facebook'] = $new_instance['facebook'];
		$instance['google'] = $new_instance['google'];
		$instance['instagram'] = $new_instance['instagram'];
		return $instance;	
	}	
}

/******************************************************** 
Lex Archives Widget
********************************************************/
class Lex_Archives extends WP_Widget {
	public function __construct() {
		parent::__construct('lex_archives', __('Lex Archives','lex'), array('description' =>__('Lex Archives Widget','lex') ));
	}
	public function widget( $args, $instance ) {
		extract($args);
		$title = empty( $instance['title'] ) ? __('Lex Archives','lex') : $instance['title'];
		
		echo $before_widget.
				$before_title.$title.$after_title.
				'<ul class="list-unstyled">';
					wp_get_archives( array( 'type' => 'monthly' ) );
		echo	'</ul>'.$after_widget;	
	}
 	public function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
		
		$title = esc_attr( $instance['title'] );
		
		echo '<p><label for="'.esc_attr($this->get_field_id('title')).'">'.__( 'Title:', 'lex' ).'</label>';
		echo '<input type="text" class="widefat" id="'.esc_attr($this->get_field_id('title')).'"  name="'.esc_attr($this->get_field_name('title')).'" value="'.$title.'"></p>';
	}
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		return $instance;	
	}	
}


/******************************************************** 
Lex Latest Comments
********************************************************/
class Lex_Latest_Comments extends WP_Widget {
	public function __construct() {
		parent::__construct('lex_latest_comments', __('Lex Latest Comments','lex'), array('description' =>__('Lex Latest Comments Widget','lex') ));
	}
	public function widget( $args, $instance ) {
		extract($args);
		$title = empty( $instance['title'] ) ? __('Lex Latest Comments','lex') : $instance['title'];
		$count = empty( $instance['count'] ) ? '' : $instance['count'];
		
		$args = array(
			'number' => $count,
			'status' => 'approve',
			'orderby' => 'date',
			'order' => 'DESC',	
			'post_type' => 'post',
		);
		$recent_comments = get_comments( $args );
		
		echo $before_widget.
				$before_title.$title.$after_title.
				'<ul class="list-unstyled">';
					if( !empty( $recent_comments ) ){
						foreach( $recent_comments as $comment ){
							$post = get_post( $comment->comment_post_ID );
							echo '	<li>
										<a href="'.get_permalink( $post->ID  ).'">'.$post->post_title.'<br>
										<small>'.$comment->comment_author .' '. human_time_diff( strtotime( $comment->comment_date ), time() ) . __( ' ago', 'lex' ) .'</small></a>
									</li>';
						}
					}
		echo	'</ul>'.$after_widget;	
	}
 	public function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'count' => '' ) );
		
		$title = esc_attr( $instance['title'] );
		$count = esc_attr( $instance['count'] );
		
		echo '<p><label for="'.esc_attr($this->get_field_id('title')).'">'.__( 'Title:', 'lex' ).'</label>';
		echo '<input type="text" class="widefat" id="'.esc_attr($this->get_field_id('title')).'"  name="'.esc_attr($this->get_field_name('title')).'" value="'.$title.'"></p>';
		
		echo '<p><label for="'.esc_attr($this->get_field_id('count')).'">'.__( 'Count:', 'lex' ).'</label>';
		echo '<input type="text" class="widefat" id="'.esc_attr($this->get_field_id('count')).'"  name="'.esc_attr($this->get_field_name('count')).'" value="'.$count.'"></p>';		
		
	}
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		$instance['count'] = $new_instance['count'];
		return $instance;	
	}	
}

/******************************************************** 
Lex Tags
********************************************************/
class Lex_Tags extends WP_Widget {
	public function __construct() {
		parent::__construct('lex_tags', __('Lex Tags','lex'), array('description' =>__('Lex Tags Widget','lex') ));
	}
	public function widget( $args, $instance ) {
		extract($args);
		$title = empty( $instance['title'] ) ? __('Lex Tags','lex') : $instance['title'];
		
		echo $before_widget.
				$before_title.$title.$after_title.
				'<ul class="tags list-unstyled list-inline">';
					echo '<li>';
					$args = array(
						'smallest' 	=> '11',
						'largest' 	=> '18',
						'unit'		=> 'px',
						'separator' => '</li> <li>',
					);
					wp_tag_cloud($args);
					echo '</li>'; 	
		echo	'</ul>'.$after_widget;	
	}
 	public function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
		
		$title = esc_attr( $instance['title'] );
		
		echo '<p><label for="'.esc_attr($this->get_field_id('title')).'">'.__( 'Title:', 'lex' ).'</label>';
		echo '<input type="text" class="widefat" id="'.esc_attr($this->get_field_id('title')).'"  name="'.esc_attr($this->get_field_name('title')).'" value="'.$title.'"></p>';
	}
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		return $instance;	
	}	
}

/******************************************************** 
Lex Categories Widget
********************************************************/
class Lex_Categories extends WP_Widget {
	public function __construct() {
		parent::__construct('lex_categories', __('Lex Categories','lex'), array('description' =>__('Lex Categories Widget','lex') ));
	}
	public function widget( $args, $instance ) {
		extract($args);
		$title = empty( $instance['title'] ) ? __('Lex Categories','lex') : $instance['title'];
		
		echo $before_widget.
				$before_title.$title.$after_title.
				'<ul class="list-unstyled">';
					$categories = get_categories(); 
					if( !empty( $categories ) ){
						foreach( $categories as $category ){
							echo '<li>
								<a href="'.esc_url( get_category_link( $category->term_id ) ).'">' . $category->name . '<i class="fa fa-sign-out pull-right"></i></a>
							</li>';
						}
					}
		echo	'</ul>'.$after_widget;	
	}
 	public function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
		
		$title = esc_attr( $instance['title'] );
		
		echo '<p><label for="'.esc_attr($this->get_field_id('title')).'">'.__( 'Title:', 'lex' ).'</label>';
		echo '<input type="text" class="widefat" id="'.esc_attr($this->get_field_id('title')).'"  name="'.esc_attr($this->get_field_name('title')).'" value="'.$title.'"></p>';
	}
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		return $instance;	
	}	
}

/******************************************************** 
Lex Newsletter Widget
********************************************************/
class Lex_Newsletter extends WP_Widget {
	public function __construct() {
		parent::__construct('lex_newsletter', __('Lex Newsletter','lex'), array('description' =>__('Lex Newsletter Widget','lex') ));
	}
	public function widget( $args, $instance ) {
		extract($args);
		$title = empty( $instance['title'] ) ? __( 'Lex Newsletter', 'lex' ) : $instance['title'];
		
		echo $before_widget.
				$before_title.$title.$after_title.
				'<div class="lex_newsletter">
					<p>
						'.__( 'Lex latest news on your email', 'lex' ).'
					</p>
					<div class="subscription_result"></div>
					<div class="form-group has-feedback">
						<input type="text" class="form-control subscribe" id="search" name="search" placeholder="'.esc_attr__( 'Email address...', 'lex' ).'">
						<span class="fa fa-envelope form-control-feedback"></span>
					</div>
				</div>'.
			 $after_widget;	
	}
 	public function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );

		$title = esc_attr( $instance['title'] );
		
		echo '<p><label for="'.esc_attr($this->get_field_id('title')).'">'.__( 'Title:', 'lex' ).'</label>';
		echo '<input type="text" class="widefat" id="'.esc_attr($this->get_field_id('title')).'"  name="'.esc_attr($this->get_field_name('title')).'" value="'.$title.'"></p>';
	}
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		return $instance;	
	}	
}

/******************************************************** 
Lex Latest Blogs Widget
********************************************************/
class Lex_Latest_Blogs extends WP_Widget {
	public function __construct() {
		parent::__construct('lex_latest_blogs', __('Lex Latest Blogs','lex'), array('description' =>__('Lex Latest Blogs Widget','lex') ));
	}
	public function widget( $args, $instance ) {
		extract($args);
		$title = empty( $instance['title'] ) ? __('Lex Latest Blogs','lex') : $instance['title'];
		$count = empty( $instance['count'] ) ? 5 : $instance['count'];
		
		$args = array(
			'numberposts' => $count,
			'orderby' => 'post_date',
			'order' => 'DESC',	
			'post_type' => 'post',			
		);
		$recent_posts = wp_get_recent_posts( $args, OBJECT );
		
		echo $before_widget.
				$before_title.$title.$after_title.
				'<ul class="list-unstyled">';
					if( !empty( $recent_posts ) ){
						foreach( $recent_posts as $post ){
							$category_array = get_the_category(); 
							$category_list = '';
							foreach($category_array as $cat){
								$category_list .= $cat->cat_name.' ';
							} 							
							echo '<li>
									<a href="'.get_permalink( $post->ID ).'"> 
										'.$post->post_title.'<br />
										<small>
											'.__( 'by', 'lex' ).' '.get_the_author_meta( 'nickname', $post->post_author ).' '.__( 'in', 'lex' ).' '.$category_list.'
										</small>
									</a>
								 </li>';
						}
					}
		echo	'</ul>'.
			 $after_widget;	
	}
 	public function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'count' => '' ) );

		$title = esc_attr( $instance['title'] );
		$count = esc_attr( $instance['count'] );
		
		echo '<p><label for="'.esc_attr($this->get_field_id('title')).'">'.__( 'Title:', 'lex' ).'</label>';
		echo '<input type="text" class="widefat" id="'.esc_attr($this->get_field_id('title')).'"  name="'.esc_attr($this->get_field_name('title')).'" value="'.$title.'"></p>';
		
		echo '<p><label for="'.esc_attr($this->get_field_id('count')).'">'.__( 'Number of posts:', 'lex' ).'</label>';
		echo '<input type="text" class="widefat" id="'.esc_attr($this->get_field_id('count')).'"  name="'.esc_attr($this->get_field_name('count')).'" value="'.$count.'"></p>';
	}
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		$instance['count'] = $new_instance['count'];
		return $instance;	
	}	
}



/******************************************************** 
Lex FAQ Widget
********************************************************/
class Lex_FAQ extends WP_Widget {
	public function __construct() {
		parent::__construct('lex_faq', __('Lex FAQ','lex'), array('description' =>__('Lex FAQ Widget','lex') ));
	}
	public function widget( $args, $instance ) {
		extract($args);
		$title = empty( $instance['title'] ) ? __('Lex FAQ','lex') : $instance['title'];
		$selected = explode( ',', $instance['selected'] );
		$count = $instance['count'];
		if( !empty( $count ) ){
			$args = array(
				'numberposts' => $count,
				'orderby' => 'post_date',
				'order' => 'DESC',	
				'post_type' => 'faq',			
			);
		}
		else{
			$args = array(
				'post__in' => $selected,
				'orderby' => 'post_date',
				'order' => 'DESC',	
				'post_type' => 'faq',			
			);
		}
		$posts = get_posts( $args );
		
		echo $before_widget.
				$before_title.$title.$after_title.
				'<ul class="list-unstyled">';
					if( !empty( $posts ) ){
						foreach( $posts as $post ){							
							echo '<li>
									<a href="'.esc_url( lex_get_permalink_by_tpl( 'page-tpl_faq.php' ) ).'"> 
										'.$post->post_title.'
									</a>
								 </li>';
						}
					}
		echo	'</ul>'.
			 $after_widget;	
	}
 	public function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'count' => '', 'selected' => '' ) );

		$title = esc_attr( $instance['title'] );
		$count = esc_attr( $instance['count'] );
		$selected = explode( ",", $instance['selected'] );
		
		echo '<p><label for="'.esc_attr($this->get_field_id('title')).'">'.__( 'Title:', 'lex' ).'</label>';
		echo '<input type="text" class="widefat" id="'.esc_attr($this->get_field_id('title')).'"  name="'.esc_attr($this->get_field_name('title')).'" value="'.$title.'"></p>';
		
		echo '<p><label for="'.esc_attr($this->get_field_id('count')).'">'.__( 'Number of posts:', 'lex' ).'</label>';
		echo '<input type="text" class="widefat" id="'.esc_attr($this->get_field_id('count')).'"  name="'.esc_attr($this->get_field_name('count')).'" value="'.$count.'"></p>';
		
		echo '<p><label for="'.esc_attr($this->get_field_id('selected')).'">'.__( 'Select FAQ to show:', 'coupon' ).'</label>';
		echo '<select class="widefat" name="'.esc_attr($this->get_field_name('selected')).'[]" multiple>';		
			$posts = get_posts( array( 'post_status'=>'publish', 'post_type' => 'faq', 'posts_per_page' => -1 ) );
			if( !empty( $posts ) ){
				foreach( $posts as $post ){
					echo '<option value="'.$post->ID.'" '.( in_array( $post->ID, $selected ) ? 'selected="selected"' : '' ).'>'.$post->post_title."</option>";
				}
			}
		echo '</select>';
	}
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		$instance['count'] = $new_instance['count'];
		$instance['selected'] = join( ",", $new_instance['selected'] );
		return $instance;	
	}	
}

/******************************************************** 
Lex Practice Areas Widget
********************************************************/
class Lex_Practice_Areas extends WP_Widget {
	public function __construct() {
		parent::__construct('lex_practice_areas', __('Lex Practice Areas','lex'), array('description' =>__('Lex Practice Areas Widget','lex') ));
	}
	public function widget( $args, $instance ) {
		extract($args);
		$title = empty( $instance['title'] ) ? __('Lex Practice Areas','lex') : $instance['title'];
		$selected = explode( ',', $instance['selected'] );
		$count = $instance['count'];
		if( !empty( $count ) ){
			$args = array(
				'numberposts' => $count,
				'orderby' => 'post_date',
				'order' => 'DESC',	
				'post_status' => 'publish',
				'post_type' => 'practice_area',			
			);
		}
		else{
			$args = array(
				'post__in' => $selected,
				'orderby' => 'post_date',
				'order' => 'DESC',	
				'post_status' => 'publish',
				'post_type' => 'practice_area',			
			);
		}
		$posts = get_posts( $args );
		
		echo $before_widget.
				$before_title.$title.$after_title.
				'<ul class="list-unstyled">';
					if( !empty( $posts ) ){
						foreach( $posts as $post ){		
							$post_meta = get_post_meta( $post->ID );
							$icon = lex_get_smeta( 'icon', $post_meta, '' );						
							echo '<li>
									<a href="'.get_permalink( $post->ID ).'"> 
										'.$post->post_title.'
										'.( !empty( $icon ) ? '<i class="fa fa-'.esc_attr( $icon ).' pull-right"></i>' : '' ).'
									</a>
								 </li>';
						}
					}
		echo	'</ul>'.
			 $after_widget;	
	}
 	public function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'count' => '', 'selected' => '' ) );

		$title = esc_attr( $instance['title'] );
		$count = esc_attr( $instance['count'] );
		$selected = explode( ",", $instance['selected'] );
		
		echo '<p><label for="'.esc_attr($this->get_field_id('title')).'">'.__( 'Title:', 'lex' ).'</label>';
		echo '<input type="text" class="widefat" id="'.esc_attr($this->get_field_id('title')).'"  name="'.esc_attr($this->get_field_name('title')).'" value="'.$title.'"></p>';
		
		echo '<p><label for="'.esc_attr($this->get_field_id('count')).'">'.__( 'Number of posts:', 'lex' ).'</label>';
		echo '<input type="text" class="widefat" id="'.esc_attr($this->get_field_id('count')).'"  name="'.esc_attr($this->get_field_name('count')).'" value="'.$count.'"></p>';
		
		echo '<p><label for="'.esc_attr($this->get_field_id('selected')).'">'.__( 'Select practice areas to show:', 'coupon' ).'</label>';
		echo '<select class="widefat" name="'.esc_attr($this->get_field_name('selected')).'[]" multiple>';		
			$posts = get_posts( array( 'post_status'=>'publish', 'post_type' => 'practice_area', 'posts_per_page' => -1 ) );
			if( !empty( $posts ) ){
				foreach( $posts as $post ){
					echo '<option value="'.$post->ID.'" '.( in_array( $post->ID, $selected ) ? 'selected="selected"' : '' ).'>'.$post->post_title."</option>";
				}
			}
		echo '</select>';
	}
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = esc_attr( $new_instance['title'] );
		$instance['count'] = esc_attr( $new_instance['count'] );
		$instance['selected'] = join( ",", $new_instance['selected'] );
		return $instance;	
	}	
}

/******************************************************** 
Lex Case Results Widget
********************************************************/
class Lex_Case_Results extends WP_Widget {
	public function __construct() {
		parent::__construct('lex_case_results', __('Lex Case Results','lex'), array('description' =>__('Lex Case Results Widget','lex') ));
	}
	public function widget( $args, $instance ) {
		extract($args);
		$title = empty( $instance['title'] ) ? __('Lex Case Results','lex') : $instance['title'];
		$selected = explode( ',', $instance['selected'] );
		$count = $instance['count'];
		if( !empty( $count ) ){
			$args = array(
				'numberposts' => $count,
				'orderby' => 'post_date',
				'order' => 'DESC',
				'post_status' => 'publish',
				'post_type' => 'case_result',			
			);
		}
		else{
			$args = array(
				'post__in' => $selected,
				'orderby' => 'post_date',
				'order' => 'DESC',	
				'post_status' => 'publish',
				'post_type' => 'case_result',			
			);
		}
		$posts = get_posts( $args );
		
		echo $before_widget.
				$before_title.$title.$after_title.
				'<ul class="list-unstyled">';
					if( !empty( $posts ) ){
						foreach( $posts as $post ){							
							echo '<li>
									<a href="'.get_permalink( $post->ID ).'"> 
										'.$post->post_title.'
									</a>
								 </li>';
						}
					}
		echo	'</ul>'.
			 $after_widget;	
	}
 	public function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'count' => '', 'selected' => '' ) );

		$title = esc_attr( $instance['title'] );
		$count = esc_attr( $instance['count'] );
		$selected = explode( ",", $instance['selected'] );
		
		echo '<p><label for="'.esc_attr($this->get_field_id('title')).'">'.__( 'Title:', 'lex' ).'</label>';
		echo '<input type="text" class="widefat" id="'.esc_attr($this->get_field_id('title')).'"  name="'.esc_attr($this->get_field_name('title')).'" value="'.$title.'"></p>';
		
		echo '<p><label for="'.esc_attr($this->get_field_id('count')).'">'.__( 'Number of posts:', 'lex' ).'</label>';
		echo '<input type="text" class="widefat" id="'.esc_attr($this->get_field_id('count')).'"  name="'.esc_attr($this->get_field_name('count')).'" value="'.$count.'"></p>';
		
		echo '<p><label for="'.esc_attr($this->get_field_id('selected')).'">'.__( 'Select case results to show:', 'coupon' ).'</label>';
		echo '<select class="widefat" name="'.esc_attr($this->get_field_name('selected')).'[]" multiple>';		
			$posts = get_posts( array( 'post_status'=>'publish', 'post_type' => 'case_result', 'posts_per_page' => -1 ) );
			if( !empty( $posts ) ){
				foreach( $posts as $post ){
					echo '<option value="'.$post->ID.'" '.( in_array( $post->ID, $selected ) ? 'selected="selected"' : '' ).'>'.$post->post_title."</option>";
				}
			}
		echo '</select>';
	}
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = esc_attr( $new_instance['title'] );
		$instance['count'] = esc_attr( $new_instance['count'] );
		$instance['selected'] = join( ",", $new_instance['selected'] );
		return $instance;	
	}	
}

/******************************************************** 
Add Lex Widgets 
********************************************************/
function lex_widgets_load(){
	register_widget( 'Lex_Text' );
	register_widget( 'Lex_Social' );
	register_widget( 'Lex_Archives' );
	register_widget( 'Lex_Categories' );
	register_widget( 'Lex_Tags' );
	register_widget( 'Lex_Newsletter' );
	register_widget( 'Lex_Latest_Comments' );
	register_widget( 'Lex_Latest_Blogs' );
	register_widget( 'Lex_Case_Results' );
	register_widget( 'Lex_Practice_Areas' );
	register_widget( 'Lex_FAQ' );
}
add_action( 'widgets_init', 'lex_widgets_load');
?>