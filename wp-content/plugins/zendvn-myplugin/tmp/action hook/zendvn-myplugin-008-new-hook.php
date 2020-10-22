<?php
/*
Plugin Name: ZendVN MyPlugin
Plugin URI: http://www.zend.vn
Description: Tim hieu ve qua trinh chuan xay dung Plugin.
Author: ZendVN group
Version: 1.0
Author URI: http://www.zend.vn
*/

add_action('new_action_hook', 'new_action_callback', 10, 3);

function  new_action_callback($courseName, $author, $year){
	echo '<p>Khoa hoc lap trinh ' . $courseName . ' tai ' . $author . ' ' . $year;
}

function new_action_hook($courseName = 'Wordpress', $author='ZendVN', $year = '2014'){
	do_action('new_action_hook', $courseName, $author, $year);
}
