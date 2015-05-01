<?php
get_header();
$post = get_posts( array(
	'post_type' => 'page',
	'meta_key' => '_wp_page_template',
	'meta_value' => 'page-tpl_404.php'
) );
$post = array_shift( $post );

$subheading = 'Page not found';
$title = "404";
if( !empty( $post ) ){
	$subtitle = get_post_meta( $post->ID, 'subheading' );
	if( !empty( $subtitle ) ){
		$subheading = $subtitle[0];
	}
	$title = $post->post_title;
}
?>
<section class="home-header inner">
  
  <!-- header -->
  <div class="header">
    <div class="container">
      <div class="row">
        
        <!-- logo -->
        <div class="col-md-4 col-sm-4 col-xs-5">
          <div class="logo">
            <a href="<?php echo esc_attr( home_url() ); ?>">
            <img src="<?php echo esc_attr( lex_get_option('site_logo') ) ?>" class="img-responsive" title="<?php echo esc_attr( lex_get_option('site_name') ) ?>" alt="<?php echo esc_attr( lex_get_option('site_name') ) ?>" />
            </a>
          </div>
        </div>
        <!-- .logo -->
        
        <!-- quick contact -->
        <div class="col-md-8 col-sm-8 col-xs-7">
          <div class="quick-contact text-right">
            <p class="phone"><?php echo lex_get_option('contact_phone') ?></p>
            <p><?php echo lex_get_option('site_slogan') ?></p>
          </div>
        </div>
        <!-- .quick contact -->
        
      </div>
    </div>
  </div>
  <!-- .header -->
  </section>
<section class="image-background inner">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="text-center white-text"><?php echo $title; ?></h1>
        <h6 class="subheading white-text text-center"><i><?php ; echo $subheading; ?></i></h6>
      </div>
    </div>
  </div>
  
  <?php get_template_part( 'includes/navigation' ); ?>
  
</section>
<?php
if( !empty( $post ) ){
	lex_bottom_sidebar( $post->ID );
}
get_footer(); ?>