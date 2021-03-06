<?php

/*
@package hfw_fsnat
	==================
		ADMIN ENQUEUE FUNCTIONS
	==================
*/

	function fsnat_load_admin_scripts( $hook ) {

		// echo 'hook: ' . $hook;
		// debug: uncomment line above to find out what the hook is to load different scripts on different pages

		if($hook == 'toplevel_page_fsnat_settings') {
			// don't include the css file unless on the right page!
			
			wp_register_style('fsnat-admin', get_template_directory_uri() . '/css/fsnat.admin.css', array(), '1.0.0', 'all');
			wp_enqueue_style('fsnat-admin');

			wp_enqueue_media();

			wp_register_script('fsnat-admin-script', get_template_directory_uri() . '/js/fsnat.admin.js', array('jquery'), '1.0.0', true);
			wp_enqueue_script('fsnat-admin-script');		
		} else if( $hook == 'flerspraklig-naturfag_page_fsnat_settings_css') {
			wp_enqueue_style('ace', get_template_directory_uri() . '/css/fsnat.ace.css', array(), '1.0.0', 'all');

			wp_enqueue_script('ace', get_template_directory_uri() . '/js/ace/ace.js', array('jquery'), '1.2.6', true );
			wp_enqueue_script('fsnat-custom-css-script', get_template_directory_uri() . '/js/fsnat.custom_css.js', array('jquery'), '1.0.0', true );

		} else {
			return;
		}


	}

add_action('admin_enqueue_scripts', 'fsnat_load_admin_scripts');

/*
	=====================================
	 FRONT END ENQUEUE FUNCTIONS
	=====================================	
*/

function fsnat_load_scripts(){
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.7', 'all');
	wp_enqueue_style('fsnat', get_template_directory_uri() . '/css/fsnat.css', array(), '1.0.0', 'all');

	wp_deregister_script( 'jquery' );
	wp_register_script('jquery', get_template_directory_uri() . '/js/jquery.js' , false, '1.12.4', true);
	wp_enqueue_script('jquery');
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.7', true );
}

add_action( 'wp_enqueue_scripts', 'fsnat_load_scripts');