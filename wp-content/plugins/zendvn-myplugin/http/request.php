<?php
class Zendvn_Mp_Http_Api{

    private $_menuSlug = 'zendvn-mp-http-api';
    private $_version = '1.0';
	
	public function __construct(){
		add_action('admin_menu', array($this,'menuSetting'));
    }
    
	public function menuSetting(){
		add_menu_page("HTTP API", 'HTTP API', 'manage_options', 
					  $this->_menuSlug, array($this,'display2'),'',3);  // display, display2
		add_submenu_page($this->_menuSlug, "Get Info", 'Get Info', 'manage_options',
					  $this->_menuSlug . '-info', array($this,'check_version'),'',3); // json_data, json_data2, check_version
    }

	public function check_version(){
		$args = array(
				'headers'     => array('custom-id'=>'zendvn-123456'),
				'body'        => array('user'=>'quang','password'=>'123456'),
		);
		$url = get_site_url() . '/http/check_version.php';
		$response = wp_remote_post($url,$args);
	}

	public function json_data2(){
		$args = array(
				'headers'     => array('custom-id'=>'zendvn-123456'),
				'body'        => array('user'=>'quang','password'=>'123456'),
		);
		$url = get_site_url() . '/http/json2.php?status=1';
		$response = wp_remote_post($url,$args);
	
		if(wp_remote_retrieve_response_code($response) == 200){
			$info = json_decode(wp_remote_retrieve_body($response));
				
			echo '<ul>';
			foreach ($info as $item){
				echo '<li>[' . $item->id . '] ' . $item->title . '</li>';
			}
			echo '</ul>';
		} 
	
		echo '<pre>';
		print_r($response);
		echo '</pre>';
	}

    public function json_data() {
		$args = array(
            'headers'     => array('custom-id'=>'zendvn-123456'),
            'body'        => array('user'=>'quang','password'=>'123456'),
            );
        $url = get_site_url() . '/http/json.php';
        $response = wp_remote_post($url,$args);
        
        if(wp_remote_retrieve_response_code($response) === 200){
            $info = json_decode(wp_remote_retrieve_body($response));
            
            echo '<ul>';
            foreach ($info as $item){
                echo '<li>[' . $item->id . '] ' . $item->title . '</li>';
            }
            echo '</ul>';
        }
        
        echo '<pre>';
        print_r($response);
        echo '</pre>';
    }

    public function display2() {
        $url = get_site_url() . '/http/show_html.php?article=1&status=1'; 
		$args = array(
            'headers'     => array('custom-id'=>'zendvn-123456'),
            'body'        => array('user'=>'quang','password'=>'123456'),
        );
        $response = wp_remote_request($url,$args);
        // $info = wp_remote_retrieve_body($response);
        // $info  = wp_remote_retrieve_header($response,'content-type');
        // $info  = wp_remote_retrieve_headers($response);
        // $info = wp_remote_retrieve_response_code($response);
        $info = wp_remote_retrieve_response_message($response);

		echo '<pre>';
		print_r($info);
		echo '</pre>';
    }
    
    public function display() {
        $url = get_site_url() . '/http/show_html.php?article=1&status=1'; 
        // $url = get_site_url() . '/http/create_file.php'; 
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
            'sslverify'   => true,  //.crt
            'sslcertificates'  => ABSPATH . WPINC . '/certificates/ca-bundle.crt',
            'stream'      => false,
            'filename'    => null
        );
        // $response = wp_remote_get($url, $args);
        // $response = wp_remote_post($url,$args);
        // $response = wp_remote_head($url,$args);
        $response = wp_remote_request($url,$args);

		echo '<pre>';
		print_r($response);
		echo '</pre>';
    }
}
