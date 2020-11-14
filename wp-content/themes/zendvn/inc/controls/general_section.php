<?php
class Zendvn_Theme_General_Section {

    private $_theme_mods;
    public function __construct($theme_mods = array()) {
        $this->_theme_mods = $theme_mods;
        add_action('customize_register', array($this,'register'));
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
    }
}