<?php
class Zendvn_Mp_Table_MyArticle{

    private $_menuSlug = 'zendvn-mp-table-my-article';
	
	public function __construct(){
        add_action('admin_menu', array($this,'article_menu'));
    
		$page = @$_REQUEST['page'];
		if($page == $this->_menuSlug){
			add_action('admin_enqueue_scripts', array($this,'add_css_file'));
		}

    }
    
	public function article_menu(){

        $func = $this->getFunc();
		
		add_menu_page('Articles', 'Articles', 'manage_options', 
                      $this->_menuSlug,array($this, $func),'',3);
        add_submenu_page($this->_menuSlug, 'Add New', 'Add New', 'manage_options', 
                      $this->_menuSlug . '-add',array($this,'display_add'));	       
    }	

	private function getFunc(){
		$action = @$_REQUEST['action'];
		
		switch ($action){
			case 'edit'			: return 'display_edit';
			
			default				: return 'display';
		}
	}
    
	public function display(){
        require_once ZENDVN_MP_TABLES_DIR . '/tbl_article.php';
        require_once ZENDVN_MP_TABLES_DIR . '/html/article_list.php';
    }

	public function display_edit(){
		echo '<br/>' . __METHOD__;
	}
    
    public function display_add() {
		$security_code = @$_REQUEST['security_code'];
		
		if(wp_verify_nonce($security_code,'add')){
			if(isset($_POST['title'])){
				
				//Kiem tra du lieu
				$errors = $this->validate_form();

				if(count($errors)>0){
					require_once ZENDVN_MP_TABLES_DIR . '/html/article_form.php';
				}else{
				}
			}
			
		}
		require_once ZENDVN_MP_TABLES_DIR . '/html/article_form.php';
	}
	
	private function validate_form(){
		$errors = array();
		if(empty($_POST['title'])){
			$errors['title'] = "Title: Khong duoc de rong";
		}
		
		if(empty($_POST['picture'])){
			$errors['picture'] = "Picture: Khong duoc de rong";
				
		}
		return $errors;
	}

	public function add_css_file(){
		wp_register_style('zendvn_mp_tbl_article', ZENDVN_MP_CSS_URL . '/tbl_article.css',array(),'1.0');
		wp_enqueue_style('zendvn_mp_tbl_article');
	}
}
