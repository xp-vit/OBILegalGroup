<?php
function create_list(){
	$response = '';
	$post_types = array( 'case_result', 'practice_area', 'lawyer', 'post', 'testimonial' );
	foreach( $post_types as $post_type ){
		$elements = array();
		$list = get_by_post_type( $post_type, -1 );
		
		$response .= 'var '.$post_type.' = "'.base64_encode( json_encode( $list ) ).'";';
	}
	
	echo '
		<script type="text/javascript">
			'.$response.'
		</script>
	';
}
if( strstr($_SERVER['REQUEST_URI'], 'wp-admin/post-new.php') || strstr($_SERVER['REQUEST_URI'], 'wp-admin/post.php') ) {
    add_action( 'admin_enqueue_scripts', 'create_list');
}

function get_by_post_type( $post_type, $count, $post_list = '' ){
	$response = array();

	if( !empty( $post_list ) ){
		foreach( $post_list as $title ){
			$posts[] = get_page_by_title($title, OBJECT, 'post');
		}
	}
	else{
		$args = array(
			'post_type' => $post_type,
			'post_status' => 'publish',
			'posts_per_page' => $count,
			'orderby' => 'post_date',
			'order' => 'DESC'
		);	
		$posts = get_posts( $args );
	}
	
	if( !empty( $posts )){
		if( $count == -1 && empty( $post_list ) ){
			foreach( $posts as $post ){
				if( !empty( $post->post_title ) ){
					$response[] = $post->post_title;
				}
			}
		}
		else{
			$response = $posts;
		}
	}
	
	return $response;
}

function get_posts_by_title( $titles, $post_type ){
	$posts = array();
	if( !empty( $titles ) ){
		foreach( $titles as $title ){
			if( !empty( $title ) ){
				$post = get_page_by_title( $title, OBJECT, $post_type );				
				if( !empty( $post ) ){					
					$posts[] = $post;
				}
			}
		}
	}
	return $posts;
}

/* GRID ELEMENTS */
/* section */
function lex_section( $atts, $content ){
	extract( shortcode_atts( array(
		'class' => '',
	), $atts ) );
	
	return '<section class="'.esc_attr( $class ).'"><div class="container">'.do_shortcode( $content ).'</div></section>';
	
}
add_shortcode( 'lex_section', 'lex_section' );

/* row */
function lex_row( $atts, $content ){

	return '<div class="row">'.do_shortcode( $content ).'</div>';
	
}
add_shortcode( 'lex_row', 'lex_row' );

/* columns */
function lex_col( $atts, $content ){
	extract( shortcode_atts( array(
		'md' => '',
	), $atts ) );
	
	return '<div class="col-md-'.esc_attr( $md ).'">'.apply_filters( 'the_content', $content ).'</div>';
	
}
add_shortcode( 'lex_col', 'lex_col' );

/* button */
function lex_button( $atts, $content ){
	extract( shortcode_atts( array(
		'text' => '',
		'link' => '',
		'icon' => '',
		'font' => 'regular',
		'type' => 'normal',
		'style' => 'light',
	), $atts ) );
	
	if( $font == 'strong' ){
		$text = '<strong>'.$text.'</strong>';
	}
	
	$class = '';
	if( $style == 'light' ){
		$class .= 'button-white ';
	}
	else{
		$class .= 'button-dark ';
	}
	if( $type == "big" ){
		$html = '<a href="'.( !empty( $link ) ? esc_url( $link ) : '#' ).'"> '.$text.' '.( !empty( $icon ) ? '<i class="fa fa-2x fa-'.esc_attr( $icon ).'"></i>' : '' ).'</a>'; 
	}
	else{
		$html = '<a href="'.( !empty( $link ) ? esc_url( $link ) : '#' ).'" class="btn btn-default '.esc_attr( $class ).'"> '.$text.' '.( !empty( $icon ) ? '<i class="fa fa-'.esc_attr( $icon ).'"></i>' : '' ).'</a>'; 
	}
	
	if( $type == 'big' ){
		$html = '<div class="big-button text-center">'.$html.'</div>';
	}		
	
	return $html;
	
}
add_shortcode( 'lex_button', 'lex_button' );

