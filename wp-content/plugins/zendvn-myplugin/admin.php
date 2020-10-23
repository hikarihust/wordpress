<?php
require_once ZENDVN_MP_PLUGIN_DIR . '/includes/support.php';
class ZendvnMpAdmin {

	public function __construct(){
        // echo '<br>' . __METHOD__;
        // add_action('admin_init', array($this,'add_new_option'));
        // add_action('admin_init', array($this,'add_array_option'));
        /*
        $tmp = 'a:3:{s:6:"course";s:13:"Wordpress 4.x";s:6:"author";s:12:"ZendVN group";s:7:"website";s:11:"www.zend.vn";}';
        $tmp = unserialize($tmp);
        echo "<pre>";
        print_r($tmp);
        echo "</pre>";
        */
        // add_action('admin_init', array($this,'get_options'));
        // add_action('admin_init', array($this,'update_options'));
        // add_action('admin_init', array($this,'update_options2'));
        // add_action('admin_init', array($this,'del_options'));
        // add_action('admin_init', array($this,'update_autoload'));
        // add_action('admin_init', array($this,'update_options3'));
    }

	public function add_new_option(){
		add_option('zendvn_mp_wp_version','4.0','','yes');
		add_option('zendvn_mp_plugin_version','1.0','','no');
    }

	public function add_array_option(){
		$arrOption = array(
					'course' => 'Wordpress 4.x',
					'author' => 'ZendVN group',
					'website' => 'www.zend.vn'
				);
		
		add_option('zendvn_mp_wp_course',$arrOption,'','yes');
    }
    
	public function get_options(){
		$tmp = get_option('zendvn_mp_wp_version','3.0');
		echo '<br/>' . $tmp . '<br />';
		
		$arrOption = array(
				'course' => 'Wordpress 4.x',
				'author' => 'ZendVN group',
				'website' => 'www.zend.vn'
			);
		$tmp = get_option('zendvn_mp_wp_course',$arrOption);
		echo '<pre>';
		print_r($tmp);
		echo '</pre>';
    }  
    
	public function update_options(){
		update_option('zendvn_mp_wp_version', '4.5');	
		$arrOption = array(
				'course' => 'Wordpress 4.5',
				'author' => 'ZendVN group',
				'website' => 'www.zend.vn'
			);
		update_option('zendvn_mp_wp_course', $arrOption);
    }
    
	public function update_options2(){
		$old_options = get_option('zendvn_mp_wp_course');
		$old_options['course'] = 'Wordpress 5';
		
		update_option('zendvn_mp_wp_course', $old_options);
    }
    
	public function del_options(){
		delete_option('zendvn_mp_wp_version');
		delete_option('zendvn_mp_wp_course');
    }
    
	public function update_autoload(){
		$old_option = get_option('zendvn_mp_plugin_version');
		delete_option('zendvn_mp_plugin_version');
		add_option('zendvn_mp_plugin_version',$old_option,'','yes');
    }
    
	public function update_options3(){
		update_option('zendvn_mp_plugin_version', '2.0');
		update_option('zendvn_mp_wp_version', '2.0');
	}
}