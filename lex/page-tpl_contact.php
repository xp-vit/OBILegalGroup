<?php
/*
	Template Name: Contact Page
*/
get_header();
the_post();
get_template_part( 'includes/inner_header' );
?>
<section>
	<div class="container">
		<div class="row">
      
			<!-- content -->
			<div class="col-md-12">
				<div id="content" class="clearfix">
			  
					<!-- contact us -->
					<div class="row">
					
						<!-- add info -->
						<div class="col-md-6">
							<?php the_content(); ?>
						</div>
						<!-- .add info -->
						
						<!-- case evaluation -->
						<div class="col-md-6">
							<h3><strong><?php echo lex_get_option( 'contact_form_title' ); ?></strong></h3>
							<h6 class="subheading"><i><?php echo lex_get_option( 'contact_form_subtitle' ); ?></i></h6>
							<div id="contact_form">
								<form role="form" id="feedbackForm">
								
									<div class="form-group has-feedback">
										<label class="control-label" for="name"><?php _e( 'Name', 'lex' ) ?></label>
										<input type="text" class="form-control" id="name" name="name" placeholder="<?php esc_attr_e( 'Please enter your full name...', 'lex' ); ?>">
										<span class="fa fa-user form-control-feedback"></span>
										<span class="help-block"><?php _e( 'Please enter your name.', 'lex' ); ?></span>
									</div>
									
									<div class="form-group has-feedback">
										<label class="control-label" for="phone"><?php _e( 'Phone', 'lex' ); ?></label>
										<input type="tel" class="form-control" id="phone" name="phone" placeholder="<?php esc_attr_e( 'XXX-XXX-XXXX', 'lex' ); ?>">
										<span class="fa fa-mobile-phone form-control-feedback"></span>
										<span class="help-block"><?php _e( 'Please enter a valid phone number.  Must be at least six digits long.', 'lex' ); ?></span>
									</div>
						
									<div class="form-group has-feedback">
										<label class="control-label" for="email"><?php _e( 'Email Address', 'lex' ); ?></label>
										<input type="email" class="form-control" id="email" name="email" placeholder="<?php esc_attr_e( 'Please enter your email...', 'lex' ); ?>">
										<span class="fa fa-envelope form-control-feedback"></span>
										<span class="help-block"><?php _e( 'Please enter a valid e-mail address.', 'lex' ); ?></span>
									</div>
						
									<div class="form-group has-feedback">
										<label class="control-label" for="message"><?php _e( 'Message', 'lex' ); ?></label>
										<textarea rows="10" cols="100" class="form-control" id="message" name="message" placeholder="<?php esc_attr_e( 'Please be desscriptive as much as you can...', 'lex' ); ?>"></textarea>
										<span class="fa fa-pencil form-control-feedback"></span>
										<span class="help-block"><?php _e( 'Please enter a message.', 'lex' ); ?></span>
									</div>
						
									<div class="form-group has-feedback">
										<label class="control-label" for="captcha"><?php _e( 'What is a sum?', 'lex' ); ?></label>
										<input type="email" class="form-control" id="captcha" name="captcha" placeholder="">
										<span class="fa fa-envelope form-control-feedback"></span>
										<span class="help-block"><?php _e( 'Not correct, please try again..', 'lex' ); ?></span>
									</div>
									<input type="hidden" name="action" value="send_contact">
									<button type="submit" id="feedbackSubmit" class="btn btn-default button-dark" data-loading-text="<?php esc_attr_e( 'Sending...', 'lex' ); ?>"><?php _e( 'Submit', 'lex' ); ?> <i class="fa fa-sign-out"></i></button>
								</form>
							</div>
						</div>
						<!-- .case evaluation -->
					</div>
					<!-- .contact us -->
			  
				</div>
			</div>
		</div>
    <!-- content -->
	</div>
</section>
<?php
get_footer();
?>