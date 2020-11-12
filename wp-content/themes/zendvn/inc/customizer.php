<?php
add_action('customize_register', 'zendvn_theme_customize_register');

function zendvn_theme_customize_register($wp_customize) {
	$wp_customize->add_section('zendvn_theme_general',array(
        'title' => __('General'),
        'description' => 'Hien thi cac phan tu trong Section',
        'priority' => 20
    ));
}