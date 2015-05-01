<?php
$logo = lex_get_option( 'contact_phone' ); 
$phone = lex_get_option( 'contact_phone' ); 
$slogan = lex_get_option( 'site_slogan' ); 
if( !empty( $logo ) || !empty( $phone ) || !empty( $slogan ) ):
?>
<section class="home-header inner" style="padding: 10px 0px;">
  
  <!-- header -->
  <div class="header">
    <div class="container">
      <div class="row">
        
        <!-- logo -->
        <div class="col-md-4 col-sm-4 col-xs-5">
          <div class="logo">
			<?php 
			
			if( !empty( $logo ) ):
			?>
				<a href="<?php echo esc_url( home_url() ); ?>">
					<img src="<?php echo esc_url( lex_get_option('site_logo') ) ?>" class="img-responsive" title="<?php echo esc_attr( lex_get_option('site_name') ) ?>" alt="<?php echo esc_attr( lex_get_option('site_name') ) ?>" />
				</a>
			<?php endif; ?>
          </div>
        </div>
        <!-- .logo -->
        
        <!-- quick contact -->
        <div class="col-md-8 col-sm-8 col-xs-7" style="padding-top: 30px;">
          <div class="quick-contact text-right">
            <p class="phone"><?php echo lex_get_option('contact_phone') ?></p>
            <p><?php echo lex_get_option('site_slogan') ?></p>
          </div>
        </div>
        <!-- .quick contact -->
        
      </div>
    </div>
  </div>
  <!-- .header -->
  </section>
<?php endif; ?>
<!-- ==================================================================================================================================
BREADCRUMBS

======================================================================================================================================= -->
  <section class="<?php if(is_page(262)) { 
				echo "image-background image-background-community inner"; 
			//Diversity
			} else if(is_page(425)) {
				echo "image-background image-background-diversity inner";
			//Overview
			} else if(is_page(412)) {
 				echo "image-background image-background-overview inner";
			//Practice
			} else if (is_single(38)||is_single(37)||is_single(36)||is_single(35)||is_single(34)||is_single(33)||is_single(32)) {
				echo "image-background image-background-practice inner";
			} else { 
				echo "image-background inner"; }?>">

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="text-center white-text">
						<?php 
							if ( is_category() ){
								single_cat_title();
							}
							else if( is_tag() ){
								echo __('Search by tag: ', 'rando'). get_query_var('tag'); 
							}
							else if( is_archive() ){
								echo __('Archive for:', 'rando'). single_month_title(' ',false); 
							}
							else if( is_search() ){ 
								echo __('Search results for: ', 'rando').' '. get_search_query();
							}
							else if( is_front_page() || is_home()){
								echo bloginfo( 'name' );
							}
							else{
								echo get_the_title();
							}?>		
		</h1>
        <h6 class="subheading white-text text-center">
			<i>
				<?php 
					if( is_single() ){
						$post_id = get_the_ID();
						$post_type = get_post_type( $post_id );
						switch( $post_type ){
							case 'lawyer' :
								$post_meta = get_post_meta( $post_id, 'position' );
								break;
							case 'practice_area' : 
								$post_meta = get_post_meta( $post_id, 'subheading-pa' );
								break;
							case 'case_result' :
								$post_meta = get_post_meta( $post_id, 'court' );
								break;
							default:  $post_meta = '';
						}
						echo !empty( $post_meta ) ? $post_meta[0] : '';
					}
					else if ( is_home() ){
						echo get_bloginfo( 'description', 'display' );
					}
					else if( is_search() ){
						
					}
					else{
						$subtitle = get_post_meta( get_the_ID(), 'subheading' );
						echo !empty( $subtitle ) ? $subtitle[0] : '';
					}
				?>
			</i>
		</h6>
      </div>
      </div>
    </div>
  </div>
  
  <?php get_template_part( 'includes/navigation' ); ?>
</section>