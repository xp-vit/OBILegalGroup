<?php
	/**********************************************************************
	***********************************************************************
	LEX COMMENTS
	**********************************************************************/
	
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ( 'Please do not load this page directly. Thanks!' );
	if ( post_password_required() ) {
		return;
	}
?>
<?php 

//if ( comments_open() ) : 
if(false) :
?>
	<!-- 1 -->
	<div class="row">
		<!-- post -->
		<div class="col-md-12">
			<div class="practice-box team blog">
				<div class="practice-box-wrap">
					<!-- title -->
					<div class="meta meta-comments clearfix text-left">
						<h4>
							<?php comments_number( 'No Comments', '1 Comment', '% Comments' ); ?>
						</h4>
					</div><!--title -->
					<!-- content -->
					<?php
						$comment_links = paginate_comments_links( 
							array(
								'echo' => false,
								'type' => 'array'
							) 
						);
						if( !empty( $comment_links ) ):
					?>					
						<div class="prev-next text-center">
							<div class="btn-group lex blog">
								<?php echo  lex_format_pagination( $comment_links ); ?>
							</div>
						</div>
					<?php endif; ?>
					
					<div class="content">
						<?php if( have_comments() ): ?>
							<?php wp_list_comments( 'type=comment&callback=lex_comments' ); ?>
						<?php endif; ?>
					</div><!-- content -->
				</div>
			</div>
		</div><!-- post -->
	</div><!-- .1 -->
	<!-- 1 -->
	<div class="row">
		<!-- post -->
		<div class="col-md-12">
			<div class="practice-box team blog">
				<div class="practice-box-wrap">
					<!-- content -->
					<?php if ( comments_open() ) : ?>
						<!-- title -->
						<div class="meta meta-comments clearfix text-left">
							<h4>
								<?php _e( 'Leave Comment', 'lex' ); ?>
							</h4>
						</div><!--title -->				
						<div class="content">
							<div id="contact_form">
								<?php
									$comments_args = array(
										'id_form'		=> 'feedbackForm',
										'label_submit'	=>	__( 'Send Comment', 'coupon' ),
										'title_reply'	=>	'',
										'fields'		=>	apply_filters( 'comment_form_default_fields', array(
																'author' => '<div class="form-group has-feedback">
																				<label class="control-label" for="name">'.__( 'You Name', 'coupon'  ).'</label>
																				<input type="text" class="form-control" id="name" name="author" placeholder="'.__('Name','coupon').'">
																				<span class="fa fa-user form-control-feedback"></span>
																				<span class="help-block">'.__( 'Please enter your name.', 'lex' ).'</span>
																			</div>',
																'email'	 => '<div class="form-group has-feedback">
																				<label class="control-label" for="email">'.__( 'Your Email', 'coupon' ).'</label>
																				<input type="email" class="form-control" id="email" name="email" placeholder="'.__('Email','coupon').'" name="email">
																				<span class="fa fa-envelope form-control-feedback"></span>
																				<span class="help-block">Please enter a valid e-mail address.</span>
																			</div>'
															)),
										'comment_field'	=>	'<div class="form-group has-feedback">
																<label class="control-label" for="message">'.__( 'Comment', 'coupon' ).'</label>
																<textarea rows="10" cols="100" class="form-control" id="message" name="comment" placeholder="'.__('Comment','coupon').'"></textarea>
																<span class="fa fa-pencil form-control-feedback"></span>
																<span class="help-block">Please enter a message.</span>
															</div>',
										'cancel_reply_link' => __( 'or cancel reply', 'coupon' ),
										'comment_notes_after' => '',
										'comment_notes_before' => ''
									);
									comment_form( $comments_args );	
								?>
							</div>
						</div><!-- content -->
					<?php endif; ?>
				</div>
			</div>
		</div><!-- post -->
	</div><!-- .1 -->
<?php endif; ?>