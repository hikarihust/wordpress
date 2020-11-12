<?php
add_action('customize_register', 'zendvn_theme_customize_register');

function zendvn_theme_customize_register($wp_customize) {
	$wp_customize->add_section('zendvn_theme_general',array(
        'title' => __('General'),
        'description' => 'Hien thi cac phan tu trong Section',
        'priority' => 20
    ));

	$wp_customize->add_setting('zendvn_theme_general[site_name]',array(
        'default' 		=> 'ZendVN theme',
        'capability' 	=>'edit_theme_options',
        'type'			=> 'theme_mod',
        'transport'		=> 'refresh',
        'sanitize_callback' => 'sanitize_zendvn_theme_site_name'
    ));

	$wp_customize->add_control('zendvn_theme_site_name',array(
        'label' 		=> __('Site name'),
        'section' 		=> 'zendvn_theme_general',
        'settings' 		=> 'zendvn_theme_general[site_name]',
        'type'			=>'text'
    ));
}

function sanitize_zendvn_theme_site_name($value){
	$value = trim($value);
	if(empty($value)) $value = 'Spartan';
	return $value;
}