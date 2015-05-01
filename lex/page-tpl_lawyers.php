<?php
/*
	Template Name: Lawyers
*/

get_header();
the_post();
get_template_part( 'includes/modal' );
get_template_part( 'includes/inner_header' );
$title = get_the_title();
$content = get_the_content();
$permalink = get_the_permalink();

$lawyers_per_page = lex_get_option( 'lawyers_per_page' );
if( empty( $lawyers_per_page ) ){
	$lawyers_per_page = 4;
}

$cur_page = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; //get curent page
$main_query = new WP_Query(array(
	'post_type'			=> 'lawyer',
	'post_status'		=> 'publish',
	'posts_per_page'	=> $lawyers_per_page,
	'lawyer_letter'		=> get_query_var( 'term' ),
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
 
$counter = 0;
$lawyer_filter = lex_get_option( 'lawyer_filter'); 
$lawyer_single = lex_get_option( 'lawyer_single' );

?>
<section>
	<div class="container">	
		<?php if( $lawyer_single == "modal" ): ?>
			<input class="open_modal" value="lawyer" type="hidden"/>
		<?php endif; ?>
		<?php echo apply_filters( 'the_content', $content ); ?>
		<?php if( $lawyer_filter == 'yes' ): ;?>
			<div class="row">
				<div class="col-md-12 text-center">
					<ul class="list-inline list-unstyled filter clearfix">
						<?php echo lex_filter( 'lawyer_letter', $permalink ); ?>
					</ul>
				</div>
			</div>
		<?php endif; ?>
		
		<?php if( $main_query->have_posts() ): ?>
			<div class="row">
			<?php while( $main_query->have_posts() ): ?>
				<?php if( $counter == 4 ){ $counter = 0;?>
					</div>
					<div class="row">
				<?php } $counter++; ?>
				<?php $main_query->the_post(); ?>
				<?php $position = get_post_meta( get_the_ID(), 'position' ); ?>
				<!-- lawyers boxes -->
				
				  
					<!-- 1 -->
					<div class="col-md-3">
						<div class="practice-box team">
							<div class="practice-box-wrap">
								<div class="media">
									<?php if( has_post_thumbnail() ): ?>
										<?php the_post_thumbnail( 'lawyer' ); ?>
									<?php endif; ?>
								</div>
								<div class="content">
									<p class="name"><a href="<?php the_permalink() ?>" class="lex_modal"><strong><?php the_title(); ?></strong></a></p>
									<p class="position"><?php echo !empty( $position ) ? $position[0] : ''; ?></p>
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
					<!-- .1-->			  				
				<!-- .lawyers boxes -->
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