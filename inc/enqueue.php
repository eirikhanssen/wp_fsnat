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
		
		wp_register_style('fsnat_admin', get_template_directory_uri() . '/css/fsnat.admin.css', array(), '1.0.0', 'all');

		wp_enqueue_style('fsnat_admin');
	}

add_action('admin_enqueue_scripts', 'fsnat_load_admin_scripts');