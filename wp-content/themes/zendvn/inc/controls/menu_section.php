<?php
class Zendvn_Theme_Menu_Color_Section {

    private $_theme_mods;
    public function __construct($theme_mods = array()) {
        $this->_theme_mods = $theme_mods;
        add_action('customize_register', array($this,'register'));
        add_action('wp_head', array($this,'css'));
        add_action('customize_preview_init', array($this,'live_preview'));
    }

    public function css() {
        $options = @$this->_theme_mods['zendvn_theme_menu_color'];
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
        $sectionID = 'zendvn_theme_menu_color';
        $wp_customize->add_section($sectionID,array(
            'title' => __('Category Color'),
            'description' => 'Hien thi cac phan tu trong Section',
            'priority' => 20
        ));

	//=======================================================
	// TAO O COLOR PICKER
        //=======================================================
        $cats = get_categories();
        foreach ($cats as $key => $info) {
            $inputName = 'cat-' . $info->cat_ID;
            $settingID = $sectionID . '[' . $inputName . ']';
            $wp_customize->add_setting($settingID,array(
                'default' 		=> '#979797',
                'capability' 	        =>'edit_theme_options',
                'type'			=> 'theme_mod',
                'transport'		=> 'postMessage',
            ));
            
            $controlID = 'zendvn-theme-' . $inputName;
            $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $controlID,array(
                'label' 		=> __($info->name),
                'section' 		=> $sectionID,
                'settings' 		=> $settingID,
            )));
        }
    }
}