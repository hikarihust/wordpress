<?php
class Zendvn_Mp_Rewrite{
	
	public function __construct($options = array()){
        add_action('init', array($this,'add_rules'));
        add_filter('query_vars', array($this,'insert_query_vars'));
    }
    
	public function add_rules(){
        //wp_rewrite - wp_query - wp 
		$regex		= '([^/]*)/page/?([^/]*)/?'; // /articles/page/2/
		$redirect = 'index.php?pagename=$matches[1]&paged=$matches[2]'; //slug
		add_rewrite_rule($regex, $redirect,'top');
		
		$regex		= '([^/]*)/?([^/]*)/?';
		$redirect = 'index.php?pagename=$matches[1]&article=$matches[2]'; //slug
        add_rewrite_rule($regex, $redirect,'top');
		
		flush_rewrite_rules(false);
    }
    
	public function insert_query_vars($vars){
		$vars[] = 'article';
		return $vars;
	}
}