<!-- navigation scrolled -->
<div class="main-nav scrolled <?php if(is_front_page()){ echo 'sticky-nav'; } ?> ">
<!-- lex_nav_trig is used to deterimne if the navigation should be fixed in position or not -->
<div class="lex_nav_trig"></div>
<nav class="navbar navbar-default" role="navigation">
  <div class="container_toggle container">
	<div class="navbar-header">
	  <button class="navbar-toggle button-white menu" data-toggle="collapse" data-target=".navbar-collapse">
	  <span class="sr-only"><?php _e( 'Toggle navigation', 'lex' ) ?></span>
	  <i class="fa fa-bars"></i>
	  </button>
	  
	  <!-- smaller logo -->
	  <a class="navbar-brand" href="<?php echo esc_url( home_url() ); ?>">
		<img src="<?php echo esc_url( lex_get_option('site_logo') ); ?>" class="img-responsive" title="" alt="" />
	  </a>
	  <!-- .smaller logo -->
	  
	</div>
	<div class="collapse navbar-collapse">
	  <!-- main nav -->
                <?php
		   if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ 'top-navigation' ] ) ) {
		      if( is_front_page() ){
			   wp_nav_menu( array(
				'theme_location'  	=> 'top-navigation',
				'menu_class'        => 'nav navbar-nav',
				'container'			=> false,
				'echo'          	=> true,
				'items_wrap'        => '<ul class="%2$s dropup">%3$s</ul>',
				'depth'         	=> 10,
				'walker' 			=> new lex_walker
			   ) );	
		      } else {
			   wp_nav_menu( array(
				'theme_location'  	=> 'top-navigation',
				'menu_class'        => 'nav navbar-nav',
				'container'			=> false,
				'echo'          	=> true,
				'items_wrap'        => '<ul class="%2$s">%3$s</ul>',
				'depth'         	=> 10,
				'walker' 			=> new lex_walker
			   ) );
		      }		
		  }
 	        ?>
	  <!-- .main nav -->
	  
	  <!-- quick contact -->
	  <ul class="nav navbar-nav navbar-right hidden-xs">
		<li>
		  <div class="quick-contact">
			<p class="phone"><?php echo lex_get_option('contact_phone'); ?></p>
		  </div>
		</li>
	  </ul>
	  <!-- quick contact -->
	  
	</div>
  </div>
</nav>
</div>
<!-- .navigation scrolled -->