/* case results */
function lex_cr( $atts, $content ){
	extract( shortcode_atts( array(
		'count' => '5',
		'columns' => '4',
		'pa_ids' => '',
	), $atts ) );
	
	if( !empty( $count ) ){
		$posts =  get_by_post_type(  'case_result', $count );
	}
	else{
		$post_list = explode( ",", $pa_ids );			
		$posts =  get_posts_by_title( $post_list, 'case_result' );
	}
	$html = '';
	
	if( !empty( $posts ) ){
		$html = '<div class="row">';
		$counter = 0;
		foreach( $posts as $post ){
			if( $counter == $columns ){
				$html .= '</div><div class="row">';
				$counter = 0;
			}
			$counter++;
			$post_meta = get_post_meta( $post->ID );
			
			$court = lex_get_smeta( 'court', $post_meta, '' );
			$charged = lex_get_smeta( 'charged', $post_meta, '' );
			$result = lex_get_smeta( 'result', $post_meta, '' );
			$amount = lex_get_smeta( 'amount', $post_meta, '' );
			$read_more_icon = lex_get_option( 'read_more_icon' );
			
			$html .= '
				<div class="col-md-'.( 12 / $columns ).'">
					<div class="case-result-box">
						<div class="case-top">
							<a href="'.get_the_permalink( $post->ID ).'" class="lex_modal"><h5><strong>'.$post->post_title.'</strong></h5></a>
							<h6 class="subheading"><i>'.$court.' &nbsp;</i></h6>
						</div>
						<div class="case-result-meta">
							<ul class="list-unstyled">
								<li class="text-left"><i class="fa fa-clock-o"></i> '.get_the_time( 'F j, Y', $post ).'</li>
								'.( !empty( $charged ) ?
									'<li class="text-left"><i class="fa fa-pencil"></i>'.$charged.'</li>' : ''
								).'
								
								'.( !empty( $result ) ?
									'<li class="text-left"><i class="fa fa-gavel"></i>'.$result.'</li>' : ''
								).'
							</ul>
						</div>
						<div class="value">
							<a href="'.get_the_permalink( $post->ID ).'" class="lex_modal"><h3 class="text-left"><strong>'.$amount.'</strong></h3></a>
						</div>
						'.( !empty( $read_more_icon ) ? '
							<div class="practice-box-button">
								<a href="'.get_the_permalink( $post->ID ).'">
									<i class="fa fa-'.esc_attr( $read_more_icon ).'"></i>
								</a>
							</div>'
							:
							''
						).'
					</div>
				</div>	
			';
		}
		$html .= '</div>';
	}
	
	return $html;
	
}
add_shortcode( 'lex_cr', 'lex_cr' );

/* counter */
function lex_counter( $atts, $content ){
	extract( shortcode_atts( array(
		'el_title' => '',
		'el_prefix' => '',
		'el_sufix' => '',
		'el_counter' => '',
		'el_counter_delay' => '',
		'el_counter_time' => '',
	), $atts ) );
	
	return '
		<div class="counter_wrapper" data-delay="'.esc_attr( $el_counter_delay ).'" data-time="'.esc_attr( $el_counter_time ).'">
			<h6 class="text-center white-text">'.$el_title.'</h6>
			<h2 class="text-center white-text"><strong>'.$el_prefix.'<span class="counter">'.$el_counter.'</span>'.$el_sufix.'</strong></h2>		
		</div>
	';
	
}
add_shortcode( 'lex_counter', 'lex_counter' );

/* divider */
function lex_divider( $atts, $content ){
	return '<hr class="divider">';	
}
add_shortcode( 'lex_divider', 'lex_divider' );

/* dropcap */
function lex_dropcap( $atts, $content ){
	extract( shortcode_atts( array(
		'el_letter' => '',
	), $atts ) );
	
	return '
		<div class="dropcap-box clearfix">
		  <p>
			<span class="dropcap"><span class="dropcap-letter">'.$el_letter.'</span></span>'.do_shortcode( $content ).'</p>
		</div>		
	';
	
}
add_shortcode( 'lex_dropcap', 'lex_dropcap' );


