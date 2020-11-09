<?php
/*
<!--[if lt IE 9]>
<script src="js/html5.js" type="text/javascript"></script>
<![endif]-->
<meta name='robots' content='noindex,follow' />
<script type='text/javascript' src='http://wordpress.xyz/wp-content/themes/zendvn/js/jquery/jquery.js'></script>
<script type='text/javascript' src='http://wordpress.xyz/wp-content/themes/zendvn/js/jquery/jquery-migrate.min.js'></script>

/*============================================================================
 * 1. NẠP NHỮNG TẬP TIN CSS VÀO THEME
 ============================================================================*/
 add_action('wp_enqueue_scripts', 'zendvn_theme_register_style');

 function zendvn_theme_register_style(){
    global $wp_styles;
     $cssUrl = get_template_directory_uri() . '/css';
    //  echo $cssUrl;
	wp_register_style('zendvn_theme_symple_shortcodes', $cssUrl . '/symple_shortcodes_styles.css',array(),'1.0');
	wp_enqueue_style('zendvn_theme_symple_shortcodes');
	
	wp_register_style('zendvn_theme_style', $cssUrl . '/style.css',array(),'1.0');
	wp_enqueue_style('zendvn_theme_style');
	
	wp_register_style('zendvn_theme_responsive', $cssUrl . '/responsive.css',array(),'1.0');
	wp_enqueue_style('zendvn_theme_responsive');
	
	wp_register_style('zendvn_theme_site', $cssUrl . '/site.css',array(),'1.0');
	wp_enqueue_style('zendvn_theme_site');
	
	wp_register_style('zendvn_theme_ie8', $cssUrl . '/ie8.css',array(),'1.0');
    $wp_styles->add_data('zendvn_theme_ie8', 'conditional', 'IE 8');
	wp_enqueue_style('zendvn_theme_ie8');
 }