<?php

	/**********************************************************************
	***********************************************************************
	LEX FUNCTIONS
	**********************************************************************/


require_once dirname(__FILE__).DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'class-tgm-plugin-activation.php';
require_once dirname(__FILE__).DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'lex_widgets.php';
require_once dirname(__FILE__).DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'shortcodes.php';


$error_labels = array(
	'first_name_empty' 		=> __( "Please enter your first name.", "lex" ),
	'last_name_empty'	 	=> __( "Please enter your last name.", "lex" ),
	'username_no_spaces' 	=> __( "Sorry, no spaces allowed in username.", "lex" ),
	'username_empty' 		=> __( "Please enter a username.", "lex." ),
	'username_exists' 		=> __( "Username already exists, please try another.", "lex" ),
	'email_not_valid' 		=> __( "Please enter a valid email.", "lex" ),
	'email_in_use'			=> __( "This email address is already in use.", "lex" ),
	'password_length'		=> __( "Password must be at least six characters.", "lex" ),
	'password_mismach'		=> __( "Passwords do not match.", "lex" ),
	'empty_city'			=> __( "You must input your city.", "lex" ),
	'empty_gender'			=> __( "You must select your gender.", "lex" ),
	'empty_age'				=> __( "You must input your age.", "lex" ),
	'nonce'					=> __( 'Sorry, but this request is invalid.', 'lex' ),
	'not_confirmed'			=> __( "This account needs email verification.", "lex" ),
	'invalid_username'		=> __( "Username is invalid.", "lex" ),
	'invalid_password'		=> __( "Password is invalid.", "lex" ),
	'sign_in_error'			=> __( "Error singin you in.", "lex" ),
);

add_action( 'tgmpa_register', 'lex_requred_plugins' );

function lex_requred_plugins(){
	$plugins = array(
		array(
				'name'                 => 'NHP Options',
				'slug'                 => 'nhpoptions',
				'source'               => get_stylesheet_directory() . '/lib/plugins/nhpoptions.zip',
				'required'             => true,
				'version'              => '',
				'force_activation'     => false,
				'force_deactivation'   => false,
				'external_url'         => '',
		),		
		array(
				'name'                 => 'Smeta',
				'slug'                 => 'smeta',
				'source'               => get_stylesheet_directory() . '/lib/plugins/smeta.zip',
				'required'             => true,
				'version'              => '',
				'force_activation'     => false,
				'force_deactivation'   => false,
				'external_url'         => '',
		),
	);

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
			'domain'           => 'lex',
			'default_path'     => '',
			'parent_menu_slug' => 'themes.php',
			'parent_url_slug'  => 'themes.php',
			'menu'             => 'install-required-plugins',
			'has_notices'      => true,
			'is_automatic'     => false,
			'message'          => '',
			'strings'          => array(
				'page_title'                      => __( 'Install Required Plugins', 'lex' ),
				'menu_title'                      => __( 'Install Plugins', 'lex' ),
				'installing'                      => __( 'Installing Plugin: %s', 'lex' ),
				'oops'                            => __( 'Something went wrong with the plugin API.', 'lex' ),
				'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ),
				'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ),
				'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ),
				'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ),
				'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ),
				'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ),
				'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ),
				'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ),
				'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
				'activate_link'                   => _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
				'return'                          => __( 'Return to Required Plugins Installer', 'lex' ),
				'plugin_activated'                => __( 'Plugin activated successfully.', 'lex' ),
				'complete'                        => __( 'All plugins installed and activated successfully. %s', 'lex' ),
				'nag_type'                        => 'updated'
			)
	);

	tgmpa( $plugins, $config );
}

if (!isset($content_width))
	{
	$content_width = 1920;
	}

