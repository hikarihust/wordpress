<?php
class Zendvn_Mp_Mb_Data2{
	private $_meta_box_id = 'zend-mp-mb-data2';

	private $_prefix_key  = '_zend_mp_mb_data2_';

	private $_prefix_id = 'zend-mp-mb-data2-';

	public function __construct(){
		add_action('add_meta_boxes', array($this,'create'));
		
		add_action('save_post', array($this,'save'));
	}
	
	public function create(){
		add_action('admin_enqueue_scripts', array($this,'add_css_file'));
		// echo '<br/>' . __METHOD__;
		add_meta_box($this->_meta_box_id, 'My Data', array($this,'display'),'post');
	}

	private function create_key($val){
		return $this->_prefix_key . $val;
	}

	private function create_id($val){
		return $this->_prefix_id . $val;
	}
	
	public function display($post){
		echo '<div class="zendvn-mb-wrap">';
		echo '<p><b><i>' . translate('Xin vui lòng nhập đầy đủ thông tin vào các ô sau') . ':</i></b></p>';

		$htmlObj = new ZendvnHtml();
		//Tao phan tu chua Price
		$inputID 	= $this->create_id('price');
		$inputName 	= $this->create_id('price');
		$inputValue = get_post_meta($post->ID,$this->create_key('price'),true);
		$arr = array('size' =>'25','id' => $inputID);
		$html 		= $htmlObj->label(translate('Price')) 
						. $htmlObj->textbox($inputName,$inputValue,$arr);
		echo $htmlObj->pTag($html);

		//Tao phan tu chua Author
		$inputID 	= $this->create_id('author');
		$inputName 	= $this->create_id('author');
		$inputValue = get_post_meta($post->ID,$this->create_key('author'),true);
		$arr = array('size' =>'25','id' => $inputID);
		$html 		= $htmlObj->label(translate('Author')) 
						. $htmlObj->textbox($inputName,$inputValue,$arr);
		echo $htmlObj->pTag($html);

		//Tao phan tu chua Level
		$inputID 	= $this->create_id('level');
		$inputName 	= $this->create_id('level');
		$inputValue = get_post_meta($post->ID,$this->create_key('level'),true);;
		$arr = array('id' => $inputID);
		$options['data'] = array(
					'beginner' => translate('Beginner'),
					'intermediate' => translate('Intermediate'),
					'advanced' => translate('Advanced'),
				);
		$html 		= $htmlObj->label(translate('Level')) 
						.$htmlObj->selectbox($inputName,$inputValue,$arr,$options);
		echo $htmlObj->pTag($html);

		//Tao phan tu chua Author profile
		$inputID 	= $this->create_id('profile');
		$inputName 	= $this->create_id('profile');
		$inputValue = get_post_meta($post->ID,$this->create_key('profile'),true);;
		$arr 		= array('id' => $inputID,'rows'=>6, 'cols'=>60);
		$html		= $htmlObj->label(translate('Author profile')) 
						. $htmlObj->textarea($inputName,$inputValue,$arr);
		echo $htmlObj->pTag($html);
		echo '</div>';
	}

	public function save($post_id){
		/*
		echo '<pre>';
		print_r($post_id);
		echo '</pre>';
		echo '<pre>';
		print_r($_POST);
		echo '</pre>';
		*/
		$postVal = $_POST;
		update_post_meta($post_id, $this->create_key('price'), 
						sanitize_text_field($postVal[$this->create_id('price')]));
		update_post_meta($post_id, $this->create_key('author'), 
						sanitize_text_field($postVal[$this->create_id('author')]));
		update_post_meta($post_id, $this->create_key('level'), 
						sanitize_text_field($postVal[$this->create_id('level')]));
		update_post_meta($post_id, $this->create_key('profile'), 
						strip_tags($postVal[$this->create_id('profile')]));
		// die();
	}

	public function add_css_file(){
		wp_register_style('zendvn_mp_mb_data', ZENDVN_MP_CSS_URL . '/mb-data.css', array(),'1.0');
		wp_enqueue_style('zendvn_mp_mb_data');
	}
}