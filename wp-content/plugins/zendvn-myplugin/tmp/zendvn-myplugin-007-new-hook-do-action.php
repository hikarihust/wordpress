<?php
/*
Plugin Name: ZendVN MyPlugin
Plugin URI: http://www.zend.vn
Description: Tim hieu ve qua trinh chuan xay dung Plugin.
Author: ZendVN group
Version: 1.0
Author URI: http://www.zend.vn
*/

add_action('new_action_hook', 'new_action_callback');

function  new_action_callback(){
	echo '<p>Khoa hoc lap trinh Wordpress tai ZendVN';
}

function new_action_hook(){
	do_action('new_action_hook');
}