function lex_options(){
	global $lex_opts;
	$args = array();
	$sections = array();
	$tabs = array();
	$args['dev_mode'] = false;
	$args['opt_name'] = 'lex';
	$args['menu_title'] = __('Lex Options', 'lex');
	$args['page_title'] = __('Lex Settings', 'lex');
	$args['page_slug'] = 'lex_theme_options';
	
	
	/**********************************************************************
	***********************************************************************
	OVERALL
	**********************************************************************/
	$sections[] = array(
		'title' => __('Overall', 'lex') ,
		'icon' => NHP_OPTIONS_URL . 'img/glyphicons/glyphicons_119_adjust.png',
		'desc' => __('This is basic section where you can set up main settings for your website.', 'lex'),
		'fields' => array(
			//Favicon
			array(
				'id' => 'site_slider_bg',
				'type' => 'upload',
				'title' => __('Site Main Image', 'lex') ,
				'desc' => __('Upload image for the home page background image.', 'lex')
			),
			//Favicon
			array(
				'id' => 'site_favicon',
				'type' => 'upload',
				'title' => __('Site Favicon', 'lex') ,
				'desc' => __('Please upload favicon here in PNG or JPG format. <small>(18px 18px maximum size recommended)</small>)', 'lex')
			),
			//Top Bar Logo
			array(
				'id' => 'site_logo',
				'type' => 'upload',
				'title' => __('Site Logo', 'lex') ,
				'desc' => __('Upload site logo', 'lex')
			),
			//Top Bar Logo
			array(
				'id' => 'contact_phone',
				'type' => 'text',
				'title' => __('Contact Text', 'lex') ,
				'desc' => __('Input contact phone or something and it will be next to the navigation', 'lex')
			),			
			//Top Bar Logo
			array(
				'id' => 'site_inner_bg',
				'type' => 'upload',
				'title' => __('Site Inner Background', 'lex') ,
				'desc' => __('Upload image for the inner backgrounds', 'lex')
			),
			//Custom Community
			array(
				'id' => 'community_involvment_bg',
				'type' => 'upload',
				'title' => __('Community Involvement Background', 'lex') ,
				'desc' => __('Upload image for the Community Involvement header', 'lex')
			),
			//Custom Firm overview
			array(
				'id' => 'firm_overview_bg',
				'type' => 'upload',
				'title' => __('Firm Overview Background', 'lex') ,
				'desc' => __('Upload image for the Firm Overview header', 'lex')
			),
			//Custom Practice areas
			array(
				'id' => 'practice_areas_bg',
				'type' => 'upload',
				'title' => __('Practice areas Background', 'lex') ,
				'desc' => __('Upload image for the Practice areas header', 'lex')
			),
			//Custom Diversity Counseling
			array(
				'id' => 'diversity_counsel_bg',
				'type' => 'upload',
				'title' => __('Diversity Counseling Background', 'lex') ,
				'desc' => __('Upload image for the Diversity counseling header', 'lex')
			),
			//Top Bar Logo
			array(
				'id' => 'read_more_icon',
				'type' => 'select',
				'title' => __('Read More Icon', 'lex') ,
				'desc' => __('Select read more icon for all of the post types.', 'lex'),
				'options' => lex_awesome_icons_list(),
				'std' => 'sign-out'
			),
			//Masonry
			array(
				'id' => 'use_masonry',
				'type' => 'select',
				'title' => __('Masonry', 'lex') ,
				'desc' => __('Use masonry in two columns blog listing?', 'lex'),
				'options' => array(
					'yes' => __( 'Yes', 'lex' ),
					'no' => __( 'No', 'lex' )
				)
			),
			//Footer Copyrights
			array(
				'id' => 'footer_copyrights',
				'type' => 'text',
				'title' => __('Footer Copyrights', 'lex') ,
				'desc' => __('Input footer copyrights.', 'lex'),
				'std' => 'sign-out'
			),
		)
	);
	/**********************************************************************
	***********************************************************************
	SEO
	**********************************************************************/
	
	$sections[] = array(
		'title' => __('SEO', 'lex') ,
		'icon' => NHP_OPTIONS_URL . 'img/glyphicons/glyphicons_079_signal.png',
		'desc' => __('This is important part for search engines.', 'lex'),
		'fields' => array(	
			// Keywords
			array(
				'id' => 'seo_keywords',
				'type' => 'text',
				'title' => __('Keywords', 'lex') ,
				'desc' => __('<br />Type here website keywords separated by comma. <small>(eg. lorem, ipsum, adiscipit)</small>.', 'lex')
			) ,
			
			// Description
			array(
				'id' => 'seo_description',
				'type' => 'textarea',
				'title' => __('Description', 'lex') ,
				'desc' => __('<br />Type here website description.', 'lex')
			) ,
		)
	);
	
	/**********************************************************************
	***********************************************************************
	SUBSCRIPTION
	**********************************************************************/
	
	$sections[] = array(
		'title' => __('Subscription', 'lex') ,
		'icon' => NHP_OPTIONS_URL . 'img/glyphicons/glyphicons_073_signal.png',
		'desc' => __('Set up subscription API key and list ID.', 'lex'),
		'fields' => array(
			// Mail Chimp API
			array(
				'id' => 'mail_chimp_api',
				'type' => 'text',
				'title' => __('API Key', 'lex') ,
				'desc' => __('<br />Type your mail chimp api key.', 'lex')
			) ,	
			// Mail Chimp List ID
			array(
				'id' => 'mail_chimp_list_id',
				'type' => 'text',
				'title' => __('List ID', 'lex') ,
				'desc' => __('<br />Type here ID of the list on which users will subscribe.', 'lex')
			) ,
		)
	);

	/***********************************************************************
	Social
	**********************************************************************/
	$sections[] = array(
		'title' => __('Social', 'lex') ,
		'icon' => NHP_OPTIONS_URL . 'img/glyphicons/glyphicons_072_bookmark.png',
		'desc' => __('Set links to social networks in th footer.', 'lex'),
		'fields' => array(
			//Linkedin
			array(
				'id' => 'share_linkedin',
				'type' => 'text',
				'title' => __('Linkedin link', 'lex'),
				'desc' => __('Input link to Linkedin.', 'lex'),
				'std' => ''
			) ,					
			//Facebook
			array(
				'id' => 'share_facebook',
				'type' => 'text',
				'title' => __('Facebook link', 'lex'),
				'desc' => __('Input link to Facebook.', 'lex'),
				'std' => ''
			) ,
			//Main Color
			array(
				'id' => 'share_twitter',
				'type' => 'text',
				'title' => __('Twitter link', 'lex'),
				'desc' => __('Input link to Twitter.', 'lex'),
				'std' => ''
			),
			//Google +
			array(
				'id' => 'share_google_plus',
				'type' => 'text',
				'title' => __('Google + link', 'lex'),
				'desc' => __('Input link to Google+.', 'lex'),
				'std' => ''
			),
		)
	);	
	
	/***********************************************************************
	Appearance
	**********************************************************************/
	$sections[] = array(
		'title' => __('Appearance', 'lex') ,
		'icon' => NHP_OPTIONS_URL . 'img/glyphicons/glyphicons_030_pencil.png',
		'desc' => __('Set up the looks.', 'lex'),
		'fields' => array(
			//Header Color
			array(
				'id' => 'header_color',
				'type' => 'color',
				'title' => __('Header BG Color', 'lex'),
				'desc' => __('Select header background color.', 'lex'),
				'std' => '#202020'
			) ,					
			//Footer Color
			array(
				'id' => 'footer_color',
				'type' => 'color',
				'title' => __('Footer BG Color', 'lex'),
				'desc' => __('Select footer background color.', 'lex'),
				'std' => '#202020'
			) ,

			//Main Color
			array(
				'id' => 'dark_color',
				'type' => 'color',
				'title' => __('Dark Section BG Color', 'lex'),
				'desc' => __('Select dark section background main color.', 'lex'),
				'std' => '#202020'
			),
			
			//Preloader Color
			array(
				'id' => 'preloader_color',
				'type' => 'color',
				'title' => __('Preloader BG Color', 'lex'),
				'desc' => __('Selectpreloader background main color.', 'lex'),
				'std' => '#202020'
			),
		)
	);	
	/**********************************************************************
	***********************************************************************
	PRACTICE AREAS SETTINGS
	**********************************************************************/
	
	$sections[] = array(
		'title' => __('Practice Area Settings', 'lex') ,
		'icon' => NHP_OPTIONS_URL . 'img/glyphicons/glyphicons_154_show_big_thumbnails.png',
		'desc' => __('Practice area settings.', 'lex'),
		'fields' => array(
			array(
				'id' => 'practice_area_filter',
				'type' => 'select',
				'title' => __('Show Filter', 'lex') ,
				'desc' => __('<br />Show or hide the letter filter.', 'lex'),
				'options' => array(
					'yes' => __( 'Yes', 'lex' ),
					'no'  => __( 'No', 'lex' )
				)
			),
			array(
				'id' => 'practice_area_single',
				'type' => 'select',
				'title' => __('Open practice Areas In', 'lex') ,
				'desc' => __('<br />Select how to show practice areas single.', 'lex'),
				'options' => array(
					'modal' => __( 'Modal', 'lex' ),
					'single'  => __( 'Single Page', 'lex' )
				),
			),
			array(
				'id' => 'practice_areas_per_page',
				'type' => 'text',
				'title' => __('Practice Areas Per Page', 'lex') ,
				'desc' => __('<br />Input number of practice areas to show per page (-1 to show them all).', 'lex'),
			)
		)
	);
	/**********************************************************************
	***********************************************************************
	CASE RESULTS SETTINGS
	**********************************************************************/
	
	$sections[] = array(
		'title' => __('Case Results Settings', 'lex') ,
		'icon' => NHP_OPTIONS_URL . 'img/glyphicons/glyphicons_144_folder_open.png',
		'desc' => __('Case results settings.', 'lex'),
		'fields' => array(
			array(
				'id' => 'case_result_filter',
				'type' => 'select',
				'title' => __('Show Filter', 'lex') ,
				'desc' => __('<br />Show or hide the letter filter.', 'lex'),
				'options' => array(
					'yes' => __( 'Yes', 'lex' ),
					'no'  => __( 'No', 'lex' )
				)
			),
			array(
				'id' => 'case_result_single',
				'type' => 'select',
				'title' => __('Open Case Results In', 'lex') ,
				'desc' => __('<br />Select how to show case results single.', 'lex'),
				'options' => array(
					'modal' => __( 'Modal', 'lex' ),
					'single'  => __( 'Single Page', 'lex' )
				)
			),
			array(
				'id' => 'case_results_per_page',
				'type' => 'text',
				'title' => __('Case Results Per Page', 'lex') ,
				'desc' => __('<br />Input number of case results to show per page (-1 to show them all).', 'lex'),
			)		
		)
	);
	/**********************************************************************
	***********************************************************************
	LAWYERS SETTINGS
	**********************************************************************/
	
	$sections[] = array(
		'title' => __('Lawyers Settings', 'lex') ,
		'icon' => NHP_OPTIONS_URL . 'img/glyphicons/glyphicons_043_group.png',
		'desc' => __('Lawyers settings.', 'lex'),
		'fields' => array(
			array(
				'id' => 'lawyer_filter',
				'type' => 'select',
				'title' => __('Show Filter', 'lex') ,
				'desc' => __('<br />Show or hide the letter filter.', 'lex'),
				'options' => array(
					'yes' => __( 'Yes', 'lex' ),
					'no'  => __( 'No', 'lex' )
				)
			),
			array(
				'id' => 'lawyer_single',
				'type' => 'select',
				'title' => __('Open Lawyers In', 'lex') ,
				'desc' => __('<br />Select how to show lawyers single.', 'lex'),
				'options' => array(
					'modal' => __( 'Modal', 'lex' ),
					'single'  => __( 'Single Page', 'lex' )
				)
			),
			array(
				'id' => 'lawyers_per_page',
				'type' => 'text',
				'title' => __('Lawyers Per Page', 'lex') ,
				'desc' => __('<br />Input number of lawyers to show per page (-1 to show them all).', 'lex'),
			)
		)
	);
	/**********************************************************************
	***********************************************************************
	HOME PAGE SETTINGS
	**********************************************************************/
	
	$sections[] = array(
		'title' => __('Home Page', 'lex') ,
		'icon' => NHP_OPTIONS_URL . 'img/glyphicons/glyphicons_020_home.png',
		'desc' => __('Home page settings.', 'lex'),
		'fields' => array(
			array(
				'id' => 'home_dynamic',
				'type' => 'textarea',
				'title' => __('Dynamic Text', 'lex') ,
				'desc' => __('<br />Input each text in the new line.', 'lex'),
			),
			array(
				'id' => 'home_static',
				'type' => 'textarea',
				'title' => __('Static Text', 'lex') ,
				'desc' => __('<br />Input static text.', 'lex'),
			),
			array(
				'id' => 'btn_link',
				'type' => 'text',
				'title' => __('Site Main Button Link', 'lex') ,
				'desc' => __('<br />Input link for the main button.', 'lex'),
			),
			array(
				'id' => 'btn_text',
				'type' => 'text',
				'title' => __('Site Main Button Text', 'lex') ,
				'desc' => __('<br />Input text for the main button.', 'lex'),
			),
			array(
				'id' => 'btn_icon',
				'type' => 'select',
				'title' => __('Site Main Button Icon', 'lex'),
				'options' => lex_awesome_icons_list(),
				'desc' => __('<br />Select icon for the main button.', 'lex'),
			),
			array(
				'id' => 'site_slogan',
				'type' => 'textarea',
				'title' => __('Site Slogan', 'lex') ,
				'desc' => __('<br />Type in site Slogan which will appear on the home page.', 'lex'),
			),
		)
	);
	
	/**********************************************************************
	***********************************************************************
	CONTACT PAGE SETTINGS
	**********************************************************************/
	
	$sections[] = array(
		'title' => __('Contact Page', 'lex') ,
		'icon' => NHP_OPTIONS_URL . 'img/glyphicons/glyphicons_151_edit.png',
		'desc' => __('Contact page settings.', 'lex'),
		'fields' => array(
			array(
				'id' => 'contact_form_title',
				'type' => 'text',
				'title' => __('Form Title', 'lex') ,
				'desc' => __('<br />Input title of for the contact form.', 'lex'),
			),
			array(
				'id' => 'contact_form_subtitle',
				'type' => 'text',
				'title' => __('Form Subtitle', 'lex') ,
				'desc' => __('<br />Input contact form subtitle.', 'lex'),
			),
			array(
				'id' => 'contact_form_email',
				'type' => 'text',
				'title' => __('Contact Email', 'lex') ,
				'desc' => __('<br />Input email where the messages should arive.', 'lex'),
			),
			array(
				'id' => 'contact_form_subject',
				'type' => 'text',
				'title' => __('Contact Subject', 'lex') ,
				'desc' => __('<br />Input subject for the message which will arrive to you.', 'lex'),
			),
		)
	);
	
	$lex_opts = new NHP_Options($sections, $args, $tabs);
	}
if (class_exists('NHP_Options')){
	add_action('init', 'lex_options', 10);
}
/* do shortcodes in the excerpt */
add_filter('the_excerpt', 'do_shortcode');
	
/* include custom made widgets */
function lex_widgets_init(){
	
	register_sidebar(array(
		'name' => __('Blog Sidebar', 'lex') ,
		'id' => 'sidebar-blog',
		'before_widget' => '<div class="col-md-12"><div class="sidebar-widget">',
		'after_widget' => '</div></div></div>',
		'before_title' => '<div class="sidebar-widget-title"><h4>',
		'after_title' => '</h4></div><div class="sidebar-widget-content">',
		'description' => __('Appears on the right side of the blog listing, and blog posts.', 'lex')
	));
	
	register_sidebar(array(
		'name' => __('Page Sidebar', 'lex') ,
		'id' => 'sidebar-page',
		'before_widget' => '<div class="col-md-12"><div class="sidebar-widget">',
		'after_widget' => '</div></div></div>',
		'before_title' => '<div class="sidebar-widget-title"><h4>',
		'after_title' => '</h4></div><div class="sidebar-widget-content">',
		'description' => __('Appears on the right side of the pages.', 'lex')
	));
}

add_action('widgets_init', 'lex_widgets_init');


