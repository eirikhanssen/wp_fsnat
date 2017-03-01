<h1>Flerspråklig naturfag CSS</h1>
<?php settings_errors(); ?>

<form id="save-custom-css-form" method="post" action="options.php" class="fsnat-general-form">

<?php settings_fields('fsnat-custom-css-options'); ?>
<?php do_settings_sections('fsnat_settings_css'); ?>
<?php submit_button(); ?>
	

</form>