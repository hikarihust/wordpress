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
		if(!isset($this->_theme_mods['theme_check'])){
			add_action('after_switch_theme', array($this,'setDefault'));
		}

        if($options['general']== true) 			$this->general();
		if($options['ads']== true)              $this->ads();
		if($options['menu_color']== true) 		$this->menu_color();
	}

	public function setDefault() {
		$arrDefault = array();
		$arrDefault['theme_check'] = 1;

		$arrDefault['zendvn_theme_general'] = array(
			'date-time' 				=> 'yes',
			'search-form' 				=>'yes',
			'site-logo' 				=> '<h1><a href="#" title="Spartan" rel="home">Spartan</a></h1>',
			'site-description' 			=> 'Edit your subheading via the theme customizer. <br /> It looks much better when it\'s 2 lines long.',
			'site-description-color' 	=> '#878787',
			'copyright' 				=> 'Copyright 2014 Spartan'				
		);
		$arrDefault['zendvn_theme_ads'] = array(
					'top-banner' 			=> ZENDVN_THEME_IMG_URL . '/ad-620x80.png',
					'top-banner-link' 		=> '<a href="#" title="Ad"></a>',
					'content-banner' 		=> ZENDVN_THEME_IMG_URL . '/ad-620x80.png',
					'content-banner-link' 	=> '<a href="#" title="Ad"></a>',
					'banner-in-content' 	=> '<a href="#" title="Total Theme"> <img src="' . ZENDVN_THEME_IMG_URL . '/banner_300x250.jpg" alt="Total Theme" />'
				);
		
		update_option('theme_mods_zendvn', $arrDefault);
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