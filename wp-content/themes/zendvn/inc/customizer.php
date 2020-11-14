<?php
class Zendvn_Theme_Customize_Control {

    private $_theme_mods = array();
    public function __construct() {
		$options = array(
            'general' 		=> true
        );	
        $this->_theme_mods = get_theme_mods();
        if($options['general']== true) 			$this->general();
    }

	public function general(){
		require_once ZENDVN_THEME_CONTROL_DIR . '/general_section.php';
		new Zendvn_Theme_General_Section($this->_theme_mods);
	}
}