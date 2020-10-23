<?php
require_once ZENDVN_MP_PLUGIN_DIR . '/includes/support.php';
class ZendvnMpAdmin {

	public function __construct(){
        echo '<br>' . __METHOD__;
        add_action('admin_menu', array($this,'settingMenu'));
    }
    
	//=======================================================
	//1. Them mot submenu vao Dashboard cua WP menus
	//=======================================================
	public function settingMenu(){
		$menuSlug = 'zendvn-mp-my-setting';
		add_posts_page('My Setting title', 'My Setting', 'manage_options', 
							$menuSlug, array($this,'settingPage'));
	}
	
	public function settingPage(){
		echo '<h2>My Setting</h2>';
	}
}