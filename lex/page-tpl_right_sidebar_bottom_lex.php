<?php
/*
	Template Name: Page With Right Sidebar / Footer Sections
*/
get_header();
the_post();
get_template_part( 'includes/inner_header' );
?>

<?php 
lex_bottom_sidebar();
get_footer();
?>