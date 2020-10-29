(function($){
	$.fn.zendvnBtnMedia = function(inputID){
        console.log(this);
        console.log(inputID);
        var file_frame;
        this.on('click', function(event){
            event.preventDefault();
            if ( file_frame ) {
                file_frame.open();
        return;
        }
        // Create the media frame.
        file_frame = wp.media.frames.file_frame = wp.media({
            title: $( this ).data( 'File upload' ),
            button: {
                text: $( this ).data( 'Upload' ),
            },
            multiple: false  // Set to true to allow multiple files to be selected
        });
        // When an image is selected, run a callback.
        file_frame.on( 'select', function() {
            // We set multiple to false so only get one image from the uploader
            attachment = file_frame.state().get('selection').first().toJSON();
            $('#' + inputID).attr('value',attachment.url);
        });
        
        // Finally, open the modal
        file_frame.open();
        });
	};
	
}(jQuery));

//$('#button_id').zendvnBtnMedia('#input_id');