function lex_post_types_and_taxonomies(){
	register_post_type( 'practice_area', array(
		'labels' => array(
			'name' => __( 'Practice Areas', 'lex' ),
			'singular_name' => __( 'Practice Area', 'lex' )
		),
		'public' => true,
		'menu_icon' => 'dashicons-welcome-learn-more',
		'has_archive' => false,
		'supports' => array(
			'title',
			'editor',
		)
	));	
	
	register_post_type( 'case_result', array(
		'labels' => array(
			'name' => __( 'Case Results', 'lex' ),
			'singular_name' => __( 'Case Result', 'lex' )
		),
		'public' => true,
		'menu_icon' => 'dashicons-portfolio',
		'has_archive' => false,
		'supports' => array(
			'title',
			'editor'
		)
	));	

	register_post_type( 'lawyer', array(
		'labels' => array(
			'name' => __( 'Lawyers', 'lex' ),
			'singular_name' => __( 'Lawyer', 'lex' )
		),
		'public' => true,
		'menu_icon' => 'dashicons-groups',
		'has_archive' => false,
		'supports' => array(
			'title',
			'editor',
			'thumbnail'
		)
	));
	
	register_post_type( 'testimonial', array(
		'labels' => array(
			'name' => __( 'Testimonials', 'lex' ),
			'singular_name' => __( 'Testimonial', 'lex' )
		),
		'public' => true,
		'menu_icon' => 'dashicons-testimonial',
		'has_archive' => false,
		'supports' => array(
			'title',
			'editor',
			'thumbnail'
		)
	));		
	
	register_post_type( 'faq', array(
		'labels' => array(
			'name' => __( 'FAQ', 'lex' ),
			'singular_name' => __( 'FAQ', 'lex' )
		),
		'public' => true,
		'menu_icon' => 'dashicons-sos',
		'has_archive' => false,
		'supports' => array(
			'title',
			'editor'
		)
	));	
	
	register_post_type( 'lex_section', array(
		'labels' => array(
			'name' => __( 'Lex Sections', 'lex' ),
			'singular_name' => __( 'Lex Section', 'lex' )
		),
		'public' => true,
		'has_archive' => false,
		'menu_icon' => 'dashicons-image-rotate-right',		
		'supports' => array(
			'title',
			'editor'
		)
	));	
	
	/* register taxonomies */
	register_taxonomy( 'lawyer_letter', array( 'lawyer' ), array(
		'label' => __( 'Letters', 'coupon' ),
		'hierarchical' => true,
		'labels' => array(
			'name' 							=> __( 'Letters', 'coupon' ),
			'singular_name' 				=> __( 'Letter', 'coupon' ),
			'menu_name' 					=> __( 'Letter', 'coupon' ),
			'all_items'						=> __( 'All Letter', 'coupon' ),
			'edit_item'						=> __( 'Edit Letter', 'coupon' ),
			'view_item'						=> __( 'View Letter', 'coupon' ),
			'update_item'					=> __( 'Update Letter', 'coupon' ),
			'add_new_item'					=> __( 'Add New Letter', 'coupon' ),
			'new_item_name'					=> __( 'New Letter', 'coupon' ),
			'parent_item'					=> __( 'Parent Letter', 'coupon' ),
			'parent_item_colon'				=> __( 'Parent Letter:', 'coupon' ),
			'search_items'					=> __( 'Search Letter', 'coupon' ),
			'popular_items'					=> __( 'Popular Letter', 'coupon' ),
			'separate_items_with_commas'	=> __( 'Separate letter with commas', 'coupon' ),
			'add_or_remove_items'			=> __( 'Add or remove letters', 'coupon' ),
			'choose_from_most_used'			=> __( 'Choose from the most used letters', 'coupon' ),
			'not_found'						=> __( 'No letters found', 'coupon' ),
		)
	) );	
	
	register_taxonomy( 'case_result_letter', array( 'case_result' ), array(
		'label' => __( 'Letters', 'coupon' ),
		'hierarchical' => true,
		'labels' => array(
			'name' 							=> __( 'Letters', 'coupon' ),
			'singular_name' 				=> __( 'Letter', 'coupon' ),
			'menu_name' 					=> __( 'Letter', 'coupon' ),
			'all_items'						=> __( 'All Letter', 'coupon' ),
			'edit_item'						=> __( 'Edit Letter', 'coupon' ),
			'view_item'						=> __( 'View Letter', 'coupon' ),
			'update_item'					=> __( 'Update Letter', 'coupon' ),
			'add_new_item'					=> __( 'Add New Letter', 'coupon' ),
			'new_item_name'					=> __( 'New Letter', 'coupon' ),
			'parent_item'					=> __( 'Parent Letter', 'coupon' ),
			'parent_item_colon'				=> __( 'Parent Letter:', 'coupon' ),
			'search_items'					=> __( 'Search Letter', 'coupon' ),
			'popular_items'					=> __( 'Popular Letter', 'coupon' ),
			'separate_items_with_commas'	=> __( 'Separate letter with commas', 'coupon' ),
			'add_or_remove_items'			=> __( 'Add or remove letters', 'coupon' ),
			'choose_from_most_used'			=> __( 'Choose from the most used letters', 'coupon' ),
			'not_found'						=> __( 'No letters found', 'coupon' ),
		)
	) );

	register_taxonomy( 'practice_area_letter', array( 'practice_area' ), array(
		'label' => __( 'Letters', 'coupon' ),
		'hierarchical' => true,
		'labels' => array(
			'name' 							=> __( 'Letters', 'coupon' ),
			'singular_name' 				=> __( 'Letter', 'coupon' ),
			'menu_name' 					=> __( 'Letter', 'coupon' ),
			'all_items'						=> __( 'All Letter', 'coupon' ),
			'edit_item'						=> __( 'Edit Letter', 'coupon' ),
			'view_item'						=> __( 'View Letter', 'coupon' ),
			'update_item'					=> __( 'Update Letter', 'coupon' ),
			'add_new_item'					=> __( 'Add New Letter', 'coupon' ),
			'new_item_name'					=> __( 'New Letter', 'coupon' ),
			'parent_item'					=> __( 'Parent Letter', 'coupon' ),
			'parent_item_colon'				=> __( 'Parent Letter:', 'coupon' ),
			'search_items'					=> __( 'Search Letter', 'coupon' ),
			'popular_items'					=> __( 'Popular Letter', 'coupon' ),
			'separate_items_with_commas'	=> __( 'Separate letter with commas', 'coupon' ),
			'add_or_remove_items'			=> __( 'Add or remove letters', 'coupon' ),
			'choose_from_most_used'			=> __( 'Choose from the most used letters', 'coupon' ),
			'not_found'						=> __( 'No letters found', 'coupon' ),
		)
	) );
}
add_action('init', 'lex_post_types_and_taxonomies', 0);

/* get url by page template */
function lex_get_permalink_by_tpl( $template_name ){
	$page = get_pages(array(
		'meta_key' => '_wp_page_template',
		'meta_value' => $template_name . '.php'
	));
	if(!empty($page)){
		return get_permalink($page[0]->ID);
	}
	else{
	return "javascript:;";
	}
}

/* add number of cars to the "At a glance" box on Dashboard. Aslo add number of pennding cars if there is any */
function lex_add_custom_post_count(){

	$post_types = array( 'practice_area', 'case_result', 'lawyer', 'testimonial', 'faq' );
    foreach( $post_types as $type ) {
        if( ! post_type_exists( $type ) ){
			continue;
		}
        $num_posts = wp_count_posts( $type );
		$published = intval( $num_posts->publish );
		$post_type = get_post_type_object( $type );
		$text = _n( '%s ' . $post_type->labels->singular_name, '%s ' . $post_type->labels->name, $published, 'your_textdomain' );
		$text = sprintf( $text, number_format_i18n( $published ) );
		if ( current_user_can( $post_type->cap->edit_posts ) ) {
			$items[] = '<a class="'.$type.'-count" href="edit.php?post_type='.$type.'">'.$text."</a>\n";
		} else {
			$items[] = '<span class="'.$type.'-count">'.$text."</span>\n";
		}
		
        if ( $num_posts->pending > 0 ){
			$text = _n( '%s ' . $post_type->labels->singular_name . __( 'Pending', 'lex' ), '%s ' . $post_type->labels->name . __( 'Pending', 'lex' ), $published, 'your_textdomain' );
			$pending = intval( $num_posts->publish );
			$text = sprintf( $text, number_format_i18n( $pending  ) );
			if ( current_user_can( $post_type->cap->edit_posts ) ) {
				$items[] = '<a class="'.$type.'-count" href="edit.php?post_type='.$type.'">'.$text."</a>\n";
			} else {
				$items[] = '<span class="'.$type.'-count">'.$text."</span>\n";
			}
		}
    }
    return $items;
}
add_action('dashboard_glance_items', 'lex_add_custom_post_count');

/* create icons for the custom post types in the At A Glance box */
function lex_custom_post_icons(){
	echo "	<style type='text/css'>
				#dashboard_right_now a.lawyer-count:before,
				#dashboard_right_now span.lawyer-count:before {
				  content: '\\f307';
				}	
				#dashboard_right_now a.case_result-count:before,
				#dashboard_right_now span.case_result-count:before {
				  content: '\\f118';
				}
				#dashboard_right_now a.practice_area-count:before,
				#dashboard_right_now span.practice_area-count:before {
				  content: '\\f322';
				}
				#dashboard_right_now a.testimonial-count:before,
				#dashboard_right_now span.testimonial-count:before {
				  content: '\\f473';
				}
				#dashboard_right_now a.faq-count:before,
				#dashboard_right_now span.faq-count:before {
				  content: '\\f468';
				}
             </style>";
}
add_action( 'admin_head', 'lex_custom_post_icons' );

/* total_defaults */
function lex_defaults( $id ){	
	$defaults = array(
		'site_slider' => '',
		'site_favicon' => '',
		'site_logo' => '',
		'contact_phone' => '',
		'site_inner_bg' => '',
		'read_more_icon' => 'sign-out',
		'footer_copyrights' => '',
		'use_masonry' => 'yes',
		'seo_keywords' => '',
		'seo_description' => '',
		'mail_chimp_api' => '',
		'mail_chimp_list_id' => '',
		'header_color' => '#202020',
		'footer_color' => '#202020',
		'dark_color' => '#202020',
		'preloader_color' => '#202020',
		'practice_area_filter' => '',
		'practice_area_single' => '',
		'case_result_filter' => '',
		'case_result_single' => '',
		'lawyer_filter' => '',
		'lawyer_single' => '',
		'home_dynamic' => '',
		'home_static' => '',
		'btn_link' => '',
		'btn_text' => '',
		'btn_icon' => '',
		'site_slogan' => '',
		'contact_form_title' => '',
		'contact_form_subtitle' => '',
		'contact_form_email' => '',
		'contact_form_subject' => '',
	);
	
	if( isset( $defaults[$id] ) ){
		return $defaults[$id];
	}
	else{
		
		return '';
	}
}

/* get option from theme options */
function lex_get_option($id){
	global $lex_opts;
	if( isset( $lex_opts ) ){
		$value = $lex_opts->get($id);
		if( isset( $value ) ){
			return $value;
		}
		else{
			return '';
		}
	}
	else{
		return lex_defaults( $id );
	}
}

	/* setup neccessary theme support, add image sizes */
function lex_setup(){
	load_theme_textdomain('lex', get_template_directory() . '/languages');
	add_theme_support('automatic-feed-links');
	add_theme_support('html5', array(
		'comment-form',
		'comment-list'
	));
	register_nav_menu('top-navigation', __('Top Navigation', 'lex'));
	
	add_theme_support('post-thumbnails',array( 'post', 'page', 'testimonial', 'lawyer' ));
	
	set_post_thumbnail_size(845, 559, true);
	if (function_exists('add_image_size')){
		add_image_size( 'testimonial', 189, 179 );
		add_image_size( 'lawyer', 260, 269);
		add_image_size( 'blog', 406, 268);	
	}

	add_theme_support('custom-header');
	add_theme_support('custom-background');
	add_editor_style();
}
add_action('after_setup_theme', 'lex_setup');


