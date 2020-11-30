<?php
class Zendvn_Mp_Table_MyArticle{

    private $_menuSlug = 'zendvn-mp-table-my-article';
	
	public function __construct(){
        add_action('admin_menu', array($this,'article_menu'));
    
		$page = @$_REQUEST['page'];
		if($page == $this->_menuSlug){
			add_action('admin_enqueue_scripts', array($this,'add_css_file'));
		}
		add_action('init',array($this,'do_output_buffer'));
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
		$errors = array();	
		if(!isset($_POST['title'])){
			global $wpdb;
			$article_id = (int)$_GET['article'];
			$table 	= $wpdb->prefix . 'zendvn_mp_article';
			$sql 	= 'SELECT * FROM ' . $table . ' WHERE id='. $article_id;
			$row 	= $wpdb->get_row($sql);
		}else{
			$security_code = @$_REQUEST['security_code'];
			if(wp_verify_nonce($security_code,'edit')){
				$errors = $this->validate_form();
				if(count($errors)== 0){					
					$this->save_data('edit');
					$url = $_REQUEST['_wp_http_referer'] . '&msg=1';
					wp_redirect($url);
				}
			}
		}
		require_once ZENDVN_MP_TABLES_DIR . '/html/article_form.php';
	}
    
    public function display_add() {
		$security_code = @$_REQUEST['security_code'];
		$errors = array();	
		
		if(wp_verify_nonce($security_code,'add')){
			if(isset($_POST['title'])){
				
				//Kiem tra du lieu
				$errors = $this->validate_form();

				if(count($errors)>0){
					require_once ZENDVN_MP_TABLES_DIR . '/html/article_form.php';
				}else{
					$this->save_data('add');
					$url = 'admin.php?page=' . $_REQUEST['page'] . '&msg=1';
					wp_redirect($url);
				}
			}	
		}
		require_once ZENDVN_MP_TABLES_DIR . '/html/article_form.php';
	}

	private function save_data($action = 'add'){
		global $wpdb;
		$table = $wpdb->prefix . 'zendvn_mp_article';
		$data = array(
				'title' 	=> $_POST['title'],
				'picture' 	=> $_POST['picture'],
				'content' 	=> $_POST['content'],
				'author_id' => get_current_user_id(),
				'status' 	=> $_POST['status'],
			);
		
		$format =  array('%s','%s','%s','%d','%d');
		if($action == 'add'){				
			$wpdb->insert($table, $data,$format);
		} else if($action == 'edit'){
			$where = array('id'=> @$_GET['article']);
			$where_format = array('%d');
			$wpdb->update($table, $data, $where,$format,$where_format);
		}
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

	public function do_output_buffer(){
		ob_start();
	}
}
