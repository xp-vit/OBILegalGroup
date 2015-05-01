<!-- <script type="text/javascript" src="/wp-content/themes/lex/js/main_page_text.js"></script> -->
<section class="home-header bg">
  
	<!-- header -->
	<div class="header">
		<div class="container" style="height: 100%;">
			<div class="row">
        
				<!-- logo -->
				<div class="col-md-4 col-sm-4 col-xs-5">
					<div class="logo">
						<a href="<?php echo esc_url( home_url() ); ?>">
							<?php 
							$logo = lex_get_option( 'site_logo' ); 
							if( !empty( $logo ) ):
							?>
								<img src="<?php echo esc_url( $logo ); ?>" class="img-responsive-logo" title="" alt="" />
							<?php
							endif;
							?>
						</a>
					</div>
				</div>
				<!-- .logo -->
        
				<!-- quick contact -->
				<div class="col-md-8 col-sm-8 col-xs-7">
					<div class="quick-contact text-right">
						<p class="phone"><?php echo lex_get_option( 'contact_phone' ); ?></p>
						<p><?php echo lex_get_option( 'site_slogan' ); ?></p>
					</div>
				</div>
				<!-- .quick contact -->
        
			</div>
		</div>
	</div>
	<!-- .header -->
  
	<!-- intro content -->
	<div class="container">
		<div class="row">

			<!-- content -->
			<div class="col-md-12">
				<div class="intro-content text-center" style="padding: 0px !important;">
                                        <div id="below" style="height:330px;"></div>
					<h1>
						<!-- <strong> -->
							<span class="rotate">
							</span><br />
							<?php echo lex_get_option( 'home_static' ); ?>
						<!-- </strong> -->
					</h1>
					<?php
					$btn_link = lex_get_option( 'btn_link' );
					$btn_text = lex_get_option( 'btn_text' );
					$btn_icon = lex_get_option( 'btn_icon' );
					if( !empty( $btn_link ) || !empty( $btn_text ) || !empty( $btn_icon ) ):
					?>
						<a href="<?php echo esc_url( $btn_link ); ?>" class="btn btn-default button-white">
							<?php echo $btn_text; ?>
							<i class="fa fa-<?php echo esc_attr( $btn_icon ); ?>"></i>
						</a>
					<?php endif; ?>
				</div>
			</div>
			<!-- .content -->

		</div>
	</div>
	<!-- .intro content -->
  
	<?php get_template_part( 'includes/navigation' ) ?>
  
</section>