/* get post attachements by attachement mime type */
function lex_get_post_attachement( $post_id, $att_type ){
	$attachments = get_posts( array(
		'post_type' => 'attachment',
		'post_mime_type' => $att_type,
		'numberposts' => -1,
		'post_parent' => $post_id
	));
	
	return $attachments;
}

/* setup neccessary styles and scripts */
function lex_scripts_styles(){
	wp_enqueue_style( 'lex-navigation-font', "http://fonts.googleapis.com/css?family=Montserrat:400,700|Open+Sans:400italic,700italic,400,700" );
	wp_enqueue_style( 'lex-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'lex-awesome', get_template_directory_uri() . '/css/font-awesome.min.css' );

	/* load style.css */
	wp_enqueue_style('lex-style', get_stylesheet_uri() , array());
	wp_enqueue_style('dynamic-layout', admin_url('admin-ajax.php').'?action=dynamic_css', array());	
	
	if (is_singular() && comments_open() && get_option('thread_comments')){
		wp_enqueue_script('comment-reply');
	}

	wp_enqueue_script('jquery');	
	/* this must be in header */
	
	wp_enqueue_script('lex-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', false, false, true);
	wp_enqueue_script( 'lex-dropdown-bootstrap',  get_template_directory_uri() . '/js/bootstrap-dropdown-multilevel.js', false, false, true);
	wp_enqueue_script( 'lex-jpreloader',  get_template_directory_uri() . '/js/jpreloader.min.js' );
	wp_enqueue_script( 'lex-waypoints',  get_template_directory_uri() . '/js/waypoints.min.js', false, false, true);
	wp_enqueue_script( 'lex-text-rotator',  get_template_directory_uri() . '/js/jquery.simple-text-rotator.min.js', false, false, true);
	wp_enqueue_script( 'lex-counterup',  get_template_directory_uri() . '/js/jquery.counterup.min.js', false, false, true);
	wp_enqueue_script( 'lex-masonry',  get_template_directory_uri() . '/js/jquery.masonry.min.js', false, false, true);
	wp_enqueue_script( 'lex-imagesloaded',  get_template_directory_uri() . '/js/imagesloaded.pkgd.js', false, false, true);
	wp_enqueue_script('lex-custom', get_template_directory_uri() . '/js/custom.js', false, false, true);

}
add_action('wp_enqueue_scripts', 'lex_scripts_styles');

function lex_admin_scripts_styles(){
	wp_enqueue_script('lex-admin-custom', get_template_directory_uri() . '/js/admin_custom.js', false, false, true);
}
add_action('admin_enqueue_scripts', 'lex_admin_scripts_styles');

/* add main css dynamically so it can support changing collors */
function dynaminc_css() {
  require(get_template_directory().'/css/main-color.css.php');
  exit;
}
add_action('wp_ajax_dynamic_css', 'dynaminc_css');
add_action('wp_ajax_nopriv_dynamic_css', 'dynaminc_css');

/* format date and time that will be shown on comments, blogs, cars .... */
function lex_format_post_date($date, $format){
	return date($format, strtotime($date));
}


/* add admin-ajax */
function lex_custom_head(){
	echo '<script type="text/javascript">var ajaxurl = \'' . admin_url('admin-ajax.php') . '\';</script>';
}
add_action('wp_head', 'lex_custom_head');

function lex_smeta_images( $meta_key, $post_id, $default ){
	if(class_exists('SM_Frontend')){
		global $sm;
		return $result = $sm->sm_get_meta($meta_key, $post_id);
	}
	else{		
		return $default;
	}
}

/* check if smeta plugin is installed */
function lex_get_smeta( $meta_key, $post_data = '', $default ){
	if( !empty( $post_data[$meta_key] ) ){
		return $post_data[$meta_key][0];
	}
	else{
		return $default;
	}
}	

function lex_save_post( $post_id){

	//Check autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}
	delete_post_meta( $post_id, 'lex_sections' );
	if( isset( $_POST['lex_sections'] ) ){
		update_post_meta( $post_id, 'lex_sections', $_POST['lex_sections'] );
	}
}
add_action( 'save_post', 'lex_save_post' );


function get_lex_sections(){
	$sections_data = array();
	$sections = get_posts(array(
		'post_type' => 'lex_section',
		'post_status' => 'publish',
		'posts_per_page' => -1
	));
	
	if( !empty( $sections ) ){
		foreach( $sections as $section ){
			$sections_data[$section->ID] = $section->post_title;
		}
	}
	return $sections_data;
}

function lex_custom_meta_boxes( $post ){
	$sections_data = get_lex_sections();
	$selected = array();
	$sections_alive = array();
	
	$post_meta = get_post_custom( $post->ID, 'lex_sections' );
	if( !empty( $post_meta['lex_sections'][0] ) ){
		$selected = explode( ",", $post_meta['lex_sections'][0] );
		foreach( $selected as $selected_section ){
			if( !empty( $sections_data[$selected_section] ) ){
				$sections_alive[] = $selected_section;
			}
		}
	}
	
	echo '<ul class="lex_sections"><input type="hidden" value="'.( join( ",", $sections_alive ) ).'" name="lex_sections">';
		if( !empty( $sections_alive ) ){
			foreach( $sections_alive as $section_id ){
				echo '<li class="menu-item-handle" style="padding: 3px;"><input type="checkbox" style="padding: 3px;" value="'.$section_id.'" checked="checked"><span>'.$sections_data[$section_id].'</span></li>';
			}
		}
		
		if( !empty( $sections_data ) ){
			foreach( $sections_data as $section_id => $section_title ){
				if( !in_array( $section_id, $sections_alive ) ){
					echo '<li class="menu-item-handle" style="padding: 3px;"><input type="checkbox" value="'.$section_id.'"><span>'.$section_title.'</span></li>';
				}
			}
		}
	echo '</ul>';
}

function lex_bottom_sidebar( $post_id = '', $strip_section = false ){
	if( empty( $post_id ) ){
		$post_id = get_the_ID();
	}
	if( !empty( $post_id ) ){
		$post_meta = get_post_custom( $post_id, 'lex_sections' );
		if( !empty( $post_meta['lex_sections'][0] ) ){
			$sections_ids = explode( ",", $post_meta['lex_sections'][0] );
			foreach( $sections_ids as $id ){
				$section = get_post( $id );
				if( $strip_section ){
					$section->post_content = preg_replace('/\\[lex_section.*?\\]/', '', $section->post_content); 
					$section->post_content = str_replace( '[/lex_section]', '', $section->post_content );
				}
				if( strpos( $section->post_content, '[lex_section' )  !== false || strpos( $section->post_content, '[lex_row' )  !== false ){
					echo apply_filters( 'the_content', $section->post_content );
				}
				else if( $post_id == 535){
					?>
					<section class="optional-home">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<?php echo apply_filters( 'the_content', $section->post_content ); ?>
								</div>
							</div>
						</div>
					</section>
					<?php
				} else { ?>
					<section>
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<?php echo apply_filters( 'the_content', $section->post_content ); ?>
								</div>
							</div>
						</div>
					</section>
			<?php	}
			}
		}
	}
}

function lex_the_content( $content, $strip_section = false, $check_content = true ){
	if( $strip_section ){
		$content = preg_replace("/\\[lex_section.*?\\]/", '', $content); 
		$content = str_replace( '[/lex_section]', '', $content );
	}
	if( $check_content ){
		if( strpos( $content, '[lex_section' ) !== false || strpos( $content, '[lex_row' ) !== false){
			echo apply_filters( 'the_content', $content );
		}
		else{
			if( !empty( $content ) ){
			?>
				<section>
					<div class="container">
						<!-- title -->
						<div class="row">
							<div class="col-md-12">
								<?php echo apply_filters( 'the_content', $content ); ?>
							</div>
						</div>
						<!-- title -->	
					</div>
				</section>
			<?php
			}
		}
	}
	else{
		echo apply_filters( 'the_content', $content );
	}
}

function lex_add_box( $post_type, $post ){
	if( $post_type != 'lex_section' ){
		add_meta_box( 'sections', __( 'Select Bottom Sidebar', 'lex' ), 'lex_custom_meta_boxes', '', 'side', 'high' );
	}
}

add_action( 'add_meta_boxes', 'lex_add_box', 10, 2 );

/* add custom meta fields using smeta to post types. */
function lex_custom_meta(){
	$lawyer_meta = array(
		array(
			'id' => 'position',
			'name' => __( 'Position of the lawyer', 'lex' ),
			'type' => 'text',
		),
		array(
			'id' => 'facebook',
			'name' => __( 'Facebook Link', 'lex' ),
			'type' => 'text',
		),
		array(
			'id' => 'twitter',
			'name' => __( 'Twiter Link', 'lex' ),
			'type' => 'text',
		),
		array(
			'id' => 'linkedin',
			'name' => __( 'Linkedin Link', 'lex' ),
			'type' => 'text',
		),
	);
	
	$meta_boxes[] = array(
		'title' => __( 'Lawyer Data', 'lex' ),
		'pages' => 'lawyer',
		'fields' => $lawyer_meta,
	);		
	
	$case_result_meta = array(
		array(
			'id' => 'court',
			'name' => __( 'Name Of the Court', 'lex' ),
			'type' => 'text',
		),
		array(
			'id' => 'date',
			'name' => __( 'Date', 'lex' ),
			'type' => 'text',
		),
		array(
			'id' => 'charged',
			'name' => __( 'Charged For', 'lex' ),
			'type' => 'text',
		),
		array(
			'id' => 'result',
			'name' => __( 'Case Result', 'lex' ),
			'type' => 'text',
		),
		array(
			'id' => 'amount',
			'name' => __( 'Earned', 'lex' ),
			'type' => 'text',
		),
	);
	
	$meta_boxes[] = array(
		'title' => __( 'Case Result Data', 'lex' ),
		'pages' => 'case_result',
		'fields' => $case_result_meta,
	);
	
	$practice_area_meta = array(
		array(
			'id' => 'icon',
			'name' => 'Select An Icon',
			'type' => 'select',
			'options' => lex_awesome_icons_list()
		)
	);
	$meta_boxes[] = array(
		'title' => __( 'Practice Area Data', 'lex' ),
		'pages' => 'practice_area',
		'fields' => $practice_area_meta,
	);	
	
	
	$post_meta = array(
		array(
			'id' => 'subheading',
			'name' => __( 'Input subtitle', 'lex' ),
			'type' => 'text',
		),
	);
	
	$meta_boxes[] = array(
		'title' => __( 'Subtitle', 'lex' ),
		'pages' => 'page',
		'fields' => $post_meta,
	);	
	
	$practice_area_post_meta = array(
		array(
			'id' => 'subheading-pa',
			'name' => __( 'Input practice area subtitle', 'lex' ),
			'type' => 'text',
		),
	);
	
	$meta_boxes[] = array(
		'title' => __( 'Practice area subtitle', 'lex' ),
		'pages' => 'practice_area',
		'fields' => $practice_area_post_meta,
	);	
	
	
	$post_type_meta = array(
		array(
			'id' => 'media',
			'name' => __( 'Input media iframe', 'lex' ),
			'type' => 'text',
		),
	);
	
	$meta_boxes[] = array(
		'title' => __( 'Post Media', 'lex' ),
		'pages' => 'post',
		'fields' => $post_type_meta,
	);	
	
	return $meta_boxes;
}

add_filter('sm_meta_boxes', 'lex_custom_meta');


/* get data of the attached image */
function lex_get_attachment( $attachment_id, $size ){
	$attachment = get_post( $attachment_id );
	if( !empty( $attachment ) ){
	$att_data_thumb = wp_get_attachment_image_src( $attachment_id, $size );
		return array(
			'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
			'caption' => $attachment->post_excerpt,
			'description' => $attachment->post_content,
			'href' => $attachment->guid,
			'src' => $att_data_thumb[0],
			'title' => $attachment->post_title
		);
	}
	else{
		return array(
			'alt' => '',
			'caption' => '',
			'description' => '',
			'href' => '',
			'src' => '',
			'title' => '',
		);
	}
}

class lex_walker extends Walker_Nav_Menu {
  
	/**
	* @see Walker::start_lvl()
	* @since 3.0.0
	*
	* @param string $output Passed by reference. Used to append additional content.
	* @param int $depth Depth of page. Used for padding.
	*/
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "\n$indent<ul role=\"menu\" class=\" dropdown-menu\">\n";
	}

	/**
	* @see Walker::start_el()
	* @since 3.0.0
	*
	* @param string $output Passed by reference. Used to append additional content.
	* @param object $item Menu item data object.
	* @param int $depth Depth of menu item. Used for padding.
	* @param int $current_page Menu item ID.
	* @param object $args
	*/
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		/**
		* Dividers, Headers or Disabled
		* =============================
		* Determine whether the item is a Divider, Header, Disabled or regular
		* menu item. To prevent errors we use the strcasecmp() function to so a
		* comparison that is not case sensitive. The strcasecmp() function returns
		* a 0 if the strings are equal.
		*/
		if ( strcasecmp( $item->attr_title, 'divider' ) == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="divider">';
		} 
		else if ( strcasecmp( $item->title, 'divider') == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="divider">';
		} 
		else if ( strcasecmp( $item->attr_title, 'dropdown-header') == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="dropdown-header">' . esc_attr( $item->title );
		} 
		else if ( strcasecmp($item->attr_title, 'disabled' ) == 0 ) {
			$output .= $indent . '<li role="presentation" class="disabled"><a href="#">' . esc_attr( $item->title ) . '</a>';
		} 
		else {
			$class_names = $value = '';
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			$classes[] = 'menu-item-' . $item->ID;
			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
			
			if ( $args->has_children ){
				$class_names .= ' dropdown';
			}

			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
			$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
			$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

			$output .= $indent . '<li' . $id . $value . $class_names .'>';

			$atts = array();
			$atts['title'] = ! empty( $item->title )	? $item->title	: '';
			$atts['target'] = ! empty( $item->target )	? $item->target	: '';
			$atts['rel'] = ! empty( $item->xfn )	? $item->xfn	: '';

			// If item has_children add atts to a.
			$atts['href'] = ! empty( $item->url ) ? $item->url : '';
			if ( $args->has_children ) {
				$atts['data-toggle']	= 'dropdown';
				$atts['class']	= 'dropdown-toggle';
				$atts['aria-haspopup']	= 'true';
			} 

			$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

			$attributes = '';
			foreach ( $atts as $attr => $value ) {
				if ( ! empty( $value ) ) {
					$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
					$attributes .= ' ' . $attr . '="' . $value . '"';
				}
			}

			$item_output = $args->before;

			/*
			* Glyphicons
			* ===========
			* Since the the menu item is NOT a Divider or Header we check the see
			* if there is a value in the attr_title property. If the attr_title
			* property is NOT null we apply it as the class name for the glyphicon.
			*/
			if ( ! empty( $item->attr_title ) ){
				$item_output .= '<a'. $attributes .'><span class="glyphicon ' . esc_attr( $item->attr_title ) . '"></span>&nbsp;';
			}
			else{
				$item_output .= '<a'. $attributes .'>';
			}

			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			if( $args->has_children && 0 === $depth ){
				$item_output .= ' <i class="fa fa-angle-down"></i>';
			}
			else if( $args->has_children && 0 < $depth ){
				$item_output .= ' <i class="fa fa-angle-right"></i>';
			}
			$item_output .= '</a>';
			$item_output .= $args->after;

			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}

	/**
	* Traverse elements to create list from elements.
	*
	* Display one element if the element doesn't have any children otherwise,
	* display the element and its children. Will only traverse up to the max
	* depth and no ignore elements under that depth.
	*
	* This method shouldn't be called directly, use the walk() method instead.
	*
	* @see Walker::start_el()
	* @since 2.5.0
	*
	* @param object $element Data object
	* @param array $children_elements List of elements to continue traversing.
	* @param int $max_depth Max depth to traverse.
	* @param int $depth Depth of current element.
	* @param array $args
	* @param string $output Passed by reference. Used to append additional content.
	* @return null Null on failure with no changes to parameters.
	*/
	public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
		if ( ! $element )
			return;

		$id_field = $this->db_fields['id'];

		// Display this element.
		if ( is_object( $args[0] ) ){
		   $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );
		}

		parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
	}

	/**
	* Menu Fallback
	* =============
	* If this function is assigned to the wp_nav_menu's fallback_cb variable
	* and a manu has not been assigned to the theme location in the WordPress
	* menu manager the function with display nothing to a non-logged in user,
	* and will add a link to the WordPress menu manager if logged in as an admin.
	*
	* @param array $args passed from the wp_nav_menu function.
	*
	*/
	public static function fallback( $args ) {
		if ( current_user_can( 'manage_options' ) ) {

			extract( $args );

			$fb_output = null;

			if ( $container ) {
				$fb_output = '<' . $container;

				if ( $container_id ){
					$fb_output .= ' id="' . $container_id . '"';
				}

				if ( $container_class ){
					$fb_output .= ' class="' . $container_class . '"';
				}

				$fb_output .= '>';
			}

			$fb_output .= '<ul';

			if ( $menu_id ){
				$fb_output .= ' id="' . $menu_id . '"';
			}

			if ( $menu_class ){
				$fb_output .= ' class="' . $menu_class . '"';
			}

			$fb_output .= '>';
			$fb_output .= '<li><a href="' . admin_url( 'nav-menus.php' ) . '">Add a menu</a></li>';
			$fb_output .= '</ul>';

			if ( $container ){
				$fb_output .= '</' . $container . '>';
			}

			echo $fb_output;
		}
	}
}

