<?php
class ZendvnMp_Widget_Db_Simple{
	
	public function __construct(){
		
		add_action('wp_dashboard_setup', array($this,'widget'));		
	}
	
	public function widget(){
		wp_add_dashboard_widget('zendvn_mp_widget_db_simple', 'My Plugin Information', 
						'display');
	}
	
	public function display(){
		echo '<p> Đây là khóa học lập trình WP 4.x</p>';
		echo '<ul>'
		. '<li>contact: training@zend.vn</li>'
		. '<li>website: www.zend.vn</li>'
		. '</ul>';
	}
}