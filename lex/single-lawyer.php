<?php

get_header();
the_post();
get_template_part( 'includes/inner_header' );
$post_id = get_the_ID();
$post_meta = get_post_meta( get_the_ID() );
$position = lex_get_smeta( 'position', $post_meta, '' );
$twitter = lex_get_smeta( 'twitter', $post_meta, '' );
$facebook = lex_get_smeta( 'facebook', $post_meta, '' );
$linkedin = lex_get_smeta( 'linkedin', $post_meta, '' );
?>
<section>
  <div class="container">
    <div class="row">
      
      <!-- sidebar -->
      <div class="col-md-3 affix-box">
        
        <!-- team box -->
        <div class="practice-box team single">
          <div class="practice-box-wrap">
          
          <!-- image -->
            <div class="media">
				<?php echo has_post_thumbnail() ? the_post_thumbnail( 'lawyer', array( 'class' => 'lex_modal_image' ) ) : '' ?>
            </div>
            <!-- .image -->
             
           <!-- content -->
            <div class="content">
              <p class="name lex_modal_name"><strong><?php the_title(); ?></strong></p>
              <p class="position lex_modal_position"><?php echo !empty( $position ) ? $position : ''; ?></p>
            </div>
            <!-- content -->
            
            <!-- social -->
            <div class="social text-center lex_modal_social">
				<?php if( !empty( $twitter ) ): ?>
					<a href="<?php echo esc_url( $twitter ); ?>"><i class="fa fa-twitter-square"></i></a>
				<?php endif; ?>
				<?php if( !empty( $facebook ) ): ?>
					<a href="<?php echo esc_url( $facebook ); ?>"><i class="fa fa-facebook-square"></i></a>
				<?php endif; ?>
				<?php if( !empty( $linkedin ) ): ?>
					<a href="<?php echo esc_url( $linkedin ); ?>"><i class="fa fa-linkedin-square"></i></a>
				<?php endif; ?>
            </div>
            <!-- .social -->
          </div>
        </div>
        
        <!-- .team box-->
        
        <!-- buttons -->
        <div class="row">
          <div class="col-md-12">
            <div class="prev-next text-center">
              <div class="btn-group lex">
				<?php lex_previous_post(); ?>
				<?php lex_next_post(); ?>
              </div>
            </div>
          </div>
        </div>
        <!-- .buttons -->
        
      </div>
      <!-- .sidebar -->
      
      <!-- content -->
      <div class="col-md-9">
        <div id="content" class="clearfix">
          <h3><strong><?php the_title() ?></strong></h3>
          <h6 class="subheading"><i><?php echo !empty( $position ) ? $position : '';  ?></i></h6>
          <hr class="divider" />
		  <div class="lex_modal_content">
			<?php
			$content = get_the_content();
			lex_the_content( $content, true, false );
			?>
		</div>
        </div>
      </div>
    </div>
    <!-- content -->
    
    <!-- separator-->
    <div class="row">
      <div class="col-md-12">
        <hr class="divider"  />
      </div>
    </div>
    <!-- .separator -->
    
  </div>
</section>
<?php
lex_bottom_sidebar();
get_footer();
?>