/* lawyers */
function lex_lawyers( $atts, $content ){
	extract( shortcode_atts( array(
		'count' => '',
		'pa_ids' => '',
	), $atts ) );
	
	if( !empty( $count ) ){
		$posts =  get_by_post_type(  'lawyer', $count );
	}
	else{
		$post_list = explode( ",", $pa_ids );			
		$posts = get_posts_by_title( $post_list, 'lawyer' );
	}
	$html = '';
	
	if( !empty( $posts ) ){
		$html = '<div class="row">';
		$counter = 0;
		foreach( $posts as $post ){
			if( $counter == 4 ){
				$html .= '</div><div class="row">';
				$counter = 0;
			}
			$counter++;
			$post_meta = get_post_meta( $post->ID );
			
			$position = lex_get_smeta( 'position', $post_meta, '' );
			$read_more_icon = lex_get_option( 'read_more_icon' );
			
			$html .= '
				<div class="col-md-3">
					<div class="practice-box team">
						<div class="practice-box-wrap">
							<div class="media">
								'.( has_post_thumbnail( $post->ID ) ? get_the_post_thumbnail( $post->ID, 'lawyer' ) : '' ).'
							</div>
							<div class="content">
								<p class="name"><a href="'.get_the_permalink( $post->ID ).'" class="lex_modal"><strong>'.$post->post_title.'</strong></a></p>
								<p class="position">'.$position.'</p>
							</div>
						</div>
						'.( !empty( $read_more_icon ) ? '
							<div class="practice-box-button">
								<a href="'.get_the_permalink( $post->ID ).'">
									<i class="fa fa-'.esc_attr( $read_more_icon ).'"></i>
								</a>
							</div>'
							:
							''
						).'
					</div>
				</div>
			';
		}
		$html .= '</div>';
	}
	
	return $html;
	
}
add_shortcode( 'lex_lawyers', 'lex_lawyers' );

function lex_list( $atts, $content ){
	extract( shortcode_atts( array(
		'title' => '',
		'list_type' => ''
	), $atts ) );
	
	if( $list_type == 'with_title' ){
	
		$html = '<div class="widget">
		  
					<!-- widget title -->
						<div class="widget-title">
							<h4>'.$title.'</h4>
						</div>
					<!-- .widget title -->
		  
					<!-- widget content -->
					<div class="widget-content">
						<ul class="list-unstyled">
							' . do_shortcode( $content ) . '
						</ul>
					</div>
					<!-- .widget content -->
					
				</div>';
	}
	else{
		$html = '<ul class="list-unstyled">
					' . do_shortcode( $content ) . '
				</ul>';
	}

	return $html;
	
}
add_shortcode( 'lex_list', 'lex_list' );

/* lex list item */
function lex_list_item( $atts, $content ){
	extract( shortcode_atts( array(
		'text' => '',
		'link' => '',
	), $atts ) );
	
	if( !empty( $link ) ){
		return '<li><a href="'.esc_url( $link ).'">'.$text.'</a></li>';
	}
	else{
		return '<li>'.$text.'</li>';
	}
	
}
add_shortcode( 'lex_list_item', 'lex_list_item' );

