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
    
	//site-text-logo
	wp.customize('zendvn_theme_general[site-logo]', function(value){
		
		value.bind(function(newValue){
			$('.site-text-logo').html(newValue);
		});
    });
    
	//blog-description
	wp.customize('zendvn_theme_general[site-description]', function(value){
		
		value.bind(function(newValue){
			$('#blog-description').html(newValue);
		});
    });
    
	//site-description-color
	wp.customize('zendvn_theme_general[site-description-color]', function(value){
		
		value.bind(function(newValue){
			$('#blog-description').css('color',newValue);
		});
    });
    
	//copyright
	wp.customize('zendvn_theme_general[copyright]', function(value){
		
		value.bind(function(newValue){
			$('#copyright').html(newValue);
		});
	});
	
	/*======================================================================
	 * ADS SECTION
	 *======================================================================*/
	//top-banner
	wp.customize('zendvn_theme_ads[top-banner]', function(value){
		value.bind(function(newValue){
			$('.header-ad img').attr('src',newValue);
		});
	});

	wp.customize('zendvn_theme_ads[top-banner-link]', function(value){
		value.bind(function(newValue){
			$('.header-ad a').attr('href',newValue);
		});
	});

	wp.customize('zendvn_theme_ads[top-banner-title]', function(value){
		value.bind(function(newValue){
			$('.header-ad a').attr('title',newValue);
		});
	});

}(jQuery));