<?php
class Zendvn_Mp_Mb_Taxonomy{
	private $_prefix_name  = 'zendvn-mp-taxonomy-category';
	
	private $_prefix_id 	= 'zendvn-mp-taxonomy-category-';
    
	public function __construct(){
		if(is_admin()){
			add_action('category_add_form_fields', array($this,'add_form'));
            add_action('category_edit_form_fields', array($this,'edit_form'));
            
			if(isset($_GET['taxonomy']) && $_GET['taxonomy']=='category'){
				//echo __METHOD__;
				add_action('admin_enqueue_scripts', array($this,'add_js_file'));	
				add_action('admin_enqueue_scripts',array($this,'add_css_file'));	
			}	
		}else{
		
		}	
    }
    
	public function add_form(){
        // echo '<br/>' . __METHOD__;
        $htmlObj = new ZendvnHtml();

		//Tao phan tu chua Button
		$inputID 	= $this->create_id('button');
		$inputName 	= $this->create_id('button');
		$inputValue = translate('Media Library Image');
		$arr 		= array('class' =>'button-secondary','id' => $inputID);
		$options	= array('type'=>'button');		
		$btnMedia	= $htmlObj->button($inputName,$inputValue,$arr,$options);

		//Tao phan tu chua file
		$inputID 	= $this->create_id('picture');
		$inputName 	= $this->create_name('picture');
		$inputValue = '';
		$arr 		= array('size' =>'40','id' => $inputID);
		$html 		= 	'<div class="form-field">'
						. $htmlObj->label(translate('Picture'),array('for'=>"tag-name"))
						. $htmlObj->textbox($inputName,$inputValue,$arr) 
						. ' ' . $btnMedia
                        . $htmlObj->pTag('Mo ta cho phan hinh anh')
                        . '</div>';
        echo $html;
        echo $htmlObj->btn_media_script($this->create_id('button'),$this->create_id('picture'));
        
        //Tao phan tu chua Summary
		$inputID 	= $this->create_id('summary');
		$inputName 	= $this->create_name('summary');
		$inputValue = '';
		$arr 		= array('id' => $inputID,'rows'=>6, 'cols'=>60);
		$html		= '<div class="form-field">'
						. $htmlObj->label(translate('Summary'),array('for'=>"tag-name"))
						. $htmlObj->textarea($inputName,$inputValue,$arr)
						. $htmlObj->pTag('Mo ta cho Summary')
						. '</div>';
		echo $html;
    }
    
	public function edit_form(){
		echo '<br/>' . __METHOD__;
    }

	public function add_js_file(){


		wp_register_script("zendvn_mp_mb_btn_media", ZENDVN_MP_JS_URL . '/zendvn-media-button-taxonomy.js',
							array('jquery','media-upload','thickbox'),'1.0');
		wp_enqueue_script("zendvn_mp_mb_btn_media");
	}
    
	public function add_css_file(){
		wp_enqueue_style('thickbox');
	}
    
	private function create_name($val){
		return $this->_prefix_name . '[' . $val . ']';
	}
	
	private function create_id($val){
		return $this->_prefix_id . $val;
	}
}