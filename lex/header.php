<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="keywords" content="<?php echo esc_attr( lex_get_option( 'seo_keywords' ) ) ?>" />
<meta name="description" content="<?php echo esc_attr( lex_get_option( 'seo_description' ) ) ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<!-- Title -->
<title><?php
/*
 * Print the <title> tag based on what is being viewed.
 */
global $page, $paged;

wp_title( '|', true, 'right' );

// Add the blog name.
bloginfo( 'name' );

// Add the blog description for the home/front page.
$site_description = get_bloginfo( 'description', 'display' );
if ( $site_description && ( is_home() || is_front_page() ) )
	echo " | $site_description";

// Add a page number if necessary:
if ( $paged >= 2 || $page >= 2 )
	echo ' | ' . sprintf( __( 'Page %s', 'lex' ), max( $paged, $page ) );

?></title>

<!-- Favicon -->
<link rel="shortcut icon" type="image/x-icon" href="<?php echo esc_attr( lex_get_option( 'site_favicon' ) ); ?>">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js">
</script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js">
</script>
<![endif]-->
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> id="body">
<div class="jPrepreloader">
</div>
<!-- modal loader -->
<div class="modal-loader-wrap">
	<div class="modal-loader">
		<div class="loader-wrap">
			<i class="fa fa-cog fa-spin"></i>
		</div>
	</div>
</div>
<!-- modal loader -->
<!-- ==================================================================================================================================
HEADER
======================================================================================================================================= --> 
