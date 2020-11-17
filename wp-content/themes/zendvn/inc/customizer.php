<?php
class Zendvn_Theme_Customize_Control {

    private $_theme_mods = array();
    public function __construct() {
		$options = array(
            'general' 		=> true,
			'ads' 			=> true,
			'menu_color'	=> true,
        );	
		$this->_theme_mods = get_theme_mods();
		$this->setDefault();
        if($options['general']== true) 			$this->general();
		if($options['ads']== true)              $this->ads();
		if($options['menu_color']== true) 		$this->menu_color();
	}

	public function setDefault() {
		$arrDefault = array();
		$arrDefault['theme_check'] = 1;
	}
	
	public function menu_color(){
		require_once ZENDVN_THEME_CONTROL_DIR . '/menu_section.php';
		new Zendvn_Theme_Menu_Color_Section($this->_theme_mods);
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
		$value = '';
		if($val == 'top-banner'){
			if(empty($options['top-banner-link'])){
				$value = '<img alt="" src="' . $options['top-banner'] . '">';
			}else{
				$img = '<img alt="" src="' . $options['top-banner'] . '">';
				$value = str_replace('</a>', $img . '</a>', $options['top-banner-link']);
			}
        }
        
		if($val == 'content-banner'){
			if(empty($options['content-banner-link'])){
				$value = '<img alt="" src="' . $options['content-banner'] . '">';
			}else{
				$img = '<img alt="" src="' . $options['content-banner'] . '">';
				$value = str_replace('</a>', $img . '</a>', $options['content-banner-link']);
			}
		}

		return $value;
	}
	
	public function general_setion($val = '') {
        if(empty($val)) return false;
		$options  = $this->_theme_mods['zendvn_theme_general'];
		$value = '';
		if($val == 'site-logo'){
			$value = $options['site-logo'];
		}

		if($val == 'site-description'){
			$value = $options['site-description'];
		}

		if($val == 'copyright'){
			$value = $options['copyright'];
		}

		return $value;
	}
}