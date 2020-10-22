<?php
/*
Plugin Name: ZendVN MyPlugin
Plugin URI: http://www.zend.vn
Description: Tim hieu ve qua trinh chuan xay dung Plugin.
Author: ZendVN group
Version: 1.0
Author URI: http://www.zend.vn
*/
register_activation_hook(__FILE__, 'zendvn_mp_active');

/*==========================================================
 * Vi du 2
*==========================================================*/
$str = 'a:3:{s:6:"course";s:13:"Wordpress Pro";s:6:"author";s:12:"ZendVN group";s:7:"website";s:11:"www.zend.vn";}';
echo '<pre>';
print_r(unserialize($str));
echo '</pre>';

function zendvn_mp_active(){
	$zendvn_mp_options = array(
				'course' 	=> 'Wordpress Pro',
				'author' 	=> 'ZendVN group',
				'website' 	=> 'www.zend.vn'
			);
	//Options API
	add_option("zendvn_mp_options",$zendvn_mp_options,'','yes');
	
	$zendvn_mp_version = "1.0";
	//Options API
	add_option("zendvn_mp_version",$zendvn_mp_version,'','yes');
} 

/*==========================================================
 * Vi du 1
 *==========================================================*/
// function zendvn_mp_active(){
// 	$zendvn_mp_version = "1.0";	
// 	//Options API
// 	add_option("zendvn_mp_version", $zendvn_mp_version,'','yes');
// }
