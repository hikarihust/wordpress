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
        $url = get_site_url() . '/http/show_html.php?article=1&status=1'; 
		// Include an unmodified $wp_version.
		require ABSPATH . WPINC . '/version.php';
		$args = array(
            'method'	  => 'POST',
            'timeout'     => 5,
            'redirection' => 5,
            'httpversion' => '1.0',
            'user-agent'  => 'WordPress/' . $wp_version . '; ' . get_bloginfo( 'url' ),
            'blocking'    => true,
            'headers'     => array('custom-id'=>'zendvn-123456'),
            'cookies'     => array(),
            // 'cookies'     => $_COOKIE,
            'body'        => array('user'=>'quang','password'=>'123456'),
            'compress'    => false,
            'decompress'  => true,
            'sslverify'   => true, 
            'stream'      => false,
            'filename'    => null
        );
        // $response = wp_remote_get($url, $args);
        $response = wp_remote_post($url,$args);

		echo '<pre>';
		print_r($response);
		echo '</pre>';
    }
}
