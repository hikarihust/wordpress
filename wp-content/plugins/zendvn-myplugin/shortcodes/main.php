<?php
class Zendvn_Mp_SC_Main{
        
    private $_shortcode_name = 'zendvn_mp_sc_options';
    private $_shortcode_option = array();

	public function __construct(){
		$defaultOption = array(
					'zendvn_mp_sc_date' => false,
					'zendvn_mp_sc_titles' => true
                );
                
        $this->_shortcode_option = get_option($this->_shortcode_name,$defaultOption);

		$this->date();
		$this->titles();
		
		// remove_shortcode("zendvn_mp_sc_date");
		// echo "<br />shortcode_exists: " . shortcode_exists("zendvn_mp_sc_date");
    }
    
	public function date(){
		if($this->_shortcode_option['zendvn_mp_sc_date'] == true){
			require_once ZENDVN_MP_SHORTCODE_DIR . '/date.php';
			new Zendvn_Mp_SC_Date();
		} else {
			add_shortcode('zendvn_mp_sc_date', '__return_false');
		}
	}

	public function titles(){
		if($this->_shortcode_option['zendvn_mp_sc_titles'] == true){
			require_once ZENDVN_MP_SHORTCODE_DIR . '/titles.php';
			new Zendvn_Mp_SC_Titles();
		}else{
			add_shortcode('zendvn_mp_sc_titles', '__return_false');
		}
	}
	
}