<?php
require_once ZENDVN_MP_PLUGIN_DIR . '/includes/support.php';
class ZendvnMp{
	
	public function __construct(){
		echo '<br/>' . __METHOD__;
		//=====================================================
		//1. Ham thay doi toan bo title trong hook 'the_title'
		//=====================================================
		// add_filter('the_title', array($this,'theTitle'));

		//=====================================================
		//2. Ham su dung 2 tham cua hook 'the_title'
		//=====================================================
		// add_filter('the_title', array($this,'theTitle2'),10,2);

		//=====================================================
		//3. Ham su dung 2 tham cua hook 'the_title'
		//=====================================================
		add_filter('the_title', array($this,'theTitle3'),10,2);
	}

	//=====================================================
	//1. Ham thay doi toan bo title trong hook 'the_title'
	//=====================================================
	public function theTitle(){
		$str = 'Thay doi tieu cua bai viet';
		return $str;
	}

	//=====================================================
	//2. Ham su dung 2 tham cua hook 'the_title'
	//=====================================================
	public function theTitle2($title, $id){
		//echo "<br/>" . $id;
		if($id == 1){
			$title = str_replace("Hello", "Xin chào", $title);
		}
		return $title;
	}

	//=====================================================
	//3. Ham su dung 2 tham cua hook 'the_title'
	//=====================================================
	public function theTitle3($title, $id){
		//echo "<br/>" . $id;
		if($id == 1){
			$title = 'Chào mừng các bạn đến với thế giới WP';
		}
		return $title;
	}

}