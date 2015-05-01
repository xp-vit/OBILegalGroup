<?php header('Content-type: text/css'); 
	
	/* OVERALL */
	$dark_color = lex_get_option( 'dark_color' );
	$preloader_color = lex_get_option( 'preloader_color' );
	$header_color = lex_get_option( 'header_color' );
	$footer_color = lex_get_option( 'footer_color' );
	$bg_inner_image = lex_get_option( 'site_inner_bg' );
	$bg_main_image = lex_get_option( 'site_slider_bg' );
	$bg_community_image = lex_get_option( 'community_involvment_bg' );
	$bg_practice_image = lex_get_option( 'practice_areas_bg' );
	$bg_overview_image = lex_get_option( 'firm_overview_bg' );
	$bg_diversity_image = lex_get_option( 'diversity_counsel_bg' );
?>
.big-button:hover{
	border: none;
}
.home-header {
	background: <?php echo $dark_color; ?> url('<?php echo $bg_main_image; ?>') no-repeat;
	background-attachment: fixed;
	background-size: cover;
}

.home-header.inner {
	background: <?php echo $header_color; ?>;
	padding:60px 0px;
}

.image-background, .image-background.inner {
	background: <?php echo $dark_color; ?> url(<?php echo $bg_inner_image; ?>) no-repeat;
	background-attachment: fixed;
	background-size: cover;
}

.image-background-community, .image-background-community.inner {
	background: <?php echo $dark_color; ?> url(<?php echo $bg_community_image; ?>) no-repeat;
	background-attachment: fixed;
	background-size: cover;
}

.image-background-diversity, .image-background-diversity.inner {
	background: <?php echo $dark_color; ?> url(<?php echo $bg_diversity_image; ?>) no-repeat;
	background-attachment: fixed;
	background-size: cover;
}

.image-background-overview, .image-background-overview.inner {
	background: <?php echo $dark_color; ?> url(<?php echo $bg_overview_image; ?>) no-repeat;
	background-attachment: fixed;
	background-size: cover;
}

.image-background-practice, .image-background-practice.inner {
	background: <?php echo $dark_color; ?> url(<?php echo $bg_practice_image; ?>) no-repeat;
	background-attachment: fixed;
	background-size: cover;
}

.dark {
	background: <?php echo $dark_color; ?>;
}

.footer{
	background: <?php echo $footer_color; ?>;
}

#jpreOverlay,.jPrepreloader { 
	background-color: <?php echo $preloader_color; ?>; 
}