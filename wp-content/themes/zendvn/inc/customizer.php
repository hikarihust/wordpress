<?php
// $tmp = get_theme_mods();
// echo '<pre>';
// print_r($tmp);
// echo '</pre>';

add_action('customize_register', 'zendvn_theme_customize_register');

function zendvn_theme_customize_register($wp_customize) {
    $sectionID = 'zendvn_theme_general';
	$wp_customize->add_section($sectionID,array(
        'title' => __('General'),
        'description' => 'Hien thi cac phan tu trong Section',
        'priority' => 20
    ));

	//=======================================================
	// TAO O RADIO
	//=======================================================
	$inputName = 'my-radio';
	$settingID = $sectionID . '[' . $inputName . ']';
	$wp_customize->add_setting($settingID,array(
			'default' 		=> 'unknown',
			'capability' 	=>'edit_theme_options',
			'type'			=> 'theme_mod',
			'transport'		=> 'postMessage',
	));
	
	$controlID = 'zendvn-theme-' . $inputName;
	$wp_customize->add_control($controlID,array(
			'label' 		=> __('Gioi tinh'),
			'section' 		=> $sectionID,
			'settings' 		=> $settingID,
			'type'			=>'radio',
			'choices'		=> array(
						'male' => 'Name',
						'female' => 'Nu',
						'unknown' => 'Chua xac dinh'
					)
	));

	//=======================================================
	// TAO O TEXTBOX
    //=======================================================
	$inputName = 'site-name';
	$settingID = $sectionID . '[' . $inputName . ']';

	$wp_customize->add_setting($settingID,array(
        'default' 		=> 'ZendVN theme',
        'capability' 	=>'edit_theme_options',
        'type'			=> 'theme_mod',
        'transport'		=> 'refresh',
        'sanitize_callback' => 'sanitize_zendvn_theme_site_name'
    ));

    $controlID = 'zendvn-theme-' . $inputName;
	$wp_customize->add_control($controlID,array(
        'label' 		=> __('Site name'),
        'section' 		=> $sectionID ,
        'settings' 		=> $settingID ,
        'type'			=>'text'
    ));
}

function sanitize_zendvn_theme_site_name($value){
	$value = trim($value);
	if(empty($value)) $value = 'Spartan';
	return $value;
}