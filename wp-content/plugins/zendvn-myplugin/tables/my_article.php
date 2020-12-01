<?php

require_once ZENDVN_MP_TABLES_DIR . '/caps.php';

class Zendvn_Mp_Table_MyArticle{

	private $_menuSlug = 'zendvn-mp-table-my-article';
	
	private $_caps;
	
	public function __construct(){
        add_action('admin_menu', array($this,'article_menu'));
    
		$page = @$_REQUEST['page'];
		if($page == $this->_menuSlug){
			add_action('admin_enqueue_scripts', array($this,'add_css_file'));
		}
		add_action('init',array($this,'do_output_buffer'));
		$this->_caps = new Zendvn_Mp_Article_Caps();
		add_action('admin_init', array($this->_caps,'add_caps_for_role'));
    }
    
	public function article_menu(){

        $func = $this->getFunc();
		
		add_menu_page('Articles', 'Articles', 'zendvn_mp_articles', 
					  $this->_menuSlug,array($this, $func),'',3);
		$addFunc = 	'display_add';
		if(!$this->_caps->check_cap('zendvn_mp_article_add')){
			$addFunc = 'no_access';
		}
        add_submenu_page($this->_menuSlug, 'Add New', 'Add New', 'zendvn_mp_articles', 
                      $this->_menuSlug . '-add',array($this, $addFunc));	       
    }	

	private function getFunc(){
		$caps = $this->_caps;
		$action = @$_REQUEST['action'];
		$func = 'display';

		/*===========================================
		 * XU LY PHAN QUYEN TRONG TRUONG HOP EDIT
		 *===========================================*/
		if($action == 'edit'){
			$func = 'display_edit';
			if(!$caps->check_cap('zendvn_mp_article_edit')){
				$func = 'no_access';
			}
			if($caps->check_cap('zendvn_mp_article_own_edit')){
				if($this->check_author()){
					$func = 'display_edit';
				}else{
					$func = 'no_access';
				}
			}
		}

		/*===========================================
		 * XU LY PHAN QUYEN TRONG TRUONG HOP DELETE
		*===========================================*/
		if($action == 'delete'){
			$func = 'delete_data';
			if(!$caps->check_cap('zendvn_mp_article_delete')){
				$func = 'no_access';
			}
			if($caps->check_cap('zendvn_mp_article_own_delete')){
				if($this->check_author()){
					$func = 'delete_data';
				}else{
					$func = 'no_access';
				}
			}
		}

		/*===========================================
		 * XU LY PHAN QUYEN TRONG TRUONG HOP STATUS
		*===========================================*/
		if($action == 'inactive' || $action == 'active'){
			$func = 'status';
			if(!$caps->check_cap('zendvn_mp_article_status')){
				$func = 'no_access';
			}
			if($caps->check_cap('zendvn_mp_article_own_status')){
				if($this->check_author()){
					$func = 'status';
				}else{
					$func = 'no_access';
				}
			}
		}

		return $func;
	}

	private function check_author(){
		global $wpdb;
		$author = false;
		$tblArticle = $wpdb->prefix . 'zendvn_mp_article';
		$articleID 	= @$_REQUEST['article'];
		$sql = 'SELECT Count(a.id) '
				. ' FROM ' . $tblArticle . ' AS a'
				. ' WHERE a.author_id = %d '
				. ' AND a.id = %d ';
		$item =  $wpdb->get_var($wpdb->prepare($sql, get_current_user_id(),$articleID));
		if($item == 1){
			$author = true;
		}
		
		return $author;
	}

	public function no_access(){
		echo '<h3>Ban khong co quyen truy cap vao vung nay</h3>';	
	}
    
	public function display(){

		if(isset($_POST['_wpnonce'])){
			$url = $this->createUrl();
			wp_redirect($url);
		}
        require_once ZENDVN_MP_TABLES_DIR . '/tbl_article.php';
        require_once ZENDVN_MP_TABLES_DIR . '/html/article_list.php';
	}

	private function createUrl(){		
		$paged = max(1,@$_REQUEST['paged']);
		$url = 'admin.php?page=' . $_REQUEST['page'];
		
		if(isset($_POST['filter_status']) && $_POST['filter_status'] !== '0'){
			$url .= '&filter_status=' . $_POST['filter_status'];
		}

		if(isset($_POST['s']) && strlen($_POST['s']) > 2){
			$url .= '&s=' . $_POST['s'];
		}

		$url .= '&paged='. $paged;
		
		return $url;
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

	public function status() {
		global $wpdb;
		$table = $wpdb->prefix . 'zendvn_mp_article';
		$article_id = @$_REQUEST['article'];
		
		$status = ($_REQUEST['action'] == 'inactive')?0:1;
		
		if(!is_array($_REQUEST['article'])){
			$data 			= array('status' => $status);
			$format 		= array('%d');
			$where 			= array('id'=> $article_id);
			$where_format 	= array('%d');
			$wpdb->update($table, $data, $where,$format,$where_format);		
		}else{
			$ids = join(',', $_REQUEST['article']);
			$sql = 'UPDATE '. $table . ' SET status=' . $status . ' WHERE id IN (' . $ids . ')';
			$wpdb->query($sql);
		}
		
		$paged = max(1,@$_REQUEST['paged']);	
		$url = 'admin.php?page=' . $_REQUEST['page'] . '&paged='. $paged .'&msg=status';
		wp_redirect($url);
	}

	public function delete_data(){
		global $wpdb;
		$table = $wpdb->prefix . 'zendvn_mp_article';
		$article_id = @$_REQUEST['article'];
		$security_code = @$_REQUEST['my-nonce'];
		if(wp_verify_nonce( $security_code, 'my-nonce' )) {
			if(!is_array($_REQUEST['article'])){
				$where 			= array('id' => $article_id);
				$where_format 	= array('%d');
				$wpdb->delete($table, $where,$where_format);
			}else{
				$ids = join(',', $_REQUEST['article']);
				$sql = 'DELETE FROM ' . $table . ' WHERE id IN ('. $ids . ')';
				$wpdb->query($sql);
			}
			
			$url = 'admin.php?page=' . $_REQUEST['page'] . '&msg=delete';
			wp_redirect($url);
		}
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

	/* 
	private function getFunc(){
		$action = @$_REQUEST['action'];
	
		switch ($action){
			case 'edit'			: return 'display_edit';
				
			case 'delete'		: return 'delete_data';
				
			case 'inactive'		: return 'status';
				
			case 'active'		: return 'status';
				
			default				: return 'display';
		} 
	}*/
}
