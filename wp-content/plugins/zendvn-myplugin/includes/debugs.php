<?php
new Zendvn_Mp_Debug();

class Zendvn_Mp_Debug{
	public function __construct(){
		add_action('init', array($this,'debug_check'));
	}
	
	public function debug_check(){
		// ?debug=1&obj=wp_query
		$debug = (isset($_GET['debug'])) ? $_GET['debug'] : 0;
		if($debug == 1 && current_user_can('manage_options')==1){
			add_action('wp_footer', array($this,'debug_output'));
		}
    }
    
	public function debug_output(){
    
	}
}