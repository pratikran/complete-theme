<?php

require_once('class-tgm-plugin-activation.php');

add_action('wp_head','save_customizer_data');
function save_customizer_data()
{
	?>
	
		<style type="text/css">
			BODY
			{
				background-color:<?php echo get_theme_mod('background_color'); ?> !important;
				color:<?php echo get_theme_mod('main_text_color'); ?> !important;
				background-image:url(<?php echo get_theme_mod('background_image'); ?>);
			}
		</style>
	
	<?php 
	
}

add_action('customize_register','initiate_customizer');
function happy_new_year()
{	
	
	$m	=	Date('m');
	$d	=	Date('d');
	
	$today	= "$m/$d";
	
	if($today=='05/31')
	{
		return true;
	} else {
		return false;
	}
}
function initiate_customizer($wp_customize)
{
	/*
		1. Panels
		2. Settings
		3. Section
		4. Controls
	*/
	
	// Happy New Year Panel
		
		$wp_customize->add_panel('happy_new_year_panel',array(
			'title'				=>	'Happy New Year!!!',
			'description'		=>	'Greet the admin on Jan 1st',
			'priority'			=>	1,
			'active_callback'	=> 'happy_new_year',
		));
		
		$wp_customize->add_section('happy_new_year_section',array(
			'title'		=>	__('Happy New Year Settings','complete-theme'),
			'priority'	=>  1,
			'panel'		=>	'happy_new_year_panel',
		));
		
		$wp_customize->add_setting('happy_new_year_message',array(
			'default'	=>	'Happy New Year',
			'transport'	=>	'refresh',
		));
		
		$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'happy_new_year_textbox', array(
			'label'		=>	__('Happy New Year Message', 'complete-theme'), // complete-theme is the theme folder name 
			'section'	=>	'happy_new_year_section',
			'settings'	=>	'happy_new_year_message',
		)));
		
		$wp_customize->add_setting('logo_setting',array(
			'default'	=>	'none',
			'transport'	=>	'refresh',
		));
		
		$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'logo_selector', array(
		//$wp_customize->add_control(new WP_Customize_Upload_Control($wp_customize, 'logo_selector', array(
		//$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'logo_selector', array(
			'label'		=>	__('Restaurant Logo', 'complete-theme'), // complete-theme is the theme folder name 
			'section'	=>	'company',
			'settings'	=>	'logo_setting',
			'panel'		=>	'restaurant_settings_panel',
			//'type'		=>	'checkbox',
		)));
	
	// Restaurants Settings Panel 
		
		$wp_customize->add_panel('restaurant_settings_panel',array(
			'title'				=>	'Restaurant Settings',
			'description'		=>	'All The Settings For Our Restaurant',
			'priority'			=>	5,
			//'active_callback'	=>	'is_front_page',			
		));
	
	// Hours of Operations
		
		$wp_customize->add_section('hours_settings',array(
			'title'		=>	__('Hours of Operation','complete-theme'),
			'priority'	=>  1,
			'panel'		=>	'happy_new_year_panel',
			'active_callback'	=>	'is_front_page',
		));
		
		$wp_customize->add_setting('hours_open',array(
			'default'	=>	9,
			'priority'	=>	'1',
		));
		$wp_customize->add_setting('hours_closed',array(
			'default'	=>	5,
			'priority'	=>	'5',
		));
		
		$hour_opened = array();
		$hour_closed = array();
		
		for($o=7;$o<=10;$o++)
		{
			$hour_opened[$o] = $o;
		}
		for($c=4;$c<=7;$c++)
		{
			$hour_closed[$c] = $c;
		}
		
		$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'hours_open_control', array(
			'label'		=>	__('Hour Open', 'complete-theme'), // complete-theme is the theme folder name 
			'section'	=>	'hours_settings',
			'settings'	=>	'hours_open',
			'type'		=>	'select',
			'choices'	=>	$hour_opened,
		)));
		
		$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'hours_close_control', array(
			'label'		=>	__('Hour Closed', 'complete-theme'),
			'section'	=>	'hours_settings',
			'settings'	=>	'hours_closed',
			'type'		=>	'select',
			'choices'	=>	$hour_closed,
		)));
		
		
	// Google Maps on the Customizer
	
		$wp_customize->add_section('google_map_section',array(
			'title'		=>	__('Google Map Settings','complete-theme'),
			'priority'	=>	'20',
			'panel'		=>	'restaurant_settings_panel',
		));
			
		$wp_customize->add_setting('google_map_lon',array(
			'default'	=> '0',
			'transport' => 'refresh',  // it is for automatic refresh while editing value in the customizer
		));
		$wp_customize->add_setting('google_map_lat',array(
			'default'	=> '0',
			'transport' => 'refresh',  // it is for automatic refresh while editing value in the customizer
		));
		
		$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'gm_lon_control', array(
			'label'		=>	__('Longitude', 'complete-theme'),
			'section'	=>	'google_map_section',
			'settings'	=>	'google_map_lon',
		)));
		$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'gm_lat_control', array(
			'label'		=>	__('Latitude', 'complete-theme'),
			'section'	=>	'google_map_section',
			'settings'	=>	'google_map_lat',
		)));
		
	/*
	$wp_customize->add_panel();
	$wp_customize->remove_panel();
	$wp_customize->get_panel(); // to get some information from the panel
	
	$wp_customize->add_section();
	$wp_customize->remove_section();
	$wp_customize->get_section(); // to get some information from the section
	
	$wp_customize->add_control();
	$wp_customize->remove_control();
	$wp_customize->get_control(); // to get some information from the control

	$wp_customize->add_setting();
	$wp_customize->remove_setting();
	$wp_customize->get_setting(); // to get some information from the control	
	*/
	
	/* These will remove following sections from customizer 
	$wp_customize->remove_section('title_tagline');
	$wp_customize->remove_section('colors');
	$wp_customize->remove_section('header_image');
	$wp_customize->remove_section('background_image');
	$wp_customize->remove_section('nav');
	$wp_customize->remove_section('static_front_page');
	*/
	
	$wp_customize->add_section('company',array(
		'title'		=>	__('Company Info','complete-theme'),
		'priority'	=>	10,
		'panel'		=>	'restaurant_settings_panel',
	));
	
	$wp_customize->add_setting('company_name',array(
			'default'	=> 'Our Company',
			'transport' => 'refresh',  // it is for automatic refresh while editing value in the customizer
		));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'company_textbox', array(
			'label'		=>	__('Company Name', 'complete-theme'),
			'section'	=>	'company',
			'settings'	=>	'company_name',
		)));	
		
	$wp_customize->add_setting('company_color',array(
			'default'	=> '#FF0000',
			'transport' => 'refresh',  // it is for automatic refresh while editing value in the customizer
		));
		
	$wp_customize->add_setting('main_text_color',array(
			'default'	=>	'#FFFF00',
			'transport'	=>	'refresh',
		));
	// Specials of The Day Food Choices
		
		$wp_customize->add_section('todays_special_settings',array(
			'title'		=>	__('Special Of The Day','complete-theme'),
			'priority'	=>	10,
			'panel'		=>	'restaurant_settings_panel',
		));
		
		$food_choices = array(
					'Pizza'				=>	'Pizza',
					'Burgers'			=>	'Burgers',
					'Tikka Chicken'		=>	'Tikka Chicken',
					'Sushi'				=>	'Sushi',
					'Burritos'			=>	'Burritos',
				);
		
		$wp_customize->add_setting('food_choice',array(
				'default'	=>	'Pizza',
				'transport'	=>	'refresh',
			));
			
		$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'specials_food_radio', array(
				'label'		=>	__('Special Food Item', 'complete-theme'),
				'section'	=>	'todays_special_settings',
				'settings'	=>	'food_choice',
				'type'		=>	'radio',
				'choices'	=>	$food_choices,
		)));
			
		// Specials of The Day Colors
				
		$wp_customize->add_setting('specials_color',array(
				'default'	=>	'#000000',
				'transport'	=>	'refresh',
			));
		
		$color_choices = array(
					'red'		=>	'Red',
					'purple'	=>	'Purple',
					'black'		=>	'Black',
				);
			
		$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'specials_color_radio', array(
				'label'		=>	__('Colors For The Specials of The Day', 'complete-theme'),
				'section'	=>	'colors',
				'settings'	=>	'specials_color',
				'type'		=>	'radio',
				'choices'	=>	$color_choices,
		)));

	/*
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'main_text_color_control', array(
			'label'		=>	__('Main Text Color', 'complete-theme'),
			'section'	=>	'colors',
			'settings'	=>	'main_text_color',
		)));
	*/
	
	$color_choices = array(
				'red'		=>	'Red',
				'#FFFF00'	=>	'Yellow',
				'lime'		=>	'Lime Yellow',
			);
	asort($color_choices);
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'main_text_color_textbox', array(
			'label'		=>	__('Main Text Color', 'complete-theme'),
			'section'	=>	'colors',
			'settings'	=>	'main_text_color',
			'type'		=>	'radio',
			'choices'	=>	$color_choices,
	)));
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'company_color_control', array(
			'label'		=>	__('Color', 'complete-theme'),
			'section'	=>	'company',
			'settings'	=>	'company_color',
			'active_callback'	=>	'is_front_page',
		)));
}

