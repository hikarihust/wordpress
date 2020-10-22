<?php
/*
Plugin Name: ZendVN MyPlugin
Plugin URI: http://www.zend.vn
Description: Tim hieu ve qua trinh chuan xay dung Plugin.
Author: ZendVN group
Version: 1.0
Author URI: http://www.zend.vn
*/

class ZendvnMp{
	
	public static function init(){
		echo '<br/>' . __CLASS__;
		add_action('wp_footer', array(__CLASS__,'newFooter'));
		add_action('wp_footer', array(__CLASS__,'newFooter2'));
	}
	
	public static function newFooter(){
		echo '<div>Hello World</div>';
	}
	
	public static function newFooter2(){
		echo '<div>Hello World 2</div>';
	}
	
}

ZendvnMp::init();