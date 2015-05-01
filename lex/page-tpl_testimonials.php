<?php
/*
	Template Name: Testimonials
*/

get_header();
the_post();
get_template_part( 'includes/inner_header' );
$content = get_the_content();

$args = array(
	'post_type' => 'testimonial',
	'post_status' => 'publish',
	'posts_per_page' => -1,
);
$main_query = new WP_Query( $args );

?>
<section>
	<div class="container">
		<div class="row">
      
		<!-- content -->
			<div class="col-md-12">
				<div id="content" class="clearfix">
					<?php echo apply_filters( 'the_content', $content ); ?>
					<?php if( $main_query->have_posts() ): ?>
						<?php while($main_query->have_posts() ): ?>
							<?php $main_query->the_post(); ?>
							<!-- testimonial -->
							<div class="row">
								<div class="col-md-12">
									<div class="testimonials ">
										<div class="media single-testimonials">
											<?php if( has_post_thumbnail() ): ?>
												<a class="pull-left" href="<?php echo esc_url( lex_get_permalink_by_tpl( 'page-tpl_testimonials' ) ); ?>">
													<?php the_post_thumbnail( 'testimonial', array( 'class' => 'media-object img-circle img-thumbnail' ) ); ?>
												</a>
											<?php endif; ?>
											<div class="media-body">
												<?php the_content(); ?>
												<h6><?php the_title(); ?></h6>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- .testimonial -->
							<hr /> 
						<?php endwhile; ?>
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