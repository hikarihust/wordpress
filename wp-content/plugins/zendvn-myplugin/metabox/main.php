<?php
class Zendvn_Mp_Metabox_Main{
    
	private $_metabox_name = 'zendvn_mp_mb_options';
	
    private $_metabox_option = array();
    
	public function __construct(){
		$defaultOption = array(
            'zendvn_mp_mb_simple' => false,
            'zendvn_mp_mb_data' => false,
            'zendvn_mp_mb_data2' => true,
        );
        $this->_metabox_option = get_option($this->_metabox_name,$defaultOption);
        // echo '<br/>' . __METHOD__;
        $this->simple();
        $this->data();
        $this->data2();
	}
	
	public function data2(){
		if($this->_metabox_option['zendvn_mp_mb_data2'] == true){
			
			require_once ZENDVN_MP_METABOX_DIR . '/data2.php';
			new Zendvn_Mp_Mb_Data2();
		}
	}
    
	public function data(){
		if($this->_metabox_option['zendvn_mp_mb_data'] == true){
			
			require_once ZENDVN_MP_METABOX_DIR . '/data.php';
			new Zendvn_Mp_Mb_Data();
		}
	}

	public function simple(){
		if($this->_metabox_option['zendvn_mp_mb_simple'] == true){
			
			require_once ZENDVN_MP_METABOX_DIR . '/simple.php';
			new Zendvn_Mp_Mb_Simple();
		}
	}
}