<!-- ==================================================================================================================================
SHARE
======================================================================================================================================= -->
<?php
	$linkedin = lex_get_option( 'share_linkedin' );
	$facebook = lex_get_option( 'share_facebook' );
	$twiter = lex_get_option( 'share_twitter' );
	$google = lex_get_option( 'share_google_plus' );
	$copyrights = lex_get_option( 'footer_copyrights' );
	if( !empty( $linkedin ) || !empty( $facebook ) || !empty( $twiter ) || !empty( $google )  || !empty( $copyrights ) ):
?>
<section class="footer"> 
  <div class="container">
    
    <!-- social -->
    <div class="row">
      <div class="col-md-12">
        <div class="social text-center">

			<?php if( !empty( $google ) ): ?>
				<a href="<?php echo esc_url( $google ) ?>"><i class="fa fa-google-plus-square"></i></a>
			<?php endif; ?>
			<?php if( !empty( $twiter ) ): ?>
				<a href="<?php echo esc_url( $twiter ) ?>"><i class="fa fa-twitter-square"></i></a>
			<?php endif; ?>
			<?php if( !empty( $facebook ) ): ?>
				<a href="<?php echo esc_url( $facebook ) ?>"><i class="fa fa-facebook-square"></i></a>
			<?php endif; ?>
			<?php if( !empty( $linkedin ) ): ?>
				<a href="<?php echo esc_url( $linkedin ) ?>"><i class="fa fa-linkedin-square"></i></a>
			<?php endif; ?>
        </div>
      </div>
    </div>
    <!-- .social -->
    
    <!-- copyrights -->
    <div class="row">
      <div class="col-md-12">
        <div class="copyrights">
          <p class="text-center"><?php echo $copyrights; ?></p>
        </div>
      </div>
    </div>
    <!-- .copyrights -->
    
  </div>
</section>
<?php endif; ?>
<a href="#_" class="to-top" style="display: inline;"><i class="fa fa-long-arrow-up"></i></a>
<?php
	wp_footer();
?>
</body>
</html>