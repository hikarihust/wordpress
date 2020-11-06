(function($){
	
	$.fn.zendvnBtnMedia = function(inputID){
		var backupSendToEditor = window.send_to_editor;
		this.click(function(){
			tb_show('','media-upload.php?type=image&amp;TB_iframe=true');		
			window.send_to_editor = function(html){
				imgUrl = $(html).attr('href');
				$('#' + inputID).val(imgUrl);
				tb_remove();
				window.send_to_editor = backupSendToEditor;
			}
			return false;
		});
	};
	
}(jQuery));

//$('#button_id').zendvnBtnMedia('#input_id');