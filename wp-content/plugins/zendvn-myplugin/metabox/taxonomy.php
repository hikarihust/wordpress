<?php
class Zendvn_Mp_Mb_Taxonomy{
	private $_prefix_name  = 'zendvn-mp-taxonomy-category';
	
	private $_prefix_id 	= 'zendvn-mp-taxonomy-category-';
    
	public function __construct(){
		if(is_admin()){
			add_action('category_add_form_fields', array($this,'add_form'));
			add_action('category_edit_form_fields', array($this,'edit_form'));
		}else{
		
		}	
    }
    
	public function add_form(){
		echo '<br/>' . __METHOD__;
    }
    
	public function edit_form(){
		echo '<br/>' . __METHOD__;
	}
}