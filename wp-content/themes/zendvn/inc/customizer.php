<?php
class Zendvn_Theme_Customize_Control {

    private $_theme_mods = array();
    public function __construct() {
		$options = array(
            'general' 		=> true,
            'ads' 			=> true
        );	
        $this->_theme_mods = get_theme_mods();
        if($options['general']== true) 			$this->general();
        if($options['ads']== true)              $this->ads();
    }

	public function ads(){
		require_once ZENDVN_THEME_CONTROL_DIR . '/ads_section.php';
		new Zendvn_Theme_Ads_Section($this->_theme_mods);
	}

	public function general(){
		require_once ZENDVN_THEME_CONTROL_DIR . '/general_section.php';
		new Zendvn_Theme_General_Section($this->_theme_mods);
    }
    
    public function ads_setion($val = '') {
        if(empty($val)) return false;
        $options  = $this->_theme_mods['zendvn_theme_ads'];
		if($val == 'top-banner'){
            echo '<pre>';
			print_r($options);
            echo '</pre>'; 
		}
		
    }
}