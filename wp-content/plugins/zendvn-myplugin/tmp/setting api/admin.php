<?php
require_once ZENDVN_MP_PLUGIN_DIR . '/includes/support.php';
class ZendvnMpAdmin {

	private $_menuSlug = 'zendvn-mp-my-setting';

	public function __construct(){
		// echo '<br>' . __METHOD__;
		add_action('admin_menu', array($this,'settingMenu'));

		add_action('admin_init', array($this,'register_setting_and_fields'));
	}

	public function register_setting_and_fields(){
		register_setting('zendvn_mp_options', 'zendvn_mp_name', array($this,'validate_setting'));
	
	}

	//===============================================
	//Kiem tra cac dieu kien truoc khi luu du lieu vao database
	//===============================================
	public function validate_setting($data_input) {

	}

	public function settingMenu(){
		add_menu_page(	
						'My Setting title', 
						'My Setting', 
						'manage_options', 
						$this->_menuSlug, 
						array($this,'settingPage')
					);
	}

	public function settingPage(){
		require_once ZENDVN_MP_VIEWS_DIR . '/setting-page.php';
	}
}