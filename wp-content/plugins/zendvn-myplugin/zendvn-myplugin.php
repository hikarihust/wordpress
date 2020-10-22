<?php
/*
Plugin Name: ZendVN MyPlugin
Plugin URI: http://www.zend.vn
Description: Tim hieu ve qua trinh chuan xay dung Plugin.
Author: ZendVN group
Version: 1.0
Author URI: http://www.zend.vn
*/

add_action('wp_footer', 'zendvn_mp_footer2',18 );
add_action('wp_footer', 'zendvn_mp_footer2',19 );
add_action('wp_footer', 'zendvn_mp_new_data',19 );

function zendvn_mp_new_data(){

	echo '<div>Chao mung cac ban den voi khoa lap
	trinh Wordpress chuyen nghiep cua
	<a href="http://www.zend.vn">ZendVN group</a>
	</div>';
}

function zendvn_mp_footer2(){
	echo '<div>Hello World</div>';
}
