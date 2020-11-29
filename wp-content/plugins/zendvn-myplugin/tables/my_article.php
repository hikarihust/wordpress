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
		
		require_once ZENDVN_MP_TABLES_DIR . '/html/article_form.php';
    }

	public function add_css_file(){
		wp_register_style('zendvn_mp_tbl_article', ZENDVN_MP_CSS_URL . '/tbl_article.css',array(),'1.0');
		wp_enqueue_style('zendvn_mp_tbl_article');
	}
}