/* format wp_link_pages so it has the right css applied to it */
function lex_link_pages(){
	$post_pages = wp_link_pages( 
		array(
			'before' => '',
			'after' => '',
			'link_before'      => '<span>',
			'link_after'       => '</span>',
			'next_or_number'   => 'number',
			'nextpagelink'     => __( '&raquo;', 'lex' ),
			'previouspagelink' => __( '&laquo;', 'lex' ),			
			'separator'        => ' ',
			'echo'			   => 0
		) 
	);
	

	/* format pages that are not current ones */
	$post_pages = str_replace( '<a', '<a class="btn btn-default"', $post_pages );
	$post_pages = str_replace( '</span></a>', '</a>', $post_pages );
	$post_pages = str_replace( '><span>', '>', $post_pages );
	
	/* format current page */
	$post_pages = str_replace( '<span>', '<a href="javascript:;" class="btn btn-default active">', $post_pages );
	$post_pages = str_replace( '</span>', '</a>', $post_pages );
	
	return $post_pages;
	
}

/* create tags list */
function lex_the_tags(){
	$counter = 0;
	$tags = get_the_tags();
	$list = '';
	if( !empty( $tags ) ){
		foreach( $tags as $tag ){
			$counter++;
			$list .= '<li><a href="'.esc_url( get_tag_link( $tag->term_id ) ).'">'.$tag->name.'</a>'.( $counter < sizeof( $tags ) ? ' ' : '' ).'</li>';
		}
	}
	
	return $list;
}

/* format pagination so it has correct style applied to it */
function lex_format_pagination( $page_links ){
	$list = '';
	if( !empty( $page_links ) ){
		foreach( $page_links as $page_link ){
			$page_link = str_replace( "<span class='page-numbers current'>", '<a href="javascript:;" class="btn btn-default active">', $page_link );
			$page_link = str_replace( '</span>', '</a>', $page_link );
			$page_link = str_replace( 'a class="', 'a class="btn btn-default ', $page_link );
			$list .= str_replace( "a class='", "a class='btn btn-default ", $page_link );
		}
	}
	
	return $list;
}


/*generate random password*/
function lex_random_string( $length = 10 ) {
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$random = '';
	for ($i = 0; $i < $length; $i++) {
		$random .= $characters[rand(0, strlen($characters) - 1)];
	}
	return $random;
}


/* add the ... at the end of the excerpt */
// function lex_new_excerpt_more( $more ) {
	// return '';
// }
// add_filter('excerpt_more', 'lex_new_excerpt_more');

/*======================CONTACT FUNCTIONS==============*/
function lex_captcha(){
	session_start();
	$num1 = rand( 1, 10 );
	$num2 = rand( 1, 10 );
	$total = $num1 + $num2;
	$_SESSION['total'] = $total;  

	$response = array(
		'num1' => $num1,
		'num2' => $num2,
		'captcha' => $num1.'+'.$num2.'='
	);	
	
	if( isset( $_POST['new_captcha'] ) ){
		echo json_encode( $response );
		die();
	}
	else{
		return $response;
	}
}
add_action('wp_ajax_captcha', 'lex_captcha');
add_action('wp_ajax_nopriv_captcha', 'lex_captcha');

