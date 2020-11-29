<?php
class Zendvn_Mp_Table_MyArticle{

    private $_menuSlug = 'zendvn-mp-table-my-article';
	
	public function __construct(){
        add_action('admin_menu', array($this,'article_menu'));
    }
    
	public function article_menu(){
		
		add_menu_page('Articles', 'Articles', 'manage_options', 
                      $this->_menuSlug,array($this, 'display'),'',3);
        add_submenu_page($this->_menuSlug, 'Add New', 'Add New', 'manage_options', 
                      $this->_menuSlug . '-add',array($this,'display_add'));	       
    }	
    
	public function display(){
        require_once ZENDVN_MP_TABLES_DIR . '/tbl_article.php';
        require_once ZENDVN_MP_TABLES_DIR . '/html/article_list.php';
    }
    
    public function display_add() {
        echo '<br/>' . __METHOD__;
    }
}
