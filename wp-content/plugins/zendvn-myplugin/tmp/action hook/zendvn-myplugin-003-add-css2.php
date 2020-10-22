<?php
/*
Plugin Name: ZendVN MyPlugin
Plugin URI: http://www.zend.vn
Description: Tim hieu ve qua trinh chuan xay dung Plugin.
Author: ZendVN group
Version: 1.0
Author URI: http://www.zend.vn
*/

add_action('wp_footer', 'zendvn_mp_footer');

function zendvn_mp_footer(){
	echo "<br /> Page: " . is_page();
}

add_action('wp_head', 'zendvn_mp_new_css');

function zendvn_mp_new_css(){
	if(is_page() == true){
		$cssUrl = plugins_url('/css/abc.css',__FILE__);
		$css = '<link rel="stylesheet" type="text/css" media="all" href="' . $cssUrl . '" />';
		echo $css;
	}
	
}
