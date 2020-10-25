<?php
require_once ZENDVN_MP_PLUGIN_DIR . '/includes/support.php';
class ZendvnMpAdmin {

	private $_menuSlug = 'zendvn-mp-my-setting';

	private $_setting_options;

	public function __construct(){
		// echo '<br>' . __METHOD__;

		$this->_setting_options = get_option('zendvn_mp_name',array());
		add_action('admin_menu', array($this,'settingMenu'));

		add_action('admin_init', array($this,'register_setting_and_fields'));
	}

	public function register_setting_and_fields(){
		register_setting('zendvn_mp_options', 'zendvn_mp_name', array($this,'validate_setting'));
	
		//MAIN SETTING
		$mainSection = 'zendvn_mp_main_section';
		add_settings_section($mainSection, "Main setting", 
							array($this,'main_section_view'), $this->_menuSlug);
		add_settings_field('zendvn_mp_new_title', 'Site title', array($this,'create_form'), 
							$this->_menuSlug,$mainSection,array('name'=>'new_title_input'));	

	}

	//===============================================
	//Kiem tra cac dieu kien truoc khi luu du lieu vao database
	//===============================================
	public function validate_setting($data_input) {
		return $data_input;
	}

	public function main_section_view(){

	}

	public function create_form($args){
		$htmlObj = new ZendvnHtml();
		if($args['name']== 'new_title_input'){
			$attr = array(
				'id'=> 'zendvn_mp_new_title',
				'class' => 'abc'
			);
			$options['current_value'] = 'yes';
			echo $htmlObj->checkbox('zendvn_mp_name[zendvn_mp_new_title]', 'yes', $attr, $options) . ' Toi dong y'; 
			/*
			$attr = array(
				'id'=> 'zendvn_mp_new_title',
				'class' => 'abc'
			);
			$options['data'] = array(
				'php' => 'Khoa hoc PHP',
				'jquery' => 'Khoa hoc jQuery',
				'zf2' => 'Khoa hoc ZF2'
			);
			$options['separator'] = '<br/>';
			echo $htmlObj->radio('zendvn_mp_name[zendvn_mp_new_title]', 'zf2', $attr, $options); 
			*/
			/*
			$attr = array(
				'id'=> 'zendvn_mp_new_title',
				'class' => 'abc',
				'multiple' => 'multiple'
			);
			$options['data'] = array(
				'php' => 'Khoa hoc PHP',
				'jquery' => 'Khoa hoc jQuery',
				'zf2' => 'Khoa hoc ZF2'
			);
			echo $htmlObj->selectbox('zendvn_mp_name[zendvn_mp_new_title]', array('php','jquery'), $attr, $options); 
			*/
			/*
			$attr = array(
				'id'=> 'zendvn_mp_new_title',
				'class' => 'abc'
			);
			$options['data'] = array(
				'php' => 'Khoa hoc PHP',
				'jquery' => 'Khoa hoc jQuery',
				'zf2' => 'Khoa hoc ZF2'
			);
			echo $htmlObj->selectbox('zendvn_mp_name[zendvn_mp_new_title]', 'jquery', $attr, $options); 
			*/
			/*
			$attr = array(
				'id'=> 'zendvn_mp_new_title',
				'rows' => 6,
				'cols' => 60
			);
			echo $htmlObj->textarea('zendvn_mp_name[zendvn_mp_new_title]', 'This is a content', $attr); 
			*/
			/*
			$attr = array(
				'id'=> 'submit_form',
				'class' =>'button button-primary',
				'onclick' => "alert('Hello World')"
			);
			$options = array('type' => 'button');
			echo $htmlObj->button('submit_form', 'Hello',$attr, $options); 
			*/
			/*
			$attr = array(
				'id'=> 'zendvn_mp_new_title',
				'class' =>'abc',
				'style' => 'width: 300px',
			);
			echo $htmlObj->hidden('zendvn_mp_name[zendvn_mp_new_title]', '123456',$attr); 
			*/
			/*
			$attr = array(
				'id'=> 'zendvn_mp_new_title',
				'class' =>'abc',
				'style' => 'width: 300px',
			);
			echo $htmlObj->password('zendvn_mp_name[zendvn_mp_new_title]', '123456',$attr); 
			*/
			/*
			$attr = array(
				'id'=> 'zendvn_mp_new_title',
				'class' =>'abc'
			);
			echo $htmlObj->fileupload('zendvn_mp_name[zendvn_mp_new_title]', '',$attr); 
			*/
			/*
			$attr = array(
				'id'=> 'zendvn_mp_new_title',
				'class' =>'abc',
				'style' => 'width: 300px',
				'onClick' => "alert('Hello');"
			);
			echo $htmlObj->textbox('zendvn_mp_name[zendvn_mp_new_title]', 'This is a test',$attr); 
			*/
		}	
	
	}

	public function settingMenu(){
		
		add_menu_page(	
						'My Setting title', 
						'My Setting', 
						'manage_options', 
						$this->_menuSlug, 
						array($this,'settingPage')
					);
	}

	public function settingPage(){
		require_once ZENDVN_MP_VIEWS_DIR . '/setting-page.php';
	}

}