/* lex list item */
function lex_news( $atts, $content ){
	extract( shortcode_atts( array(
		'count' => '5',
		'pa_ids' => '',
		'media' => 'yes',
		'meta_bar' => 'yes',
		'post_content' => 'yes',
	), $atts ) );
	
	if( !empty( $count ) ){
		$posts =  get_by_post_type(  'post', $count );
	}
	else{
		$post_list = explode( ",", $pa_ids );			
		$posts =  get_posts_by_title( $post_list, 'post' );
	}
	$html = '';
	
	if( !empty( $posts ) ){
		$html = '<div class="row">';
		$counter = 0;
		foreach( $posts as $post ){
			if( $counter == 3 ){
				$html .= '</div><div class="row">';
				$counter = 0;
			}
			$counter++;
			$post_meta = get_post_meta( $post->ID );
			
			$position = lex_get_smeta( 'position', $post_meta, '' );
			$read_more_icon = lex_get_option( 'read_more_icon' );
			
			$html .= '
				<div class="col-md-4">
					<div class="practice-box team blog">
						<div class="practice-box-wrap">
							'.( $media == 'yes' ? 
								'<div class="media">
									'.lex_the_media( $post->ID ).'
								</div>'
								:
								''
							).'
							
							'.( $meta_bar == 'yes' ?
								'<div class="meta clearfix">
									<p>
										<span class="pull-left"><i class="fa fa-bars"></i>'.lex_the_categories( $post->ID ).'</span>
										<span class="pull-right"><i class="fa fa-clock-o"></i>'.get_the_time( 'F j, Y', $post ).'</span>
									</p>
								</div>'
								:
								''
							).'
							
							<div class="content">
								<p class="name text-left">
									<a href="'.get_the_permalink( $post->ID ).'">
										<strong>'.$post->post_title.'</strong>
									</a>
								</p>
								'.( $post_content == 'yes' ?
									'<p class="position text-left">
										'.$post->post_excerpt.'
									</p>'
									:
									''
								).'
							</div>
						</div>
						'.( !empty( $read_more_icon ) ? '
							<div class="practice-box-button">
								<a href="'.get_the_permalink( $post->ID ).'">
									<i class="fa fa-'.$read_more_icon.'"></i>
								</a>
							</div>'
							:
							''
						).'
					</div>
				</div>
			';
		}
		$html .= '</div>';
	}
	
	return $html;

}
add_shortcode( 'lex_news', 'lex_news' );


/* lex list item */
function lex_newsletter( $atts, $content ){
	extract( shortcode_atts( array(
		'text' => __( 'SIGN UP FOR NEWSLETTER', 'lex' ),
		'placeholder' => __( 'Type your email here and hit enter/return to subscribe...', 'lex' )
	), $atts ) );
	
	$html = '
	<div class="row">
	  
		<!-- newsletter field -->
		<div class="col-md-12">
			<div class="form-horizontal clearfix lex_newsletter">
				<div class="subscription_result"></div>
				<div class="form-group clearfix">
					<label for="newsletter" class="col-md-5 control-label text-left">'.$text.'</label>
					<div class="col-md-7">
						<input type="email" class="form-control subscribe" id="newsletter" placeholder="'.$placeholder.'">
					</div>
				</div>
			</div>
		<!-- .newsletter field -->
		
		</div>
	</div>
	';
	
	return $html;

}
add_shortcode( 'lex_newsletter', 'lex_newsletter' );




/* case results */
function lex_pa( $atts, $content ){
	extract( shortcode_atts( array(
		'count' => '5',
		'columns' => '4',
		'pa_ids' => '',
	), $atts ) );

	if( !empty( $count ) ){
		$posts =  get_by_post_type(  'practice_area', $count );
	}
	else{
		$post_list = explode( ",", $pa_ids );			
		$posts =  get_posts_by_title( $post_list, 'practice_area' );
	}
	$html = '';
	
	if( !empty( $posts ) ){
		$html = '<div class="row">';
		$counter = 0;
		foreach( $posts as $post ){
			if( $counter == $columns ){
				$html .= '</div><div class="row">';
				$counter = 0;
			}
			$counter++;
			$post_meta = get_post_meta( $post->ID );
			
			$icon = lex_get_smeta( 'icon', $post_meta, '' );
			$read_more_icon = lex_get_option( 'read_more_icon' );
			
			$html .= '
				<div class="col-md-'.( 12 / $columns ).'">
					<div class="practice-box">
						<a href="'.get_the_permalink( $post->ID ).'">
							<div class="practice-box-wrap">
								<i class="fa fa-'.esc_attr( $icon ).'"></i>
								<p><strong>'.$post->post_title.'</strong></p>
							</div>
						</a>
						'.( !empty( $read_more_icon ) ? '
							<div class="practice-box-button">
								<a href="'.get_the_permalink( $post->ID ).'">
									<i class="fa fa-'.esc_attr( $read_more_icon ).'"></i>
								</a>
							</div>'
							:
							''
						).'
					</div>
				</div>
			';
		}
		$html .= '</div>';
	}
	
	return $html;
	
}
add_shortcode( 'lex_pa', 'lex_pa' );


