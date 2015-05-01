<?php
/*==================
 SINGLE BLOG POST
==================*/

get_header();
get_template_part( 'includes/inner_header' );
the_post();
?>
<section>
	<div class="container">
		<div class="row">
			<!-- content -->
			<div class="col-md-9">
				<!-- 1 -->
				<div class="row">
					<!-- post -->
					<div class="col-md-12">
						<div class="practice-box team blog">
							<div class="practice-box-wrap">
								<div class="media">
									<?php echo lex_the_media(); ?>
								</div>
								<div class="meta clearfix text-left">
									<ul class="list-unstyled list-inline">
										<li>
											<i class="fa fa-bars"></i>
											<?php echo lex_the_categories(); ?>
										</li>
										<li>
											<i class="fa fa-user"></i>
											<?php the_author(); ?>
										</li>
										<li>
											<i class="fa fa-comment"></i>
											<?php comments_number( 'No Comments', '1 Comment', '% Comments' ); ?>
										</li>
										<li>
											<i class="fa fa-clock-o"></i>
											<?php the_time('F j, Y'); ?>
										</li>
									</ul>
								</div>
								<div class="content">
									<h3>
										<?php the_title(); ?>
									</h3>
									<p>
										<?php
										$content = get_the_content();
										lex_the_content( $content, true, false );
										?>
									</p>
								</div>
							</div>
							<div class="meta meta-tags clearfix text-left">
								<ul class="list-unstyled list-inline">
									<?php echo lex_the_tags(); ?>
								</ul>
							</div>
						</div>
					</div><!-- .post -->
				</div><!-- .1 -->
				<!-- buttons -->
				<?php
				$post_page_links = lex_link_pages();
				if( !empty( $post_page_links ) ){
				?>
					<div class="row">
						<div class="col-md-12">
							<div class="prev-next text-center">
								<div class="btn-group lex blog">
									<?php echo $post_page_links; ?>
								</div>
							</div>
						</div>
					</div><!-- .buttons -->				
				<?php
				}
				?>
				<?php comments_template( '', true ) ?>
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
lex_bottom_sidebar();
get_footer();
?>