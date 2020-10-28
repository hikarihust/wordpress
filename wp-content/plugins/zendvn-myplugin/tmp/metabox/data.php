<?php
class Zendvn_Mp_Mb_Data{
	
	public function __construct(){
		add_action('add_meta_boxes', array($this,'create'));
		
	}
	
	public function create(){
		add_action('admin_enqueue_scripts', array($this,'add_css_file'));
		// echo '<br/>' . __METHOD__;
		add_meta_box('zend-mp-mb-data', 'My Data', array($this,'display'),'post');
	}
	
	public function display(){
		echo '<p>Welcome to my meta box!</p>';

		$htmlObj = new ZendvnHtml();
		//Tao phan tu chua Price
		$inputID 	= 'zend-mp-mb-data-price';
		$inputName 	= 'zend-mp-mb-data-price';
		$inputValue = '';
		$arr = array('size' =>'25','id' => $inputID);
		echo '<p><label for="' . $inputID . '">' . translate('Price') . ':</label>'
				. $htmlObj->textbox($inputName,$inputValue,$arr)
				. '</p>';

		//Tao phan tu chua Author
		$inputID 	= 'zend-mp-mb-data-author';
		$inputName 	= 'zend-mp-mb-data-author';
		$inputValue = '';
		$arr = array('size' =>'25','id' => $inputID);
		echo '<p><label for="' . $inputID . '">' . translate('Author') . ':</label>'
				. $htmlObj->textbox($inputName,$inputValue,$arr)
				. '</p>';

		//Tao phan tu chua Level
		$inputID 	= 'zend-mp-mb-data-level';
		$inputName 	= 'zend-mp-mb-data-level';
		$inputValue = '';
		$arr = array('id' => $inputID);
		$options['data'] = array(
					'beginner' => translate('Beginner'),
					'intermediate' => translate('Intermediate'),
					'advanced' => translate('Advanced'),
				);
		echo '<p><label for="' . $inputID . '">' . translate('Level') . ':</label>'
				. $htmlObj->selectbox($inputName,$inputValue,$arr,$options)
				. '</p>';

		//Tao phan tu chua Level
		$inputID 	= 'zend-mp-mb-data-profile';
		$inputName 	= 'zend-mp-mb-data-profile';
		$inputValue = '';
		$arr 		= array('id' => $inputID,'rows'=>6, 'cols'=>60);
		echo '<p><label for="' . $inputID . '">' . translate('Author profile') . ':</label>'
				. $htmlObj->textarea($inputName,$inputValue,$arr)
				. '</p>';
		echo '</div>';
	}

	public function add_css_file(){
		wp_register_style('zendvn_mp_mb_data', ZENDVN_MP_CSS_URL . '/mb-data.css', array(),'1.0');
		wp_enqueue_style('zendvn_mp_mb_data');
	}
}