/* lex testimonials  */
function lex_testimonials( $atts, $content ){
	extract( shortcode_atts( array(
		'el_title' => 'TESTIMONIALS',
		'count' => '4',
		'icon' => '',
		'pa_ids' => '',
	), $atts ) );

	if( !empty( $count ) ){
		$posts =  get_by_post_type( 'testimonial', $count );
	}
	else{
		$post_list = explode( ",", $pa_ids );			
		$posts =  get_posts_by_title( $post_list, 'testimonial' );
	}
	$html = '';
	
	if( !empty( $posts ) ){
		$counter = 0;
		$navigation = '';
		$elements = '';
		foreach( $posts as $post ){				
			$navigation .= '<li class="'.( $counter == 0 ? 'active' : '' ).'" data-slide-to="'.$counter.'" data-target="#testimonials-rotate"></li>';
			$elements .= '
				<!-- 1 -->
				<div class="item '.( $counter == 0 ? 'active' : '' ).'">
					<div class="row">
						<div class="col-md-12">
							<div class="testimonials">
								<div class="media">
									<a class="pull-left" href="javascript:;">
										'.( has_post_thumbnail( $post->ID ) ? get_the_post_thumbnail( $post->ID, 'testimonial', array( 'class' => 'media-object img-circle' ) ) : '' ).'
									</a>
									<div class="media-body">
										<div class="white-text">'.do_shortcode( $post->post_content ).'</div>
										<h6 class="white-text">'.$post->post_title.'</h6>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- .1 -->
			';
			$counter++;
		}
		
		$html = '
			<!-- title -->
			<div class="row">
				<div class="col-md-12">
					<h2 class="white-text text-left"><strong>'.$el_title.'</strong>
						<a href="'.lex_get_permalink_by_tpl( 'page-tpl_testimonials' ).'" class="pull-right testimonial-link">
							<i class="fa fa-sign-out"></i>
						</a>
					</h2>
				</div>	
			</div>
			<!-- .title -->

			<!-- testimonial carousel -->
			<div class="row">
				<div class="col-md-12">
					<div class="carousel slide" id="testimonials-rotate">

						<!-- indicators -->
						<ol class="carousel-indicators">
							'.$navigation.'
						</ol>
						<!-- .indicators -->

						<!-- carousel -->
						<div class="carousel-inner">
							'.$elements.'
						</div>
						<!-- .carousel -->

						<!-- next & prev 
						<div class="pull-right">
							<a href="#testimonials-rotate"  data-slide="prev">
							<i class="white-text fa fa-angle-left"></i>
							</a>
							<a href="#testimonials-rotate" data-slide="next">
								<i class="white-text fa fa-angle-right"></i>
							</a>
						</div>
						<!-- .next & prev -->

					</div>
				</div>
			</div>
			<!-- .testimonial carousel -->
		';
	}
	
	return $html;
	
}
add_shortcode( 'lex_testimonials', 'lex_testimonials' );

/* case results */
function lex_subheading( $atts, $content ){
	extract( shortcode_atts( array(
		'heading' => '6',
		'align' => 'left'
	), $atts ) );
	
	$html = '<h'.$heading.' class="subheading" style="text-align:'.$align.'">'.do_shortcode( $content ).'</h'.$heading.'>';
	
	return $html;
	
}
add_shortcode( 'lex_subheading', 'lex_subheading' );

	
/* ADD BUTTON TO THE TEXT EDITOR */
function lex_tinymce_buttons(){
	add_filter( "mce_external_plugins", "lex_add_buttons" );
    add_filter( 'mce_buttons', 'lex_register_buttons' );	
}
add_action( 'init', 'lex_tinymce_buttons' );

function lex_add_buttons( $plugin_array ) {
    $plugin_array['lex'] = get_template_directory_uri() . '/js/shortcodes.js';
    return $plugin_array;
}
function lex_register_buttons( $buttons ) {
    array_push( $buttons, 'lexgrid', 'lexelements' ); 
    return $buttons;
}


?>