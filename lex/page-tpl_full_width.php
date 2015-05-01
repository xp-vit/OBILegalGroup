<?php
/*
	Template Name: Page Full Width
*/
get_header();
the_post();
get_template_part( 'includes/inner_header' );
$content = get_the_content();
lex_the_content( $content );
lex_bottom_sidebar();
?>
<?php if( comments_open() ): ?>
	<section>
		<div class="container">
			<div class="row">
				<!-- content -->
				<div class="col-md-12">
					<!-- 1 -->
					<div class="row">
						<?php comments_template( '', true ) ?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>
<?php get_footer(); ?>