function lex_error_response( $messsage ) {
	$captcha = lex_captcha();
	header('HTTP/1.1 500 Internal Server Error');
	die(json_encode(array(
		'message' => $messsage,
		'captcha' => $captcha['captcha']
	)));
}

function lex_send_contact(){
	session_start();
	$errors = array();
	$name = esc_sql( $_POST['name'] );
	$phone = esc_sql( $_POST['phone'] );
	$email = esc_sql( $_POST['email'] );
	$message = esc_sql( $_POST['message'] );
	$captcha = esc_sql( $_POST['captcha'] );
	if( $captcha != $_SESSION['total'] ){
		lex_error_response( __( 'Invalid Security Code', 'lex' ) );
	}
	else{
		$email_to = lex_get_option( 'contact_form_email' );
		$subject = lex_get_option( 'contact_form_subject' );
		$message = "
			".__( 'Name: ', 'lex' )." {$name} \n
			".__( 'Phone: ', 'lex' )." {$phone} \n
			".__( 'Email: ', 'lex' )." {$email} \n
			".__( 'Message: ', 'lex' )."\n {$message} \n
		";
		
		$info = @wp_mail( $email_to, $subject, $message );
		$new_captcha = lex_captcha();
		if( $info ){
			echo json_encode(array(
				'message' => __( 'Your message was successfully submitted.', 'lex' ),
				'captcha' => $new_captcha['captcha']
			));
			die();
		}
		else{
			header('HTTP/1.1 500 Internal Server Error');
			echo json_encode(array(
				'message' => __( 'Unexpected error while attempting to send e-mail.', 'lex' ),
				'captcha' => $new_captcha['captcha']
			));
			die();
		}
		
	}
}
add_action('wp_ajax_send_contact', 'lex_send_contact');
add_action('wp_ajax_nopriv_send_contact', 'lex_send_contact');

/* =======================================================SUBSCRIPTION FUNCTIONS */
function lex_send_subscription( $email = '' ){
	$email = !empty( $email ) ? $email : $_POST["email"];
	$response = array();	
	if( filter_var( $email, FILTER_VALIDATE_EMAIL ) ){
		require_once( locate_template( 'includes/mailchimp.php' ) );
		$chimp_api = lex_get_option("mail_chimp_api");
		$chimp_list_id = lex_get_option("mail_chimp_list_id");
		if( !empty( $chimp_api ) && !empty( $chimp_list_id ) ){
			$mc = new MailChimp( $chimp_api );
			$result = $mc->call('lists/subscribe', array(
				'id'                => $chimp_list_id,
				'email'             => array( 'email' => $email )
			));
			
			if( $result === false) {
				$response['error'] = __( 'There was an error contacting the API, please try again.', 'lex' );
			}
			else if( isset($result['status']) && $result['status'] == 'error' ){
				$response['error'] = json_encode($result);
			}
			else{
				$response['success'] = __( 'You have successuffly subscribed to the newsletter.', 'lex' );
			}
			
		}
		else{
			$response['error'] = __( 'API data are not yet set.', 'lex' );
		}
	}
	else{
		$response['error'] = __( 'Email is empty or invalid.', 'lex' );
	}
	
	echo json_encode( $response );
	die();
}
add_action('wp_ajax_subscribe', 'lex_send_subscription');
add_action('wp_ajax_nopriv_subscribe', 'lex_send_subscription');


/* create filter letter lsit */
function lex_filter( $taxonomy, $permalink ){
	$parents = get_terms( $taxonomy, array( 'hide_empty' => 0, 'parent' => 0 ) );
	$term = get_query_var( 'term' );
	$filter = '';
	if( !empty( $parents ) ){
		foreach( $parents as $parent ){
			$link = add_query_arg( array( 'term' => $parent->slug ), $permalink );
			$filter .= '<li class="'.( $term == $parent->slug ? 'active' : '' ).'"><a href="'.esc_url( $link ).'">'.$parent->name.'</a>';
		}
	}
	
	return $filter;
}

/* create category lsit */
function lex_the_categories( $post_id = "" ){
	$categories = get_the_category( $post_id );
	$list = '';
	foreach( $categories as $category ){
		$list .= '<a class="category_link" href="'.esc_url( get_category_link( $category->term_id ) ).'">'.$category->cat_name.'</a> ';
	}
	
	return $list;
}
/* prev post link */
function lex_previous_post(){
	$prev_post_obj  = get_adjacent_post( false, '', true );
	if( !empty( $prev_post_obj ) ){
		$prev_post_ID   = isset( $prev_post_obj->ID ) ? $prev_post_obj->ID : '';
		$prev_post_link     = get_permalink( $prev_post_ID );
		$prev_post_title    = $prev_post_obj->post_title;
		if( strlen( $prev_post_title ) > 15 ){
			$prev_post_title = substr( $prev_post_title, 0, 15 ) . "...";
		}
		?>
		<a href="<?php echo esc_url( $prev_post_link ); ?>" class="btn btn-default">
			<i class="fa fa-arrow-left"></i>
		</a>		
		<a href="<?php echo esc_url( $prev_post_link ); ?>" rel="prev" class="btn btn-default">
			<?php echo $prev_post_title; ?>
		</a>
		<?php
	}
}
/* next post link */
function lex_next_post(){
	$next_post_obj  = get_adjacent_post( false, '', false );
	if( !empty( $next_post_obj ) ){
		$next_post_ID   = isset( $next_post_obj->ID ) ? $next_post_obj->ID : '';
		$next_post_link     = get_permalink( $next_post_ID );
		$next_post_title    = $next_post_obj->post_title;
		if( strlen( $next_post_title ) > 15 ){
			$next_post_title = substr( $next_post_title, 0, 15 ) . "...";
		}
		?>
		
		<a href="<?php echo esc_url( $next_post_link ); ?>" rel="next" class="btn btn-default">
			<?php echo $next_post_title; ?>
		</a>
		<a href="<?php echo esc_url( $next_post_link ); ?>" class="btn btn-default">
			<i class="fa fa-arrow-right"></i>
		</a>
		<?php
	}
}

/* create media based on type for single*/
function lex_the_single_media(){
	if( empty( $post_id ) ){
		$post_id = get_the_ID();
	}
	$media = get_post_meta( $post_id, 'media' );
	if( !empty( $media ) ){
		return '<div class="video-container"><iframe width="100%" height="450" scrolling="no" frameborder="no" src="'.esc_url( $media[0] ).'"></iframe></div>';
	}
	else{
		if( has_post_thumbnail( $post_id )){
			return get_the_post_thumbnail( $post_id );
		}
	}
}

/* create media based on type for listing*/
function lex_the_media( $post_id = '', $size = 'post-thumbnail' ){
	if( empty( $post_id ) ){
		$post_id = get_the_ID();
	}
	$media = get_post_meta( $post_id, 'media' );
	if( !empty( $media ) ){
		return '<div class="video-container"><iframe width="100%" height="450" scrolling="no" frameborder="no" src="'.esc_url( $media[0] ).'"></iframe></div>';
	}
	else{
		if( has_post_thumbnail( $post_id )){
			return get_the_post_thumbnail( $post_id, $size );
		}
	}
}

function lex_hex2rgb( $hex ){
	$hex = str_replace("#", "", $hex);

	$r = hexdec(substr($hex,0,2));
	$g = hexdec(substr($hex,2,2));
	$b = hexdec(substr($hex,4,2));
	return $r.", ".$g.", ".$b; 
}

function lex_get_avatar_url($get_avatar){
    preg_match("/src='(.*?)'/i", $get_avatar, $matches);
    return $matches[1];
}

/* set sizes for cloud widget */
function lex_custom_tag_cloud_widget($args) {
	$args['largest'] = 18; //largest tag
	$args['smallest'] = 11; //smallest tag
	$args['unit'] = 'px'; //tag font unit
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'lex_custom_tag_cloud_widget' );

function lex_comments( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	$add_below = ''; 
	?>
	<!-- comment -->
	<div class="row">
		<!-- comment media -->
		<div class="col-md-2 hidden-xs">
			<?php 
			$avatar = lex_get_avatar_url( get_avatar( $comment, 96 ) );
			if( !empty( $avatar ) ): ?>
				<img src="<?php echo esc_url( $avatar ); ?>" class="img-rounded img-thumbnail img-circle" title="" alt="">
			<?php endif; ?>
		</div><!-- .comment media -->
		<!-- comment content -->
		<div class="col-md-10">
			<h6>
				<?php comment_author(); ?><br>
				<small><?php comment_time( 'F j, Y '.__('@','lex').' H:i' ); ?> </small>
			</h6>
			<?php 
			if ($comment->comment_approved != '0'){
			?>
				<p><?php echo get_comment_text(); ?></p>
			<?php 
			}
			else{ ?>
				<p><?php _e('Your comment is awaiting moderation.', 'lex'); ?></p>				
			<?php
			}
			?>
			<?php 
			comment_reply_link( 
				array_merge( 
					$args, 
					array( 
						'reply_text' => '<i class="fa fa-share"></i> <small>'.__( 'Reply', 'lex' ).'</small>', 
						'add_below' => $add_below, 
						'depth' => $depth, 
						'max_depth' => $args['max_depth'] 
					) 
				) 
			); ?>			
		</div><!-- .comment content -->
	</div><!-- .comment -->
	<?php  
}
function lex_embed_html( $html ) {
    return '<div class="video-container">' . $html . '</div>';
}
add_filter( 'embed_oembed_html', 'lex_embed_html', 10, 3 );
add_filter( 'video_embed_html', 'lex_embed_html' ); // Jetpack

