<?php
/*
	Template Name: Blog One Column
*/
get_header();
the_post();

get_template_part( 'includes/inner_header' );

$cur_page = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; //get curent page

$main_query = new WP_Query(array(
	'post_type'		=> 'post',
	'post_status'		=> 'publish',
	'posts_per_page'	=> get_option('posts_per_page'),
	'paged' 		=> $cur_page,
));
$page_links_total =  $main_query->max_num_pages;

$page_links = paginate_links( 
	array(
		'base' => add_query_arg( 'paged', '%#%' ),
		'prev_next' => true,
		'end_size' => 2,
		'mid_size' => 2,
		'total' => $page_links_total,
		'current' => $cur_page,	
		'prev_next' => true,
		'prev_text'    => '<i class="fa fa-arrow-left"></i>',
		'next_text'    => '<i class="fa fa-arrow-right"></i>',							
		'type' => 'array'
	)
);

$pagination = lex_format_pagination( $page_links );
?>
<section>
	<div class="container">
		<div class="row">
			<!-- content -->
			<div class="col-md-9">
				<?php if( $main_query->have_posts() ): ?>					
					<?php while( $main_query->have_posts() ): ?>
						<?php $main_query->the_post(); ?>
						<div class="row">
						<!-- 1 -->							
						<!-- post -->
							<div class="col-md-12">
								<div id="post-<?php the_ID(); ?>" <?php post_class( 'practice-box team blog' ); ?> >
									<div class="practice-box-wrap">
										<div class="media">
											<?php echo lex_the_media( get_the_ID(), 'post-thumbnail' ); ?>
										</div>
										<div class="meta clearfix">
											<p>
												<span class="pull-left"><i class="fa fa-bars"></i><?php echo lex_the_categories(); ?></span>
												<span class="pull-right"><i class="fa fa-clock-o"></i><?php the_time('F j, Y'); ?></span>
											</p>
										</div>
										<div class="content">
											<p class="name text-left">
												<a href="<?php the_permalink() ?>">
													<strong><?php the_title(); ?></strong>
												</a>
											</p>
											<p class="position text-left">
												<?php the_excerpt(); ?>
											</p>
										</div>
									</div>
									<?php
									$read_more_icon = lex_get_option( 'read_more_icon' );
									if( !empty( $read_more_icon ) ){
									?>
										<div class="practice-box-button">
											<a href="<?php the_permalink() ?>" class="lex_modal">
												<i class="fa fa-<?php echo esc_attr( $read_more_icon ); ?>"></i>
											</a>
										</div>
									<?php 
									}
									?>
								</div>
							</div>
						</div>
						<!-- .post -->
						<!-- .1 -->
					<?php endwhile; ?>				
				<?php endif; ?>
				<!-- buttons -->
				<div class="row">
					<div class="col-md-12">
						<div class="prev-next text-center">
							<div class="btn-group lex blog">
								<?php echo $pagination; ?>
							</div>
						</div>
					</div>
				</div><!-- .buttons -->
			</div><!-- .content -->
			<!-- sidebar -->
			<div class="col-md-3">
				<div class="row">
					<?php get_sidebar( 'blog' ); ?>
				</div>
			</div><!-- .sidebar -->
		</div><!-- content -->
	</div>
</section>
<?php
wp_reset_query();
lex_bottom_sidebar();
get_footer();
?>