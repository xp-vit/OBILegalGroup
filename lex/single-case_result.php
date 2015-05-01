<?php
get_header();
the_post();
$post_id = get_the_ID();
$post_meta = get_post_custom();
$court = lex_get_smeta( 'court', $post_meta, '' );
$charged = lex_get_smeta( 'charged', $post_meta, '' );
$result = lex_get_smeta( 'result', $post_meta, '' );
$amount = lex_get_smeta( 'amount', $post_meta, '' );

get_template_part( 'includes/inner_header' );


?>
<section>
	<div class="container">
		<div class="row">
      
		<!-- sidebar -->
			<div class="col-md-4 affix-box">
				<div class="case-result-box single">
					<div class="case-top">
						<a href="<?php the_permalink() ?>" class="lex_modal"><h5><strong><?php the_title(); ?></strong></h5></a>
						<h6 class="subheading"><i><?php echo $court; echo "&nbsp;"; ?></i></h6>
					</div>
					<div class="case-result-meta">
						<ul class="list-unstyled">
							<li class="text-left"><i class="fa fa-clock-o"></i> <?php the_time('F j, Y'); ?></li>
							<?php if( !empty( $charged ) ): ?>
								<li class="text-left"><i class="fa fa-pencil"></i><?php echo $charged; ?></li>
							<?php endif; ?>
							<?php if( !empty( $result ) ): ?>
								<li class="text-left"><i class="fa fa-gavel"></i> <?php echo $result ?></li>
							<?php endif; ?>
						</ul>
					</div>
					<div class="value">
						<h3 class="text-left"><strong><?php echo $amount; ?></strong></h3>
					</div>
				</div>
				<!-- .case result -->
      
				<!-- buttons -->
				<div class="row">
					<div class="col-md-12">
						<div class="prev-next text-center">
							<div class="btn-group lex">
								<?php echo lex_previous_post(); ?>
								<?php echo lex_next_post(); ?>
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