<?php
require_once ZENDVN_MP_PLUGIN_DIR . '/includes/support.php';

class ZendvnMpAdmin{	
	
	public function __construct(){		
		$this->ajaxPage();
	}
	
	public function ajaxPage(){
		require_once ZENDVN_MP_SETTING_DIR . '/ajax.php';
		new Zendvn_Mp_Setting_Ajax();
	}
}