/* complete list of icons */
function lex_awesome_icons_list(){
	$icon_list = array(
		'' => 'No Icon',
		'adjust' => 'adjust',
		'anchor' => 'anchor',
		'archive' => 'archive',
		'arrows' => 'arrows',
		'arrows-h' => 'arrows-h',
		'arrows-v' => 'arrows-v',
		'asterisk' => 'asterisk',
		'automobile' => 'automobile',
		'ban' => 'ban',
		'bank' => 'bank',
		'bar-chart-o' => 'bar-chart-o',
		'barcode' => 'barcode',
		'bars' => 'bars',
		'beer' => 'beer',
		'bell' => 'bell',
		'bell-o' => 'bell-o',
		'bolt' => 'bolt',
		'bomb' => 'bomb',
		'book' => 'book',
		'bookmark' => 'bookmark',
		'bookmark-o' => 'bookmark-o',
		'briefcase' => 'briefcase',
		'bug' => 'bug',
		'building' => 'building',
		'building-o' => 'building-o',
		'bullhorn' => 'bullhorn',
		'bullseye' => 'bullseye',
		'cab' => 'cab',
		'calendar' => 'calendar',
		'calendar-o' => 'calendar-o',
		'camera' => 'camera',
		'camera-retro' => 'camera-retro',
		'car' => 'car',
		'caret-square-o-down' => 'caret-square-o-down',
		'caret-square-o-left' => 'caret-square-o-left',
		'caret-square-o-right' => 'caret-square-o-right',
		'caret-square-o-up' => 'caret-square-o-up',
		'certificate' => 'certificate',
		'check' => 'check',
		'check-circle' => 'check-circle',
		'check-circle-o' => 'check-circle-o',
		'check-square' => 'check-square',
		'check-square-o' => 'check-square-o',
		'child' => 'child',
		'circle' => 'circle',
		'circle-o' => 'circle-o',
		'circle-o-notch' => 'circle-o-notch',
		'circle-thin' => 'circle-thin',
		'clock-o' => 'clock-o',
		'cloud' => 'cloud',
		'cloud-download' => 'cloud-download',
		'cloud-upload' => 'cloud-upload',
		'code' => 'code',
		'code-fork' => 'code-fork',
		'coffee' => 'coffee',
		'cog' => 'cog',
		'cogs' => 'cogs',
		'comment' => 'comment',
		'comment-o' => 'comment-o',
		'comments' => 'comments',
		'comments-o' => 'comments-o',
		'compass' => 'compass',
		'credit-card' => 'credit-card',
		'crop' => 'crop',
		'crosshairs' => 'crosshairs',
		'cube' => 'cube',
		'cubes' => 'cubes',
		'cutlery' => 'cutlery',
		'dashboard' => 'dashboard',
		'database' => 'database',
		'desktop' => 'desktop',
		'dot-circle-o' => 'dot-circle-o',
		'download' => 'download',
		'edit' => 'edit',
		'ellipsis-h' => 'ellipsis-h',
		'ellipsis-v' => 'ellipsis-v',
		'envelope' => 'envelope',
		'envelope-o' => 'envelope-o',
		'envelope-square' => 'envelope-square',
		'eraser' => 'eraser',
		'exchange' => 'exchange',
		'exclamation' => 'exclamation',
		'exclamation-circle' => 'exclamation-circle',
		'exclamation-triangle' => 'exclamation-triangle',
		'external-link' => 'external-link',
		'external-link-square' => 'external-link-square',
		'eye' => 'eye',
		'eye-slash' => 'eye-slash',
		'fax' => 'fax',
		'female' => 'female',
		'fighter-jet' => 'fighter-jet',
		'file-archive-o' => 'file-archive-o',
		'file-audio-o' => 'file-audio-o',
		'file-code-o' => 'file-code-o',
		'file-excel-o' => 'file-excel-o',
		'file-image-o' => 'file-image-o',
		'file-movie-o' => 'file-movie-o',
		'file-pdf-o' => 'file-pdf-o',
		'file-photo-o' => 'file-photo-o',
		'file-picture-o' => 'file-picture-o',
		'file-powerpoint-o' => 'file-powerpoint-o',
		'file-sound-o' => 'file-sound-o',
		'file-video-o' => 'file-video-o',
		'file-word-o' => 'file-word-o',
		'file-zip-o' => 'file-zip-o',
		'film' => 'film',
		'filter' => 'filter',
		'fire' => 'fire',
		'fire-extinguisher' => 'fire-extinguisher',
		'flag' => 'flag',
		'flag-checkered' => 'flag-checkered',
		'flag-o' => 'flag-o',
		'flash' => 'flash',
		'flask' => 'flask',
		'folder' => 'folder',
		'folder-o' => 'folder-o',
		'folder-open' => 'folder-open',
		'folder-open-o' => 'folder-open-o',
		'frown-o' => 'frown-o',
		'gamepad' => 'gamepad',
		'gavel' => 'gavel',
		'gear' => 'gear',
		'gears' => 'gears',
		'gift' => 'gift',
		'glass' => 'glass',
		'globe' => 'globe',
		'graduation-cap' => 'graduation-cap',
		'group' => 'group',
		'hdd-o' => 'hdd-o',
		'headphones' => 'headphones',
		'heart' => 'heart',
		'heart-o' => 'heart-o',
		'history' => 'history',
		'home' => 'home',
		'image' => 'image',
		'inbox' => 'inbox',
		'info' => 'info',
		'info-circle' => 'info-circle',
		'institution' => 'institution',
		'key' => 'key',
		'keyboard-o' => 'keyboard-o',
		'language' => 'language',
		'laptop' => 'laptop',
		'leaf' => 'leaf',
		'legal' => 'legal',
		'lemon-o' => 'lemon-o',
		'level-down' => 'level-down',
		'level-up' => 'level-up',
		'life-bouy' => 'life-bouy',
		'life-ring' => 'life-ring',
		'life-saver' => 'life-saver',
		'lightbulb-o' => 'lightbulb-o',
		'location-arrow' => 'location-arrow',
		'lock' => 'lock',
		'magic' => 'magic',
		'magnet' => 'magnet',
		'mail-forward' => 'mail-forward',
		'mail-reply' => 'mail-reply',
		'mail-reply-all' => 'mail-reply-all',
		'male' => 'male',
		'map-marker' => 'map-marker',
		'meh-o' => 'meh-o',
		'microphone' => 'microphone',
		'microphone-slash' => 'microphone-slash',
		'minus' => 'minus',
		'minus-circle' => 'minus-circle',
		'minus-square' => 'minus-square',
		'minus-square-o' => 'minus-square-o',
		'mobile' => 'mobile',
		'mobile-phone' => 'mobile-phone',
		'money' => 'money',
		'moon-o' => 'moon-o',
		'mortar-board' => 'mortar-board',
		'music' => 'music',
		'navicon' => 'navicon',
		'paper-plane' => 'paper-plane',
		'paper-plane-o' => 'paper-plane-o',
		'paw' => 'paw',
		'pencil' => 'pencil',
		'pencil-square' => 'pencil-square',
		'pencil-square-o' => 'pencil-square-o',
		'phone' => 'phone',
		'phone-square' => 'phone-square',
		'photo' => 'photo',
		'picture-o' => 'picture-o',
		'plane' => 'plane',
		'plus' => 'plus',
		'plus-circle' => 'plus-circle',
		'plus-square' => 'plus-square',
		'plus-square-o' => 'plus-square-o',
		'power-off' => 'power-off',
		'print' => 'print',
		'puzzle-piece' => 'puzzle-piece',
		'qrcode' => 'qrcode',
		'question' => 'question',
		'question-circle' => 'question-circle',
		'quote-left' => 'quote-left',
		'quote-right' => 'quote-right',
		'random' => 'random',
		'recycle' => 'recycle',
		'refresh' => 'refresh',
		'reorder' => 'reorder',
		'reply' => 'reply',
		'reply-all' => 'reply-all',
		'retweet' => 'retweet',
		'road' => 'road',
		'rocket' => 'rocket',
		'rss' => 'rss',
		'rss-square' => 'rss-square',
		'search' => 'search',
		'search-minus' => 'search-minus',
		'search-plus' => 'search-plus',
		'send' => 'send',
		'send-o' => 'send-o',
		'share' => 'share',
		'share-alt' => 'share-alt',
		'share-alt-square' => 'share-alt-square',
		'share-square' => 'share-square',
		'share-square-o' => 'share-square-o',
		'shield' => 'shield',
		'shopping-cart' => 'shopping-cart',
		'sign-in' => 'sign-in',
		'sign-out' => 'sign-out',
		'signal' => 'signal',
		'sitemap' => 'sitemap',
		'sliders' => 'sliders',
		'smile-o' => 'smile-o',
		'sort' => 'sort',
		'sort-alpha-asc' => 'sort-alpha-asc',
		'sort-alpha-desc' => 'sort-alpha-desc',
		'sort-amount-asc' => 'sort-amount-asc',
		'sort-amount-desc' => 'sort-amount-desc',
		'sort-asc' => 'sort-asc',
		'sort-desc' => 'sort-desc',
		'sort-down' => 'sort-down',
		'sort-numeric-asc' => 'sort-numeric-asc',
		'sort-numeric-desc' => 'sort-numeric-desc',
		'sort-up' => 'sort-up',
		'space-shuttle' => 'space-shuttle',
		'spinner' => 'spinner',
		'spoon' => 'spoon',
		'square' => 'square',
		'square-o' => 'square-o',
		'star' => 'star',
		'star-half' => 'star-half',
		'star-half-empty' => 'star-half-empty',
		'star-half-full' => 'star-half-full',
		'star-half-o' => 'star-half-o',
		'star-o' => 'star-o',
		'suitcase' => 'suitcase',
		'sun-o' => 'sun-o',
		'support' => 'support',
		'tablet' => 'tablet',
		'tachometer' => 'tachometer',
		'tag' => 'tag',
		'tags' => 'tags',
		'tasks' => 'tasks',
		'taxi' => 'taxi',
		'terminal' => 'terminal',
		'thumb-tack' => 'thumb-tack',
		'thumbs-down' => 'thumbs-down',
		'thumbs-o-down' => 'thumbs-o-down',
		'thumbs-o-up' => 'thumbs-o-up',
		'thumbs-up' => 'thumbs-up',
		'ticket' => 'ticket',
		'times' => 'times',
		'times-circle' => 'times-circle',
		'times-circle-o' => 'times-circle-o',
		'tint' => 'tint',
		'toggle-down' => 'toggle-down',
		'toggle-left' => 'toggle-left',
		'toggle-right' => 'toggle-right',
		'toggle-up' => 'toggle-up',
		'trash-o' => 'trash-o',
		'tree' => 'tree',
		'trophy' => 'trophy',
		'truck' => 'truck',
		'umbrella' => 'umbrella',
		'university' => 'university',
		'unlock' => 'unlock',
		'unlock-alt' => 'unlock-alt',
		'unsorted' => 'unsorted',
		'upload' => 'upload',
		'user' => 'user',
		'users' => 'users',
		'video-camera' => 'video-camera',
		'volume-down' => 'volume-down',
		'volume-off' => 'volume-off',
		'volume-up' => 'volume-up',
		'warning' => 'warning',
		'wheelchair' => 'wheelchair',
		'wrench' => 'wrench',
		'file' => 'file',
		'file-archive-o' => 'file-archive-o',
		'file-audio-o' => 'file-audio-o',
		'file-code-o' => 'file-code-o',
		'file-excel-o' => 'file-excel-o',
		'file-image-o' => 'file-image-o',
		'file-movie-o' => 'file-movie-o',
		'file-o' => 'file-o',
		'file-pdf-o' => 'file-pdf-o',
		'file-photo-o' => 'file-photo-o',
		'file-picture-o' => 'file-picture-o',
		'file-powerpoint-o' => 'file-powerpoint-o',
		'file-sound-o' => 'file-sound-o',
		'file-text' => 'file-text',
		'file-text-o' => 'file-text-o',
		'file-video-o' => 'file-video-o',
		'file-word-o' => 'file-word-o',
		'file-zip-o' => 'file-zip-o',
		'circle-o-notch' => 'circle-o-notch',
		'cog' => 'cog',
		'gear' => 'gear',
		'refresh' => 'refresh',
		'spinner' => 'spinner',
		'check-square' => 'check-square',
		'check-square-o' => 'check-square-o',
		'circle' => 'circle',
		'circle-o' => 'circle-o',
		'dot-circle-o' => 'dot-circle-o',
		'minus-square' => 'minus-square',
		'minus-square-o' => 'minus-square-o',
		'plus-square' => 'plus-square',
		'plus-square-o' => 'plus-square-o',
		'square' => 'square',
		'square-o' => 'square-o',
		'bitcoin' => 'bitcoin',
		'btc' => 'btc',
		'cny' => 'cny',
		'dollar' => 'dollar',
		'eur' => 'eur',
		'euro' => 'euro',
		'gbp' => 'gbp',
		'inr' => 'inr',
		'jpy' => 'jpy',
		'krw' => 'krw',
		'money' => 'money',
		'rmb' => 'rmb',
		'rouble' => 'rouble',
		'rub' => 'rub',
		'ruble' => 'ruble',
		'rupee' => 'rupee',
		'try' => 'try',
		'turkish-lira' => 'turkish-lira',
		'usd' => 'usd',
		'won' => 'won',
		'yen' => 'yen',
		'align-center' => 'align-center',
		'align-justify' => 'align-justify',
		'align-left' => 'align-left',
		'align-right' => 'align-right',
		'bold' => 'bold',
		'chain' => 'chain',
		'chain-broken' => 'chain-broken',
		'clipboard' => 'clipboard',
		'columns' => 'columns',
		'copy' => 'copy',
		'cut' => 'cut',
		'dedent' => 'dedent',
		'eraser' => 'eraser',
		'file' => 'file',
		'file-o' => 'file-o',
		'file-text' => 'file-text',
		'file-text-o' => 'file-text-o',
		'files-o' => 'files-o',
		'floppy-o' => 'floppy-o',
		'font' => 'font',
		'header' => 'header',
		'indent' => 'indent',
		'italic' => 'italic',
		'link' => 'link',
		'list' => 'list',
		'list-alt' => 'list-alt',
		'list-ol' => 'list-ol',
		'list-ul' => 'list-ul',
		'outdent' => 'outdent',
		'paperclip' => 'paperclip',
		'paragraph' => 'paragraph',
		'paste' => 'paste',
		'repeat' => 'repeat',
		'rotate-left' => 'rotate-left',
		'rotate-right' => 'rotate-right',
		'save' => 'save',
		'scissors' => 'scissors',
		'strikethrough' => 'strikethrough',
		'subscript' => 'subscript',
		'superscript' => 'superscript',
		'table' => 'table',
		'text-height' => 'text-height',
		'text-width' => 'text-width',
		'th' => 'th',
		'th-large' => 'th-large',
		'th-list' => 'th-list',
		'underline' => 'underline',
		'undo' => 'undo',
		'unlink' => 'unlink',
		'angle-double-down' => 'angle-double-down',
		'angle-double-left' => 'angle-double-left',
		'angle-double-right' => 'angle-double-right',
		'angle-double-up' => 'angle-double-up',
		'angle-down' => 'angle-down',
		'angle-left' => 'angle-left',
		'angle-right' => 'angle-right',
		'angle-up' => 'angle-up',
		'arrow-circle-down' => 'arrow-circle-down',
		'arrow-circle-left' => 'arrow-circle-left',
		'arrow-circle-o-down' => 'arrow-circle-o-down',
		'arrow-circle-o-left' => 'arrow-circle-o-left',
		'arrow-circle-o-right' => 'arrow-circle-o-right',
		'arrow-circle-o-up' => 'arrow-circle-o-up',
		'arrow-circle-right' => 'arrow-circle-right',
		'arrow-circle-up' => 'arrow-circle-up',
		'arrow-down' => 'arrow-down',
		'arrow-left' => 'arrow-left',
		'arrow-right' => 'arrow-right',
		'arrow-up' => 'arrow-up',
		'arrows' => 'arrows',
		'arrows-alt' => 'arrows-alt',
		'arrows-h' => 'arrows-h',
		'arrows-v' => 'arrows-v',
		'caret-down' => 'caret-down',
		'caret-left' => 'caret-left',
		'caret-right' => 'caret-right',
		'caret-square-o-down' => 'caret-square-o-down',
		'caret-square-o-left' => 'caret-square-o-left',
		'caret-square-o-right' => 'caret-square-o-right',
		'caret-square-o-up' => 'caret-square-o-up',
		'caret-up' => 'caret-up',
		'chevron-circle-down' => 'chevron-circle-down',
		'chevron-circle-left' => 'chevron-circle-left',
		'chevron-circle-right' => 'chevron-circle-right',
		'chevron-circle-up' => 'chevron-circle-up',
		'chevron-down' => 'chevron-down',
		'chevron-left' => 'chevron-left',
		'chevron-right' => 'chevron-right',
		'chevron-up' => 'chevron-up',
		'hand-o-down' => 'hand-o-down',
		'hand-o-left' => 'hand-o-left',
		'hand-o-right' => 'hand-o-right',
		'hand-o-up' => 'hand-o-up',
		'long-arrow-down' => 'long-arrow-down',
		'long-arrow-left' => 'long-arrow-left',
		'long-arrow-right' => 'long-arrow-right',
		'long-arrow-up' => 'long-arrow-up',
		'toggle-down' => 'toggle-down',
		'toggle-left' => 'toggle-left',
		'toggle-right' => 'toggle-right',
		'toggle-up' => 'toggle-up',
		'arrows-alt' => 'arrows-alt',
		'backward' => 'backward',
		'compress' => 'compress',
		'eject' => 'eject',
		'expand' => 'expand',
		'fast-backward' => 'fast-backward',
		'fast-forward' => 'fast-forward',
		'forward' => 'forward',
		'pause' => 'pause',
		'play' => 'play',
		'play-circle' => 'play-circle',
		'play-circle-o' => 'play-circle-o',
		'step-backward' => 'step-backward',
		'step-forward' => 'step-forward',
		'stop' => 'stop',
		'youtube-play' => 'youtube-play',
		'adn' => 'adn',
		'android' => 'android',
		'apple' => 'apple',
		'behance' => 'behance',
		'behance-square' => 'behance-square',
		'bitbucket' => 'bitbucket',
		'bitbucket-square' => 'bitbucket-square',
		'bitcoin' => 'bitcoin',
		'btc' => 'btc',
		'codepen' => 'codepen',
		'css3' => 'css3',
		'delicious' => 'delicious',
		'deviantart' => 'deviantart',
		'digg' => 'digg',
		'dribbble' => 'dribbble',
		'dropbox' => 'dropbox',
		'drupal' => 'drupal',
		'empire' => 'empire',
		'facebook' => 'facebook',
		'facebook-square' => 'facebook-square',
		'flickr' => 'flickr',
		'foursquare' => 'foursquare',
		'ge' => 'ge',
		'git' => 'git',
		'git-square' => 'git-square',
		'github' => 'github',
		'github-alt' => 'github-alt',
		'github-square' => 'github-square',
		'gittip' => 'gittip',
		'google' => 'google',
		'google-plus' => 'google-plus',
		'google-plus-square' => 'google-plus-square',
		'hacker-news' => 'hacker-news',
		'html5' => 'html5',
		'instagram' => 'instagram',
		'joomla' => 'joomla',
		'jsfiddle' => 'jsfiddle',
		'linkedin' => 'linkedin',
		'linkedin-square' => 'linkedin-square',
		'linux' => 'linux',
		'maxcdn' => 'maxcdn',
		'openid' => 'openid',
		'pagelines' => 'pagelines',
		'pied-piper' => 'pied-piper',
		'pied-piper-alt' => 'pied-piper-alt',
		'pied-piper-square' => 'pied-piper-square',
		'pinterest' => 'pinterest',
		'pinterest-square' => 'pinterest-square',
		'qq' => 'qq',
		'ra' => 'ra',
		'rebel' => 'rebel',
		'reddit' => 'reddit',
		'reddit-square' => 'reddit-square',
		'renren' => 'renren',
		'share-alt' => 'share-alt',
		'share-alt-square' => 'share-alt-square',
		'skype' => 'skype',
		'slack' => 'slack',
		'soundcloud' => 'soundcloud',
		'spotify' => 'spotify',
		'stack-exchange' => 'stack-exchange',
		'stack-overflow' => 'stack-overflow',
		'steam' => 'steam',
		'steam-square' => 'steam-square',
		'stumbleupon' => 'stumbleupon',
		'stumbleupon-circle' => 'stumbleupon-circle',
		'tencent-weibo' => 'tencent-weibo',
		'trello' => 'trello',
		'tumblr' => 'tumblr',
		'tumblr-square' => 'tumblr-square',
		'twitter' => 'twitter',
		'twitter-square' => 'twitter-square',
		'vimeo-square' => 'vimeo-square',
		'vine' => 'vine',
		'vk' => 'vk',
		'wechat' => 'wechat',
		'weibo' => 'weibo',
		'weixin' => 'weixin',
		'windows' => 'windows',
		'wordpress' => 'wordpress',
		'xing' => 'xing',
		'xing-square' => 'xing-square',
		'yahoo' => 'yahoo',
		'youtube' => 'youtube',
		'youtube-play' => 'youtube-play',
		'youtube-square' => 'youtube-square',
		'ambulance' => 'ambulance',
		'h-square' => 'h-square',
		'hospital-o' => 'hospital-o',
		'medkit' => 'medkit',
		'plus-square' => 'plus-square',
		'stethoscope' => 'stethoscope',
		'user-md' => 'user-md',
		'wheelchair' => 'wheelchair',
	);
	
	return $icon_list;
}

/* Get the text for the home screen */
function implement_ajax() {
        echo lex_get_option( 'home_dynamic' );
        wp_die();
}
add_action('wp_ajax_get_home_text', 'implement_ajax');
add_action('wp_ajax_nopriv_get_home_text', 'implement_ajax');

?>