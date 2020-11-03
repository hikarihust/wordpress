<?php
    add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
    function theme_enqueue_styles() {
        wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
        wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style'));
    }

    if ( ! function_exists( '_zend_mp_mb_data2_fnc' ) ) :
        /**
         * Print HTML with meta information for the current post-date/time and author.
         *
         * @since Twenty Ten 1.0
         */
        function _zend_mp_mb_data2_fnc() {
            $zendvn_price = get_post_meta( get_the_ID(),'_zend_mp_mb_data2_price', true );
            if(!empty($zendvn_price)) $zendvn_price = "<li>Price: {$zendvn_price}</li>";
             
            $zendvn_author = get_post_meta( get_the_ID(),'_zend_mp_mb_data2_author', true );
            if(!empty($zendvn_author)) $zendvn_author = "<li>Author: {$zendvn_author}</li>";
            
            $zendvn_level = get_post_meta( get_the_ID(),'_zend_mp_mb_data2_level', true );
            if(!empty($zendvn_level)) $zendvn_level = "<li>Level: {$zendvn_level}</li>";
            
            $zendvn_profile = get_post_meta( get_the_ID(),'_zend_mp_mb_data2_profile', true );
            if(!empty($zendvn_profile)) $zendvn_profile = "<li>Author profile: {$zendvn_profile}</li>";
            
            if(!empty($zendvn_price) || !empty($zendvn_author) || !empty($zendvn_level) || !empty($zendvn_profile)) {
                $themeURL = dirname( get_bloginfo('stylesheet_url')) ;
                return "<link rel='stylesheet' type='text/css' media='all' href='" . $themeURL . "/css/metabox.css'>"
                        . "<div class='zendvn-meta-box'>
                            <ul>"
                                . $zendvn_price . ' ' . $zendvn_author . ' ' . $zendvn_level . ' ' . $zendvn_profile
                            . "</ul>
                        </div>"
                        ;
            }
        }
    endif;

?>