<?php
class Zendvn_Mp_Http_Api{

    private $_menuSlug = 'zendvn-mp-http-api';
    private $_version = '1.0';
	
	public function __construct(){
		add_action('admin_menu', array($this,'menuSetting'));
    }
    
	public function menuSetting(){
		add_menu_page("HTTP API", 'HTTP API', 'manage_options', 
					  $this->_menuSlug, array($this,'display'),'',3);
		add_submenu_page($this->_menuSlug, "Get Info", 'Get Info', 'manage_options',
					  $this->_menuSlug . '-info', array($this,'display'),'',3);
    }
    
    public function display() {
		$url = get_site_url() . '/http/show_html.php';
        $response = wp_remote_get($url);

		echo '<pre>';
		print_r($response);
		echo '</pre>';
    }
}
