<?php
/*
	Template Name: Home Page
*/
get_header();
the_post();
get_template_part( 'includes/home_header' );
?>
<?php
$content = get_the_content();
lex_the_content( $content );
lex_bottom_sidebar();
get_footer();
?>