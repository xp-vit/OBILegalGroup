<?php
/*
	Template Name: FAQ
*/

get_header();
the_post();
get_template_part( 'includes/inner_header' );
$content = get_the_content();

$main_query = new WP_Query(array(
	'post_type'				=> 'faq',
	'post_status'			=> 'publish',
	'posts_per_page'		=> -1,
));

?>
<section>
	<div class="container">
		<div class="row">
      
			<!-- content -->
			<div class="col-md-12">
				<div id="content" class="clearfix">
					<?php echo apply_filters( 'the_content', $content ); ?>
					<?php $counter = 1; ?>
					
					<?php if( $main_query->have_posts() ): ?>
						<!-- accordion -->
						<div class="panel-group" id="accordion">
						<?php while( $main_query->have_posts() ): ?>
							<?php $main_query->the_post(); ?>		  
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a data-toggle="collapse" data-parent="#accordion" href="#collapse_<?php echo $counter; ?>"> <i class="fa fa-question-circle pull-right"></i>
												<?php the_title(); ?>
											</a>
										</h4>
									</div>
									<div id="collapse_<?php echo $counter; ?>" class="panel-collapse collapse <?php echo $counter == 1 ? 'in' : '' ?>">
										<div class="panel-body">
											<p><?php the_content(); $counter++; ?></p>
										</div>
									</div>
								</div>
						<?php endwhile; ?>
						</div>
						<!-- .accordion -->  
					<?php endif; ?>
				</div>
			</div>
		</div>
		<!-- content -->    
	</div>
</section>
<?php
wp_reset_query();
lex_bottom_sidebar();
get_footer();
?>