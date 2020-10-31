jQuery(document).ready(function($){
	$("#zendvn_mp_st_ajax_title").blur(function(e){

		var dataObj = {				
            "action": "zendvn_check_form",
            "value": $(this).val()
        };
        console.log(dataObj);	
		$.ajax({
			url		: ajaxurl,//admin-ajax.php?action=zendvn_check_form
			type	: "POST",
			data	: dataObj,
			dataType: "html",
			success	: function(data, status, jsXHR){
						console.log(data);
					}
		});
	});
});