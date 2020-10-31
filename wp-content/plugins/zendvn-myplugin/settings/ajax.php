<?php

class Zendvn_Mp_Setting_Ajax{
        
	private $_menu_slug = 'zendvn-mp-st-ajax';
	
	private $_option_name = 'zendvn_mp_st_ajax';
	
	private $_setting_options;

	public function __construct(){
		// echo "<br/>" . __METHOD__;
            
		$this->_setting_options = get_option($this->_option_name,array());
		add_action('admin_menu', array($this,'settingMenu'));

		add_action('admin_init', array($this,'register_setting_and_fields'));
    }

	public function register_setting_and_fields(){
		register_setting($this->_menu_slug,$this->_option_name, array($this,'validate_setting'));
	
		//MAIN SETTING
		$mainSection = 'zendvn_mp_main_section';
		add_settings_section($mainSection, "Main setting", 
							array($this,'main_section_view'), $this->_menu_slug);
		add_settings_field($this->create_id('title'), 'Site title', array($this,'create_form'), 
							$this->_menu_slug,$mainSection,array('name'=>'title'));	
    }

	public function create_form($args){
		$htmlObj = new ZendvnHtml();
		if($args['name']== 'title'){
			//Tao phan tu chua Price
			$inputID 	= $this->create_id('title');
			$inputName 	= $this->create_name('title');
			$inputValue = @$this->_setting_options['title'];
			$arr 		= array('size' =>'25','id' => $inputID);
			$html 		= $htmlObj->textbox($inputName,$inputValue,$arr)
			            . $htmlObj->pTag('Nhập vào một chuỗi không quá 20 ký tự',array('class'=>'description'));
			echo $html;
		}	
	}

	//===============================================
	//Kiem tra cac dieu kien truoc khi luu du lieu vao database
	//===============================================
	public function validate_setting($data_input) {
		//Mang chua cac thong bao loi cua form
		$errors = array();
		if($this->stringMaxValidate($data_input['title'], 20) === false){
			$errors['title'] = "Site title: Chuoi dai qua so ky tu da qui dinh";
		}

		if(count($errors)>0){
			$data_input = $this->_setting_options;
			$strErrors = '';
			foreach ($errors as $val){
				$strErrors .= $val . '<br/>';
			}
			
			add_settings_error($this->_menu_slug, 'my-setting', $strErrors,'error');
		}else{
            add_settings_error($this->_menu_slug, 'my-setting', 'Cap nhat du lieu thanh cong','success');
		}
		return $data_input;
    }
    
	//===============================================
	//Kiem tra chieu chieu dai cua chuoi
	//===============================================
	private function stringMaxValidate($val, $max){
		$flag = false;
		
		$str = trim($val);
		if(strlen($str) <= $max){    
			$flag = true;
		}
		
		return $flag;
	}

	//===============================================
	//Kiem tra phần mở rộng của file
	//===============================================
	private function fileExtionsValidate($file_name, $file_type){
		$flag = false;
		
		$pattern = '/^.*\.('. strtolower($file_type) . ')$/i'; //$file_type = JPG|PNG|GIF
		if(preg_match($pattern, strtolower($file_name)) == 1){
			$flag = true;
		}
		
		return $flag;
	}

	private function create_id($val){
		return $this->_option_name . '_' . $val;
    }
    
	private function create_name($val){
		return $this->_option_name . '[' . $val . ']';
	}
    
	public function main_section_view(){
		
	}
    
	public function settingMenu(){
		
		add_menu_page(	
						'My Setting title', 
						'My Setting', 
						'manage_options', 
						$this->_menu_slug, 
						array($this,'display')
					);
    }
    
	public function display(){
		require_once ZENDVN_MP_VIEWS_DIR . '/setting-page.php';
	}
	
}