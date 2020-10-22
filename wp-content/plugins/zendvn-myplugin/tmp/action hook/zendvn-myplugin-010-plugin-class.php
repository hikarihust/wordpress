<?php
/*
Plugin Name: ZendVN MyPlugin
Plugin URI: http://www.zend.vn
Description: Tim hieu ve qua trinh chuan xay dung Plugin.
Author: ZendVN group
Version: 1.0
Author URI: http://www.zend.vn
*/

new ZendvnMp();

class ZendvnMp{
	
	public function __construct(){
		add_action('wp_footer', array($this,'newFooter'));
		add_action('wp_footer', array($this,'newFooter2'));
	}
	
	public function newFooter(){
		echo '<div>Hello World</div>';
	}
	
	public function newFooter2(){
		echo '<div>Hello World 2</div>';
	}
	
}