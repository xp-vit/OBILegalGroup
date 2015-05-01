<?php
/*
	Template Name: Case Results Col 2
*/
get_header();
the_post();
get_template_part( 'includes/modal' );
get_template_part( 'includes/inner_header' );
$title = get_the_title();
$content = get_the_content();
$permalink = get_the_permalink();

$case_results_per_page = lex_get_option( 'case_results_per_page' );
if( empty( $case_results_per_page ) ){
	$case_results_per_page = 4;
}

$cur_page = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; //get curent page
$main_query = new WP_Query(array(
	'post_type'			=> 'case_result',
	'post_status'		=> 'publish',
	'posts_per_page'	=> $case_results_per_page,
	'case_result_letter'=> get_query_var( 'term' ),
	'paged' 			=> $cur_page,
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
 $case_result_filter = lex_get_option( 'case_result_filter' );
 $case_result_single = lex_get_option( 'case_result_single' );

?>
<section>
	<div class="container">	
		<?php if( $case_result_single == "modal" ): ?>
			<input class="open_modal" value="case_result" type="hidden" />
		<?php endif; ?>
		<?php echo apply_filters( 'the_content', $content ); ?>
		<?php if( $case_result_filter == 'yes' ): ?>
			<div class="row">
				<div class="col-md-12 text-center">
					<ul class="list-inline list-unstyled filter clearfix">
						<?php echo lex_filter( 'case_result_letter', $permalink ); ?>
					</ul>
				</div>
			</div>
		<?php endif; ?>
    
		
		<?php if( $main_query->have_posts() ): ?>
			<?php $counter = 0; ?>
			<!-- case results boxes -->
			<div class="row">
				<?php while( $main_query->have_posts() ): ?>
					<?php
						if( $counter == 2 ){
							$counter = 0;
					?>
						</div>
						<div class="row">
					<?php	
						}
						$counter++;
						$main_query->the_post(); 
						$post_id = get_the_ID();
						$post_meta = get_post_custom();
						$court = lex_get_smeta( 'court', $post_meta, '' );
						$date = lex_get_smeta( 'date', $post_meta, '' );
						$charged = lex_get_smeta( 'charged', $post_meta, '' );
						$result = lex_get_smeta( 'result', $post_meta, '' );
						$amount = lex_get_smeta( 'amount', $post_meta, '' );
					?>

					<!-- 1 -->
					<div class="col-md-6">
						<div class="case-result-box">
							<div class="case-top">
								<a href="<?php the_permalink() ?>" class="lex_modal"><h5><strong><?php the_title(); ?></strong></h5></a>
								<h6 class="subheading"><i><?php echo $court; echo "&nbsp;"; ?></i></h6>
							</div>
							<div class="case-result-meta">
								<ul class="list-unstyled">
									<?php if( !empty( $date ) ): ?>
										<li class="text-left"><i class="fa fa-clock-o"></i> <?php echo $date; ?></li>
									<?php endif; ?>
									<?php if( !empty( $charged ) ): ?>
										<li class="text-left"><i class="fa fa-pencil"></i><?php echo $charged; ?></li>
									<?php endif; ?>
									<?php if( !empty( $result ) ): ?>
										<li class="text-left"><i class="fa fa-gavel"></i> <?php echo $result ?></li>
									<?php endif; ?>
								</ul>
							</div>
							<div class="value">
								<a href="<?php the_permalink() ?>" class="lex_modal"><h3 class="text-left"><strong><?php echo $amount ?></strong></h3></a>
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
					<!-- .1-->				
				<?php endwhile; ?>
			</div>
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
		<?php else: ?>
			<div class="row">
				<div class="col-md-12 text-center">
					<h2>
						<?php _e( 'Nothing found here!', 'lex' ); ?>
					</h2>
				</div>
			</div>
		<?php endif; ?>
	</div>
</section>
<?php
wp_reset_query();
lex_bottom_sidebar();
get_footer();
?>