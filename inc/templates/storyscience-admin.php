<h1>Flerspråklig naturfag Theme Options</h1>
<?php settings_errors(); ?>

<?php 
	$firstName = esc_attr(get_option('first_name'));
	$lastName = esc_attr(get_option('last_name'));
	$fullName = $firstName . ' ' . $lastName;
	$description = esc_attr(get_option('description'));
?>

<div class="fsnat-sidebar-preview">
	<div class="fsnat-sidebar">
		<h1 class="fsnat-username"><?php print $fullName; ?></h1>
		<h2 class="fsnat-description"><?php print $description; ?></h2>
		<div class="icons-wrapper">
			
		</div>
	</div>
</div>

<form method="post" action="options.php" class="fsnat-general-form">
	<?php settings_fields('fsnat-settings-group');?>
	<?php do_settings_sections('fsnat_settings') ?>
	<?php submit_button(); ?>
</form>