<?php

class Zendvn_Mp_Setting_Ajax{
        
	private $_menu_slug = 'zendvn-mp-st-ajax';
	
	private $_option_name = 'zendvn_mp_st_ajax';
	
	private $_setting_options;

	public function __construct(){
		echo "<br/>" . __METHOD__;
            
		$this->_setting_options = get_option($this->_option_name,array());
		add_action('admin_menu', array($this,'settingMenu'));

		add_action('admin_init', array($this,'register_setting_and_fields'));
    }

	public function register_setting_and_fields(){
		register_setting($this->_menu_slug,$this->_option_name, array($this,'validate_setting'));
	
		//MAIN SETTING
		$mainSection = 'zendvn_mp_main_section';
		add_settings_section($mainSection, "Main setting", 
							array($this,'main_section_view'), $this->_menuSlug);
		add_settings_field('zendvn_mp_new_title', 'Site title', array($this,'create_form'), 
							$this->_menuSlug,$mainSection,array('name'=>'new_title_input'));	

		add_settings_field('zendvn_mp_logo', 'Logo:', array($this,'create_form'), 
							$this->_menuSlug,$mainSection, array('name'=>'logo_input'));
    }
    
	public function main_section_view(){
		
	}
    
	public function settingMenu(){
		
		add_menu_page(	
						'My Setting title', 
						'My Setting', 
						'manage_options', 
						$this->_menu_slug, 
						array($this,'display')
					);
    }
    
	public function display(){
		require_once ZENDVN_MP_VIEWS_DIR . '/setting-page.php';
	}
	
}