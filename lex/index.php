<?php
	/*=============================
		DEFAULT BLOG LISTING PAGE
	=============================*/
get_header();
global $wp_query;
$args = array_merge( $wp_query->query_vars, array( 'post_type' => 'post' ) );
$main_query = new WP_Query( $args );

$cur_page = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; //get curent page
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
get_template_part( 'includes/inner_header' );
$masonry = lex_get_option( 'use_masonry' );
?>
<section>
	<div class="container">
		<div class="row">
			<!-- content -->
			<div class="col-md-9">
				<?php if( $main_query->have_posts() ): ?>
					<div class="<?php echo $masonry == 'yes' ? 'masonry' : 'row' ?>">
					<?php $counter = 0; ?>
					<?php while( $main_query->have_posts() ): ?>
						<?php $main_query->the_post(); ?>
						<?php
						if( $counter == 2 ){
							$counter = 0;	
							if( $masonry == 'no' ){
								?>
								</div>
								<div class="row">
								<?php
							}
						}
						$counter++;
						?>
						<!-- 1 -->							
						<!-- post -->
						<div class="col-md-6 <?php echo $masonry == 'yes' ? 'post-box' : '' ?>">
							<div id="post-<?php the_ID(); ?>" <?php post_class( 'practice-box team blog' ); ?> >
								<div class="practice-box-wrap">
									<div class="media">
										<?php echo lex_the_media(); ?>
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
						<!-- .post -->
						<!-- .1 -->
					<?php endwhile; ?>
					</div>
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
<?php wp_reset_query(); ?>
<?php lex_bottom_sidebar(); ?>
<?php get_footer(); ?>