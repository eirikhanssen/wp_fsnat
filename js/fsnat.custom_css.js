jQuery(document).ready( function($){
	var updateCSS = function() { $("#fsnat_css").val( editor.getSession().getValue() ); }
	$("#save-custom-css-form").submit( updateCSS );
});

var editor = ace.edit("customCSS");
editor.setTheme("ace/theme/monokai");
editor.getSession().setMode("ace/mode/css");