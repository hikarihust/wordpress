<?php
define('ZENDVN_THEME_URL', get_template_directory_uri());

define('ZENDVN_THEME_DIR', get_template_directory());

define('ZENDVN_THEME_INC_DIR', ZENDVN_THEME_DIR . '/inc');
define('ZENDVN_THEME_WIDGET_DIR', ZENDVN_THEME_INC_DIR . '/widgets');

if(!class_exists('ZendvnHtml') && is_admin()){
	//echo '<br>' . __FILE__;
	require_once ZENDVN_THEME_INC_DIR . '/html.php';
}

require_once ZENDVN_THEME_WIDGET_DIR . '/main.php';
new Zendvn_Theme_Widget_Main();

/*============================================================================
 * 6. MENU - CHINH SUA GIA TRI TRONG THE <a>
============================================================================*/
add_filter('walker_nav_menu_start_el', 'zendvn_theme_nav_description',10,4);
function zendvn_theme_nav_description($item_output,$item,$depth, $args){
	
	if($args->theme_location == 'top-menu'){
			
	}
	
	return $item_output;
}

/*============================================================================
 * 5. THEM VUNG MENU VAO TRONG THEME
============================================================================*/
add_action('init', 'zendvn_theme_register_menus');
function zendvn_theme_register_menus(){
	register_nav_menus(
		array(
			'top-menu' 		=> __('Top menu'),
			'center-menu' 	=> __('Center menu'),
			'footer-menu' 	=> __('Footer menu')
		)
	);
}

/*============================================================================
 * 4. KHAI BÁO HỆ THỐNG WIDGET CỦA THEME
============================================================================*/
add_action('after_setup_theme', 'zendvn_theme_support');

function zendvn_theme_support(){
	//array( 'aside', 'gallery','link','image','quote','status','video','audio','chat' );
	add_theme_support( 'post-formats', array('aside','image','gallery','video','audio') );
	add_theme_support('post-thumbnails');
}

/*============================================================================
 * 3. KHAI BÁO HỆ THỐNG WIDGET CỦA THEME
============================================================================*/
add_action('widgets_init', 'zendvn_theme_widgets_init');

function zendvn_theme_widgets_init() {
	register_sidebar(array(
		'name'          => __( 'Primary widget area', 'zendvn' ),
		'id'            => 'primary-widget-area',
		'description'   => __( 'Thêm Widget vào phía bên tay phải của Website', 'zendvn' ),
	    'class'         => '',
		'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s clr">',
		'after_widget'  => '</div>',
		'before_title'  => '<span class="widget-title">',
		'after_title'   => '</span>'
	));

	register_sidebar(array(
		'name'          => __( 'Top content area', 'zendvn' ),
		'id'            => 'top-content-widget-area',
		'description'   => __( 'Hien thi noi dung trong vung Top Content', 'zendvn' ),
		'class'         => '',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => ''
	));

	register_sidebar(array(
		'name'          => __( 'Bottom content area', 'zendvn' ),
		'id'            => 'bottom-content-widget-area',
		'description'   => __( 'Hien thi noi dung trong vung Bottom Content', 'zendvn' ),
		'class'         => '',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => ''
	));

	register_sidebar(array(
		'name'          => __( 'Before Footer area 1', 'zendvn' ),
		'id'            => 'before-footer-widget-area-1',
		'description'   => __( 'Hien thi noi dung trong vung Before Footer 1', 'zendvn' ),
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s clr">',
		'after_widget'  => '</div>',
		'before_title'  => '<span class="widget-title">',
		'after_title'   => '</span>'
	));

	register_sidebar(array(
		'name'          => __( 'Before Footer area 2', 'zendvn' ),
		'id'            => 'before-footer-widget-area-2',
		'description'   => __( 'Hien thi noi dung trong vung Before Footer 2', 'zendvn' ),
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s clr">',
		'after_widget'  => '</div>',
		'before_title'  => '<span class="widget-title">',
		'after_title'   => '</span>'
	));
	
	register_sidebar(array(
		'name'          => __( 'Before Footer area 3', 'zendvn' ),
		'id'            => 'before-footer-widget-area-3',
		'description'   => __( 'Hien thi noi dung trong vung Before Footer 3', 'zendvn' ),
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s clr">',
		'after_widget'  => '</div>',
		'before_title'  => '<span class="widget-title">',
		'after_title'   => '</span>'
	));
	
	register_sidebar(array(
		'name'          => __( 'Before Footer area 4', 'zendvn' ),
		'id'            => 'before-footer-widget-area-4',
		'description'   => __( 'Hien thi noi dung trong vung Before Footer 4', 'zendvn' ),
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s clr">',
		'after_widget'  => '</div>',
		'before_title'  => '<span class="widget-title">',
		'after_title'   => '</span>'
	));
}
/*============================================================================
 * 2. NẠP NHỮNG TẬP TIN JS VÀO THEME
============================================================================*/
add_action('wp_enqueue_scripts', 'zendvn_theme_register_js');

function zendvn_theme_register_js(){
    $jsUrl = get_template_directory_uri() . '/js';

	wp_register_script('zendvn_theme_jquery', $jsUrl . '/jquery/jquery.js',array('jquery'),'1.0');
    wp_enqueue_script('zendvn_theme_jquery');
    
	wp_register_script('zendvn_theme_jquery_migrate', $jsUrl . '/jquery/jquery-migrate.min.js',array('jquery'),'1.0');
	wp_enqueue_script('zendvn_theme_jquery_migrate');
    
	wp_register_script('zendvn_theme_jquery_form_min', $jsUrl . '/jquery.form.min.js',array('jquery'),'1.0',true);
	wp_enqueue_script('zendvn_theme_jquery_form_min');
	
	wp_register_script('zendvn_theme_scripts', $jsUrl . '/scripts.js',array('jquery'),'1.0',true);
	wp_enqueue_script('zendvn_theme_scripts');
	
	wp_register_script('zendvn_theme_plugins', $jsUrl . '/plugins.js',array('jquery'),'1.0',true);
	wp_enqueue_script('zendvn_theme_plugins');
	
	
	wp_register_script('zendvn_theme_global', $jsUrl . '/global.js',array('jquery'),'1.0',true);
	wp_enqueue_script('zendvn_theme_global');
}

add_action('wp_footer', 'zendvn_theme_script_code');

function zendvn_theme_script_code(){
	echo '<script type=\'text/javascript\'>
	
	var wpexLocalize = {
		"mobileMenuOpen" : "Browse Categories",
		"mobileMenuClosed" : "Close navigation",
		"homeSlideshow" : "false",
		"homeSlideshowSpeed" : "7000",
		"UsernamePlaceholder" : "Username",
		"PasswordPlaceholder" : "Password",
		"enableFitvids" : "true"
	};
	
	</script>';
}

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
    
	wp_register_style('zendvn_theme_customizer', $cssUrl . '/customizer.css',array(),'1.0');
	wp_enqueue_style('zendvn_theme_customizer');
 }