<?php

/*
@package fsnat
	==================
		ADMIN ENQUEUE FUNCTIONS
	==================
*/

	function fsnat_load_admin_scripts( $hook ) {

		echo $hook;

		if($hook != 'toplevel_page_fsnat_settings') {
			// don't include the css file unless on the right page!
			return;
		}
		
		wp_register_style('fsnat-admin', get_template_directory_uri() . '/css/fsnat.admin.css', array(), '1.0.0', 'all');
		wp_enqueue_style('fsnat-admin');

		wp_register_script('fsnat-admin-script', get_template_directory_uri() . '/js/fsnat.admin.js', array('jquery'), '1.0.0', true);
		wp_enqueue_script('fsnat-admin-script');		
	}

add_action('admin_enqueue_scripts', 'fsnat_load_admin_scripts');