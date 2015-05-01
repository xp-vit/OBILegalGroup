<?php
get_header();
the_post();
get_template_part( 'includes/inner_header' );
?>
<section>
	<div class="container">
		<div class="row">
			<!-- content -->
			<div class="col-md-9">
				<?php 		
					$content = get_the_content();
					lex_the_content( $content, true, false );
					lex_bottom_sidebar( '', true );
				?>
				<?php comments_template( '', true ) ?>
			</div>
			<div class="col-md-3">
				<?php get_sidebar( 'page' ); ?>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>