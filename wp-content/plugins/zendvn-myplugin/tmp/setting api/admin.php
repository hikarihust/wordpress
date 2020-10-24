<?php
require_once ZENDVN_MP_PLUGIN_DIR . '/includes/support.php';
class ZendvnMpAdmin {

	private $_menuSlug = 'zendvn-mp-my-setting';

	private $_setting_options;

	public function __construct(){
		// echo '<br>' . __METHOD__;

		$this->_setting_options = get_option('zendvn_mp_name',array());
		add_action('admin_menu', array($this,'settingMenu'));

		add_action('admin_init', array($this,'register_setting_and_fields'));
	}

	public function register_setting_and_fields(){
		register_setting('zendvn_mp_options', 'zendvn_mp_name', array($this,'validate_setting'));
	
		//MAIN SETTING
		$mainSection = 'zendvn_mp_main_section';
		add_settings_section($mainSection, "Main setting", 
							array($this,'main_section_view'), $this->_menuSlug);
		add_settings_field('zendvn_mp_new_title', 'Site title', array($this,'create_form'), 
							$this->_menuSlug,$mainSection,array('name'=>'new_title_input'));	

		// EXT SETTING
		$extSection = 'zendvn_mp_ext_section';
		add_settings_section($extSection, "Ext setting", 
							array($this,'main_section_view'), $this->_menuSlug);
		add_settings_field('zendvn_mp_slogan', 'Slogan:', array($this,'create_form'),
							$this->_menuSlug,$extSection, array('name'=>'slogan_input'));

		add_settings_field('zendvn_mp_security_code', '', array($this,'security_code_input'),
							$this->_menuSlug);
	}

	//===============================================
	//Kiem tra cac dieu kien truoc khi luu du lieu vao database
	//===============================================
	public function validate_setting($data_input) {
		return $data_input;
	}

	public function main_section_view(){
		
	}

	public function create_form($args){
				
		if($args['name']== 'new_title_input'){
			echo '<input type="text" name="zendvn_mp_name[zendvn_mp_new_title]"
						value="' . $this->_setting_options['zendvn_mp_new_title'] . '"/>';
			echo '<p class="description">Nhập vào một chuỗi không quá 20 ký tự</p>';
		}

		if($args['name']== 'slogan_input'){
			echo '<input type="text" name="zendvn_mp_name[zendvn_mp_slogan]"
						value="' . $this->_setting_options['zendvn_mp_slogan'] . '"/>';
			echo '<p class="description">Nhập vào một chuỗi không quá 20 ký tự</p>';
		}
		
	}

	public function security_code_input() {
		echo '<div style="line-height: 1.3;font-weight: 600; vertical-align: top;text-align: left;width: 200px;">Security code:</div>';
		echo '<p>This is security code</p>';
		echo '<input type="text" name="zendvn_mp_name[zendvn_mp_security_code]"
						value=""/>';
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