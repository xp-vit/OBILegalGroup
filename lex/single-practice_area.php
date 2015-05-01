<?php
get_header();
the_post();
get_template_part( 'includes/inner_header' );

$post_meta = get_post_meta( get_the_ID() );
$icon = lex_get_smeta( 'icon', $post_meta, '' );
?>
<section>
	<div class="container">
		<div class="row">
      
		<!-- sidebar -->
			<div class="col-md-4 affix-box">
        
				<!-- practice box -->
				<div class="practice-box single">
					<a href="javascript:;">
						<div class="practice-box-wrap">
							<i class="fa fa-<?php echo esc_attr( $icon ); ?>"></i>
							<p><strong><?php the_title(); ?></strong></p>
						</div>
					</a>
				</div>
				<!-- .practice box -->
			
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
			<div class="col-md-8">
				<div id="content" class="clearfix">
					<?php
					$content = get_the_content();
					lex_the_content( $content, true, false );
					?>
				</div>
			</div>
		</div>
		<!-- content -->
    
	</div>
</section>
<?php 
lex_bottom_sidebar();
get_footer();
?>