jQuery(document).ready(function($){
	var mediaUploader;
	$('#upload-button').on('click',function(e){
		e.preventDefault();
		if(mediaUploader) {
			mediaUploader.open();
			return;
		}

		mediaUploader = wp.media.frames.file_frame = wp.media({
			title:'Upload a Profile Picture',
			button: {
				text: 'Choose Picture'
			},
			multiple: false
		});

		mediaUploader.on('seelct', function(){
			attachment = mediaUploader.state().get('selection').first().toJSON();
			$('#profile-picture').val(attachment.url);
		});

		mediaUploader.open();
	});

});