<?php
/*
<!--[if lt IE 9]>
<script src="js/html5.js" type="text/javascript"></script>
<![endif]-->
<meta name='robots' content='noindex,follow' />
<link rel='stylesheet' href='http://wordpress.xyz/wp-content/themes/zendvn/css/symple_shortcodes_styles.css' type='text/css' media='all' />
<link rel='stylesheet' href='http://wordpress.xyz/wp-content/themes/zendvn/css/style.css' type='text/css' media='all' />
<link rel='stylesheet' href='http://wordpress.xyz/wp-content/themes/zendvn/css/responsive.css' type='text/css' media='all' />
<link rel='stylesheet' href='http://wordpress.xyz/wp-content/themes/zendvn/css/site.css' type='text/css' media='all' />
<script type='text/javascript' src='http://wordpress.xyz/wp-content/themes/zendvn/js/jquery/jquery.js'></script>
<script type='text/javascript' src='http://wordpress.xyz/wp-content/themes/zendvn/js/jquery/jquery-migrate.min.js'></script>
<!--[if IE 8]>
<link rel="stylesheet" type="text/css" href="css/ie8.css" media="screen">
<![endif]-->
*/

/*============================================================================
 * 1. NẠP NHỮNG TẬP TIN CSS VÀO THEME
 ============================================================================*/
 add_action('wp_enqueue_scripts', 'zendvn_theme_register_style');

 function zendvn_theme_register_style(){
     $cssUrl = get_template_directory_uri() . '/css';
     echo $cssUrl;
 }