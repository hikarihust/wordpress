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
	// TAO O SELECTBOX
	//=======================================================
	$cats = get_categories();
	
	$catData =  array();
	$catData[] = '--Select--';
	foreach ($cats as $key => $info){
		$catData[$info->cat_ID] = $info->name;
	}
	
	$inputName = 'my-categories';
	$settingID = $sectionID . '[' . $inputName . ']';
	$wp_customize->add_setting($settingID,array(
			'default' 		=> '0',
			'capability' 	=> 'edit_theme_options',
			'type'			=> 'theme_mod',
			'transport'		=> 'postMessage',
	));
	
	$controlID = 'zendvn-theme-' . $inputName;
	$wp_customize->add_control($controlID,array(
			'label' 		=> __('Categories'),
			'section' 		=> $sectionID,
			'settings' 		=> $settingID,
			'type'			=>'select',
			'choices'		=> $catData,
			'description'   => 'Hien thi cac categories trong he thong'
	)); 

	//=======================================================
	// TAO O PAGE DROPDOWN
	//=======================================================
	$inputName = 'my-page';
	$settingID = $sectionID . '[' . $inputName . ']';
	$wp_customize->add_setting($settingID,array(
			'default' 		=> '0',
			'capability' 	=> 'edit_theme_options',
			'type'			=> 'theme_mod',
			'transport'		=> 'postMessage',
	));
	
	$controlID = 'zendvn-theme-' . $inputName;
	$wp_customize->add_control($controlID,array(
			'label' 		=> __('Pages'),
			'section' 		=> $sectionID,
			'settings' 		=> $settingID,
			'type'			=>'dropdown-pages',
	));

	//=======================================================
	// TAO O TEXTAREA
	//=======================================================
	$inputName = 'my-textarea';
	$settingID = $sectionID . '[' . $inputName . ']';
	$wp_customize->add_setting($settingID,array(
			'default' 		=> 'This is a test',
			'capability' 	=> 'edit_theme_options',
			'type'			=> 'theme_mod',
			'transport'		=> 'postMessage',
	));
	
	$controlID = 'zendvn-theme-' . $inputName;
	$wp_customize->add_control($controlID,array(
			'label' 		=> __('Content'),
			'section' 		=> $sectionID,
			'settings' 		=> $settingID,
			'type'			=>'textarea',			
	));

	//=======================================================
	// TAO O SELECTBOX
	//=======================================================
	$inputName = 'my-select';
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
			'type'			=>'select',
			'choices'		=> array(
						'male' => 'Name',
						'female' => 'Nu',
						'unknown' => 'Chua xac dinh'
					)
	));

	//=======================================================
	// TAO O COLOR PICKER
	//=======================================================
	$inputName = 'my-color';
	$settingID = $sectionID . '[' . $inputName . ']';
	$wp_customize->add_setting($settingID,array(
			'default' 		=> '#eaeaea',
			'capability' 	=>'edit_theme_options',
			'type'			=> 'theme_mod',
			'transport'		=> 'postMessage',
	));
	
	$controlID = 'zendvn-theme-' . $inputName;
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $controlID,array(
			'label' 		=> __('Color'),
			'section' 		=> $sectionID,
			'settings' 		=> $settingID,
	)));

	//=======================================================
	// TAO O IMAGE UPLOAD
	//=======================================================
	$inputName = 'my-image';
	$settingID = $sectionID . '[' . $inputName . ']';
	$wp_customize->add_setting($settingID,array(
			'default' 		=> 'http://wordpress.xyz/wp-content/uploads/2020/11/20141024095258-ebola-reuters.jpg',
			'capability' 	=>'edit_theme_options',
			'type'			=> 'theme_mod',
			'transport'		=> 'postMessage',
	));
	
	$controlID = 'zendvn-theme-' . $inputName;
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, $controlID,array(
			'label' 		=> __('Images'),
			'section' 		=> $sectionID,
			'settings' 		=> $settingID,
	)));

	//=======================================================
	// TAO O FILE UPLOAD
	//=======================================================
	$inputName = 'my-upload';
	$settingID = $sectionID . '[' . $inputName . ']';
	$wp_customize->add_setting($settingID,array(
			'capability' 	=>'edit_theme_options',
			'type'			=> 'theme_mod',
			'transport'		=> 'postMessage',
	));
	
	$controlID = 'zendvn-theme-' . $inputName;
	$wp_customize->add_control(new WP_Customize_Upload_Control($wp_customize, $controlID,array(
			'label' 		=> __('Upload File'),
			'section' 		=> $sectionID,
			'settings' 		=> $settingID,
	)));

	//=======================================================
	// TAO O CHECKBOX
	//=======================================================
	$inputName = 'my-checkbox';
	$settingID = $sectionID . '[' . $inputName . ']';
	$wp_customize->add_setting($settingID,array(
			'capability' 	=>'edit_theme_options',
			'type'			=> 'theme_mod',
			'transport'		=> 'postMessage',
	));
	
	$controlID = 'zendvn-theme-' . $inputName;
	$wp_customize->add_control($controlID,array(
			'label' 		=> __('Hien thi phan mo ta'),
			'section' 		=> $sectionID,
			'settings' 		=> $settingID,
			'type'			=>'checkbox',			
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