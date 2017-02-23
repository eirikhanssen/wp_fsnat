<?php

/*
@package fsnat
	==================
		ADMIN PAGE
	==================
*/

function fsnat_add_admin_page() {
	// generate fsnat admin page
	add_menu_page( 
		'fsnat Theme Options', /*page_title*/
		'Flerspråklig naturfag', /*menu title*/
		'manage_options', /*capability (user permissions required to access menu)*/
		'fsnat_settings', /*menu_slug*/
		'fsnat_create_page',  /*function*/
		get_template_directory_uri() . '/img/storysciene-icon.png', /*icon_url*/
		110 /*position of menu item*/
		);

	// generate fsnat admin sub pages
	add_submenu_page( 
		'fsnat_settings', /*parent slug*/
		 'fsnat Theme Options', /*page_title*/
		  'Settings',/*menu_title*/
		   'manage_options', /*capability*/
		   'fsnat_settings', /*menu_slug*/
		    'fsnat_create_page' /*function*/
		    );
	
	add_submenu_page( 
		'fsnat_settings', /*parent slug*/
		 'fsnat CSS Options', /*page_title*/
		  'Custom CSS',/*menu_title*/
		   'manage_options', /*capability*/
		   'fsnat_settings_css', /*menu_slug*/
		    'fsnat_settings_page' /*function*/
		    );
	
	// Activate custom settings
	add_action( 'admin_init', 'fsnat_custom_settings', 'fsnat_sidebar_options');
}

function fsnat_custom_settings () {
	register_setting( 'fsnat-settings-group', 'first_name');
	register_setting( 'fsnat-settings-group', 'last_name');
	register_setting( 'fsnat-settings-group', 'description');

	add_settings_section( 'fsnat-sidebar-options', 'Sidebar Options', 'fsnat_sidebar_options', 'fsnat_settings');
	
	add_settings_field( 'sidebar-name', 'Full Name', 'fsnat_sidebar_name', 'fsnat_settings', 'fsnat-sidebar-options');

	add_settings_field( 'sidebar-description', 'Description', 'fsnat_sidebar_description', 'fsnat_settings', 'fsnat-sidebar-options');
}

function fsnat_sidebar_options() {
	echo 'Customize your Sidebar Information';
}

function fsnat_sidebar_name() {
	$firstName = esc_attr( get_option( 'first_name' ) );
	$lastName = esc_attr( get_option( 'last_name' ) );
	$output = '<input type="text" name="first_name" value="' . $firstName . '" placeholder="First Name" ∕>';
	$output .= '<input type="text" name="last_name" value="' . $lastName . '" placeholder="Last Name" ∕>';
	echo $output;
}

function fsnat_sidebar_description() {
	$description = esc_attr( get_option( 'description' ) );
	$output = '<input type="text" name="description" value="' . $description . '" placeholder="Menu description" ∕><p class="description">Write something smart</p>';
	echo $output;
}

add_action('admin_menu','fsnat_add_admin_page');

function fsnat_create_page() {
	// generation of our admin page
	require_once( get_template_directory() . '/inc/templates/fsnat-admin.php');
}

function fsnat_settings_page() {
	// generation of our CSS admin page
	require_once( get_template_directory() . '/inc/templates/fsnat-admin.php');
}