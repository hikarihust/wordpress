<?php
/*
Plugin Name: ZendVN MyPlugin
Plugin URI: http://www.zend.vn
Description: Tim hieu ve qua trinh chuan xay dung Plugin.
Author: ZendVN group
Version: 1.0
Author URI: http://www.zend.vn
*/
register_deactivation_hook(__FILE__, 'zendvn_mp_deactive');

function zendvn_mp_deactive(){
	global $wpdb;
	$table_name = $wpdb->prefix . "options";
	$wpdb->update(
			$table_name, 
			array('autoload'=>'no'), 
			array('option_name'=>'zendvn_mp_options'),
			array('%s'),
			array('%s')
		);
	
}
