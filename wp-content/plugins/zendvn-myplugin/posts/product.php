<?php
class Zendvn_Mp_Cp_Product{
	
	public function __construct(){
        // echo '<br/>' . __METHOD__;
		add_action('init', array($this,'create'));
    }
    
    public function create() {
		$labels = array(
            'name' 				=> __('Products'),
            'singular_name' 	=> __('Product'),
            'menu_name'			=> __('ZProduct'),
            'name_admin_bar' 	=> __('ZProduct'),
            'add_new'			=> __('Add Product'),
            'add_new_item'		=> __('Add New Product'),
            'search_items' 		=> __('Search Product'),
            'not_found'			=> __('No products found.'),
            'not_found_in_trash'=> __('No products found in Trash'),
            'view_item' 		=> __('View product'),
            // 'edit_item'			=> __('Edit product'),
        );
		$args = array(
            'labels'               => $labels,
            'description'          => 'Hiển thị nội dung mô tả về phần Custom Post',
            'public'               => true,
            'hierarchical'         => true,
    		'exclude_from_search'  => null, //public
    		'publicly_queryable'   => null, //public
    		'show_ui'              => null, //public
    		'show_in_menu'         => null, 
            'show_in_nav_menus'    => true, //public
            'show_in_admin_bar'    => true, //public
            'menu_position'        => 5,
            'menu_icon'            => ZENDVN_MP_IMAGES_URL . '/icon-setting16x16.png',
            'capability_type'      => 'post',
            // 'capabilities'         => array(),
            //'map_meta_cap'         => null,
            'supports'             => array('title' ,'editor','author','thumbnail','excerpt','trackbacks' ,'custom-fields' ,'comments','revisions' ,'page-attributes','post-formats'),
            //'register_meta_box_cb' => null,
            //'taxonomies'           => array(),
            'has_archive'          => true,
            'rewrite'              => array('slug'=>'zproduct'),
            //'query_var'            => true,
            //'can_export'           => true,
            //'delete_with_user'     => null,
            //'_builtin'             => false,
            '_edit_link'           => 'post.php?post=%d',
        );
        register_post_type('zproduct',$args);
    }

}