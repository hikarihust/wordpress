<?php
/*
Plugin Name: ZendVN MyPlugin
Plugin URI: http://www.zend.vn
Description: Tim hieu ve qua trinh chuan xay dung Plugin.
Author: ZendVN group
Version: 1.0
Author URI: http://www.zend.vn
*/

$includeDir = plugin_dir_path(__FILE__) . '/includes';
require_once $includeDir . '/public.php';

$zendvnMp = new ZendvnMp();
add_action('wp_footer', array($zendvnMp, 'newFooter'));
add_action('wp_footer', array($zendvnMp, 'newFooter2'));
