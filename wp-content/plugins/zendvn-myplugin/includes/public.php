<?php
require_once ZENDVN_MP_PLUGIN_DIR . '/includes/support.php';
class ZendvnMp{
	
	public function __construct(){
		echo '<br/>' . __METHOD__;
		//=====================================================
		//1. Ham thay doi toan bo title trong hook 'the_title'
		//=====================================================
		add_filter('the_title', array($this,'theTitle'));
	}

	//=====================================================
	//1. Ham thay doi toan bo title trong hook 'the_title'
	//=====================================================
	public function theTitle(){
		$str = 'Thay doi tieu cua bai viet';
		return $str;
	}

}