add_action('init', 'create_country_post_type');
function create_country_post_type(){
	
	set_post_thumbnail_size(300,300);
	
	register_post_type('countries',
		array(
			'labels'	=> array(
				'name'	=> __('Countries'),
				'singular_name'	=> __('Country'),
			),
			'public'		=> true,
			'has_archive'	=> true,
			'taxonomies'	=> array('category','post_tag'),
			'supports'		=> array('custom-fields','editor','thumbnail'),
		)
	);
}

add_action('init', 'create_concerthall_post_type');
function create_concerthall_post_type(){
	
	set_post_thumbnail_size(300,300);
	
	register_post_type('concerthalls',
		array(
			'labels'	=> array(
				'name'	=> __('Concert Halls'),
				'singular_name'	=> __('Concert Hall'),
			),
			'public'		=> true,
			'has_archive'	=> true,
			'supports'		=> array('custom-fields','editor','thumbnail'),
		)
	);
}

function submenus(){
	wp_deregister_script('jquery');
	wp_register_script('jquery',"http".($_SERVER['SERVER_PORT']==443?"s":"")."://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js",false,null);
	wp_enqueue_script('script-name',get_template_directory_uri().'/js/submenus.js',array('jquery'),'1.0.0',true);
}
add_action('wp_enqueue_scripts','submenus');

