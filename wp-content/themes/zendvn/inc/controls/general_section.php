<?php
class Zendvn_Theme_General_Section {

    private $_theme_mods;
    public function __construct($theme_mods = array()) {
        $this->_theme_mods = $theme_mods;
        add_action('customize_register', array($this,'register'));
        add_action('wp_head', array($this,'css'));
        add_action('customize_preview_init', array($this,'live_preview'));
    }

    public function css() {

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
        $sectionID = 'zendvn_theme_general';
        $wp_customize->add_section($sectionID,array(
            'title' => __('General'),
            'description' => 'Hien thi cac phan tu trong Section',
            'priority' => 20
        ));

        //=======================================================
        // Tao date-time
        //=======================================================
        $inputName = 'date-time';
        $settingID = $sectionID . '[' . $inputName . ']';
        $wp_customize->add_setting($settingID,array(
                'default' 		=> 'yes',
                'capability' 	=>'edit_theme_options',
                'type'			=> 'theme_mod',
                'transport'		=> 'postMessage',
        ));
        
        $controlID = 'zendvn-theme-' . $inputName;
        $wp_customize->add_control($controlID,array(
                'label' 		=> __('Hien thi thoi gian'),
                'section' 		=> $sectionID,
                'settings' 		=> $settingID,
                'type'			=>'select',
				'choices'		=> array(
                    'yes' => 'Yes',
                    'no' => 'No'
                )
        ));

		//=======================================================
		// Tao search-form
		//=======================================================
		$inputName = 'search-form';
		$settingID = $sectionID . '[' . $inputName . ']';
		$wp_customize->add_setting($settingID,array(
				'default' 		=> 'yes',
				'capability' 	=> 'edit_theme_options',
				'type'			=> 'theme_mod',
				'transport'		=> 'postMessage',
		));
		
		$controlID = 'zendvn-theme-' . $inputName;
		$wp_customize->add_control($controlID,array(
				'label' 		=> __('Hien thi search form'),
				'section' 		=> $sectionID,
				'settings' 		=> $settingID,
				'type'			=>'select',
				'choices'		=> array(
						'yes' => 'Yes',
						'no' => 'No'
				)
        ));
        
        //=======================================================
        // logo
        //=======================================================
        $inputName = 'site-logo';
        $settingID = $sectionID . '[' . $inputName . ']';
        $wp_customize->add_setting($settingID,array(
                'default' 		=> '<h1><a href="#" title="Spartan" rel="home">Spartan</a></h1>',
                'capability' 	=> 'edit_theme_options',
                'type'			=> 'theme_mod',
                'transport'		=> 'postMessage',
        ));
        
        $controlID = 'zendvn-theme-' . $inputName;
        $wp_customize->add_control($controlID,array(
                'label' 		=> __('Site logo'),
                'section' 		=> $sectionID,
                'settings' 		=> $settingID,
                'type'			=>'textarea',			
        ));

        //=======================================================
        // site-description
        //=======================================================
        $inputName = 'site-description';
        $settingID = $sectionID . '[' . $inputName . ']';
        $wp_customize->add_setting($settingID,array(
                'default' 		=> "Edit your subheading via the theme customizer.<br>It looks much better when it's 2 lines long. ",
                'capability' 	=> 'edit_theme_options',
                'type'			=> 'theme_mod',
                'transport'		=> 'postMessage',
        ));
        
        $controlID = 'zendvn-theme-' . $inputName;
        $wp_customize->add_control($controlID,array(
                'label' 		=> __('Site description'),
                'section' 		=> $sectionID,
                'settings' 		=> $settingID,
                'type'			=>'textarea',			
        ));

        //=======================================================
        // site-description-color
        //=======================================================
        $inputName = 'my-color';
        $settingID = $sectionID . '[' . $inputName . ']';
        $wp_customize->add_setting($settingID,array(
                'default' 		=> '#878787',
                'capability' 	=>'edit_theme_options',
                'type'			=> 'theme_mod',
                'transport'		=> 'postMessage',
        ));
        
        $controlID = 'zendvn-theme-' . $inputName;
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $controlID,array(
                'label' 		=> __('Site description text color'),
                'section' 		=> $sectionID,
                'settings' 		=> $settingID,
        )));

        //=======================================================
        // copyright
        //=======================================================
        $inputName = 'copyright';
        $settingID = $sectionID . '[' . $inputName . ']';
        $wp_customize->add_setting($settingID,array(
                'default' 		=> 'Copyright 2014 Spartan',
                'capability' 	=> 'edit_theme_options',
                'type'			=> 'theme_mod',
                'transport'		=> 'postMessage',
        ));
        
        $controlID = 'zendvn-theme-' . $inputName;
        $wp_customize->add_control($controlID,array(
                'label' 		=> __('Copyright footer'),
                'section' 		=> $sectionID,
                'settings' 		=> $settingID,
                'type'			=>'textarea',			
        ));
    }
}