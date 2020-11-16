<?php
class Zendvn_Theme_Ads_Section {

    private $_theme_mods;
    public function __construct($theme_mods = array()) {
        $this->_theme_mods = $theme_mods;
        add_action('customize_register', array($this,'register'));
        add_action('wp_head', array($this,'css'));
        add_action('customize_preview_init', array($this,'live_preview'));
    }

    public function css() {
        $options = @$this->_theme_mods['zendvn_theme_ads'];
?>
        <style type="text/css">

        </style>
<?php 
    }

    public function live_preview() {
		wp_enqueue_script('zendvn-theme-customize', 
                            ZENDVN_THEME_JS_URL . '/theme-customize.js',
                            array('jquery','customize-preview'),
                            '1.0.0',
                            true
						);	
    }

    public function register($wp_customize) {
        $sectionID = 'zendvn_theme_ads';
        $wp_customize->add_section($sectionID,array(
            'title' => __('Ads banner'),
            'description' => 'Hien thi cac phan tu trong Section',
            'priority' => 20
        ));

	//=======================================================
	// Tao top-banner
	//=======================================================
	$inputName = 'top-banner';
	$settingID = $sectionID . '[' . $inputName . ']';
	$wp_customize->add_setting($settingID,array(
			'default' 		=> 'http://wordpress.xyz/wp-content/themes/zendvn/images/ad-620x80.png',
			'capability' 	        =>'edit_theme_options',
			'type'			=> 'theme_mod',
			'transport'		=> 'postMessage',
	));
	
	$controlID = 'zendvn-theme-' . $inputName;
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, $controlID,array(
			'label' 		=> __('Top banner'),
			'section' 		=> $sectionID,
			'settings' 		=> $settingID,
	)));
        
        $inputName = 'top-banner-link';
        $settingID = $sectionID . '[' . $inputName . ']';
        $wp_customize->add_setting($settingID,array(
                'default' 		=> '',
                'capability' 	        => 'edit_theme_options',
                'type'			=> 'theme_mod',
                'transport'		=> 'postMessage',
        ));
        
        $controlID = 'zendvn-theme-' . $inputName;
        $wp_customize->add_control($controlID,array(
                'label' 		=> __('Top banner link'),
                'section' 		=> $sectionID,
                'settings' 		=> $settingID,
                'type'			=>'textarea',			
        ));

        $inputName = 'top-banner-title';
        $settingID = $sectionID . '[' . $inputName . ']';
        $wp_customize->add_setting($settingID,array(
                'default' 		=> '',
                'capability' 	        => 'edit_theme_options',
                'type'			=> 'theme_mod',
                'transport'		=> 'postMessage',
        ));
        
        $controlID = 'zendvn-theme-' . $inputName;
        $wp_customize->add_control($controlID,array(
                'label' 		=> __('Top banner title'),
                'section' 		=> $sectionID,
                'settings' 		=> $settingID,
                'type'			=>'textarea',			
        ));
    }
}