if(current_user_can('manage_options')) 
# this is for admin role/user 
# but something like !current_user_can will allow all but not to admin
{
	add_theme_support('post-thumbnails');
	add_theme_support('post-formats',array('aside','gallery','video','image'));
	add_theme_support('menus');
} else {
	add_theme_support('post-formats',array('aside'));
}

# for theme locations for menus 
# within arrays names can be your own language
register_nav_menus(
	array(
		'header_menu'			=>	'Header Menu',
		'footer_menu'			=>	'Footer Menu',
		'left_sidebar'		=>	'Left Sidebar Menu',
		'header_submenu'		=>	'header Submenu',
	)
);


add_theme_support('custom-header');
add_theme_support('custom-background');
add_theme_support('title-tag');

$html5_support = array('search-form','comment-form','gallery','comment-list','caption');

add_theme_support('HTML5', $html5_support);
# or even this 
# add_theme_support('HTML5', array('search-form','comment-form','gallery','comment-list','caption'));

function the_current_year()
{
	$this_year = date('Y');
	return $this_year;
}


/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme Complete Theme
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Plugin:
 * require_once dirname( __FILE__ ) . '/path/to/class-tgm-plugin-activation.php';
 */
require_once get_template_directory() . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'complete_theme_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function complete_theme_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		array(
			'name'               => 'Beaver Builder', // The plugin name.
			'slug'               => 'beaver-builder-lite-version', // The plugin slug (typically the folder name).
			'source'             => get_template_directory() . '/included-plugins/beaver-builder-lite-version.zip', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '1.9.5.3', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => 'https://wordpress.org/plugins/beaver-builder-lite-version/', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),
		
		array(
			'name'               => 'Aqua Page Builder', // The plugin name.
			'slug'               => 'aqua-page-builder', // The plugin slug (typically the folder name).
			'source'             => get_template_directory() . '/included-plugins/aqua-page-builder.1.1.5.zip', // The plugin source.
			'required'           => false, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '1.1.5', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => 'https://wordpress.org/plugins/aqua-page-builder/', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),
		
		// This is an example of how to include a plugin from an arbitrary external source in your theme.
		array(
			'name'         => 'TGM New Media Plugin', // The plugin name.
			'slug'         => 'tgm-new-media-plugin', // The plugin slug (typically the folder name).
			'source'       => 'https://s3.amazonaws.com/tgm/tgm-new-media-plugin.zip', // The plugin source.
			'required'     => true, // If false, the plugin is only 'recommended' instead of required.
			'external_url' => 'https://github.com/thomasgriffin/New-Media-Image-Uploader', // If set, overrides default API URL and points to an external URL.
		),

		// This is an example of how to include a plugin from a GitHub repository in your theme.
		// This presumes that the plugin code is based in the root of the GitHub repository
		// and not in a subdirectory ('/src') of the repository.
		array(
			'name'      => 'Adminbar Link Comments to Pending',
			'slug'      => 'adminbar-link-comments-to-pending',
			'source'    => 'https://github.com/jrfnl/WP-adminbar-comments-to-pending/archive/master.zip',
		),

	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'complete-theme',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

		/*
		'strings'      => array(
			'page_title'                      => __( 'Install Required Plugins', 'complete-theme' ),
			'menu_title'                      => __( 'Install Plugins', 'complete-theme' ),
			/* translators: %s: plugin name. * /
			'installing'                      => __( 'Installing Plugin: %s', 'complete-theme' ),
			/* translators: %s: plugin name. * /
			'updating'                        => __( 'Updating Plugin: %s', 'complete-theme' ),
			'oops'                            => __( 'Something went wrong with the plugin API.', 'complete-theme' ),
			'notice_can_install_required'     => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'complete-theme'
			),
			'notice_can_install_recommended'  => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'complete-theme'
			),
			'notice_ask_to_update'            => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'complete-theme'
			),
			'notice_ask_to_update_maybe'      => _n_noop(
				/* translators: 1: plugin name(s). * /
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'complete-theme'
			),
			'notice_can_activate_required'    => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'complete-theme'
			),
			'notice_can_activate_recommended' => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'complete-theme'
			),
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'complete-theme'
			),
			'update_link' 					  => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'complete-theme'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'complete-theme'
			),
			'return'                          => __( 'Return to Required Plugins Installer', 'complete-theme' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'complete-theme' ),
			'activated_successfully'          => __( 'The following plugin was activated successfully:', 'complete-theme' ),
			/* translators: 1: plugin name. * /
			'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'complete-theme' ),
			/* translators: 1: plugin name. * /
			'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'complete-theme' ),
			/* translators: 1: dashboard link. * /
			'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'complete-theme' ),
			'dismiss'                         => __( 'Dismiss this notice', 'complete-theme' ),
			'notice_cannot_install_activate'  => __( 'There are one or more required or recommended plugins to install, update or activate.', 'complete-theme' ),
			'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'complete-theme' ),

			'nag_type'                        => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
		),
		*/
	);

	tgmpa( $plugins, $config );
}


?>