(function($){
	wp.customize('zendvn_theme_general[date-time]', function(value){
		value.bind(function(newValue){
			if(newValue == 'yes'){
				$('#topbar-date').show();
			}else{
				$('#topbar-date').hide();
			}
		});
    });
    
	//topbar-search
	wp.customize('zendvn_theme_general[search-form]', function(value){
		value.bind(function(newValue){
			if(newValue == 'yes'){
				$('#topbar-search').show();
			}else{
				$('#topbar-search').hide();
			}
		});
	});
}(jQuery));