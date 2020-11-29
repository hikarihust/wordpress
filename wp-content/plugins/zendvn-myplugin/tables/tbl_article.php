<?php
if(!class_exists('WP_List_Table')){
	require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
}

class Article_Table extends WP_List_Table{

	private $_per_page = 5;
	
	private $_sql;
    
	public function __construct(){
		parent::__construct(array(
			'plural' => 'article',
			'singular' => 'article',
			'ajax' => false,
			'screen' => null,
		));
	}

	public function prepare_items(){
		
		$columns 	= $this->get_columns();		
		$hidden 	= $this->get_hidden_columns();
		$sortable 	= $this->get_sortable_columns();
		
		$this->_column_headers = array($columns,$hidden,$sortable);
		$this->items = $this->table_data();

		$total_items 	= $this->total_items();
		$per_page 		= $this->_per_page;
		$total_pages 	= ceil($total_items/$per_page);

		$this->set_pagination_args(array(
			'total_items' 	=> $total_items,
			'per_page' 		=> $per_page,
			'total_pages' 	=> $total_pages
		));
	}

	private function table_data() {
		$data = array();

		global $wpdb;
		$orderby 	= (@$_REQUEST['orderby'] == '')?'id':$_REQUEST['orderby'];
		$order		= (@$_REQUEST['order'] == '')?'DESC':$_REQUEST['order'];
		$tblArticle = $wpdb->prefix . 'zendvn_mp_article';
		$tblUser	= $wpdb->prefix . 'users';

		$sql = 'SELECT a.*, u.user_nicename
				FROM ' . $tblArticle . ' AS a
				INNER JOIN ' . $tblUser . ' AS u 
				ON a.author_id = u.ID 
				ORDER BY a.' . $orderby . ' ' .$order;

		$this->_sql  = $sql;

		$paged 		= max(1,@$_REQUEST['paged']);
		$offset 	= ($paged - 1) * $this->_per_page;
		$sql .= ' LIMIT ' . $this->_per_page . ' OFFSET ' . $offset;

		$data = $wpdb->get_results($sql,ARRAY_A);

		return $data;
	}

	private function total_items(){
		global $wpdb;
		return $wpdb->query($this->_sql);
	}

	public function get_columns(){
		$arr = 	array(
					'cb'		=> '<input type="checkbox" />',
					'title' 	=> 'Title',
					'picture' 	=> 'Picture',
					'content' 	=> 'Content',
					'author_id' => 'Author ID',
					'user_nicename' => 'Author',
					'status' 	=> 'Status',
					'id' 		=> 'ID'
				);
		return $arr;
	}

	public function get_hidden_columns(){

		return array('content','author_id');
	}

	public function get_sortable_columns(){
		return array(
			'title' => array('title',false),
			'id'	=> array('id', true)
		);
	}

	public function column_default($item, $column_name){
		
		return $item[$column_name];
	}

	public function column_user_nicename($item){
		return get_the_author_meta('display_name', $item['author_id']);
	}

	public function column_title($item){
		$page = $_REQUEST['page'];
		$actions = array(
					'edit' 		=> '<a href="?page=' . $page . '&action=edit&article=' . $item['id'] . '">Edit</a>',
					'delete' 	=> '<a href="?page=' . $page . '&action=delete&article=' . $item['id'] . '">Delete</a>',
					'view' 		=> '<a href="#">View</a>'
				);
		
		$html = '<strong><a href="?page=' . $page . '&action=edit&article=' . $item['id'] . '">' . $item['title'] .'</a></strong>' 
				. $this->row_actions($actions);
		return $html;
	}

	public function column_cb($item) {
		$singular = $this->_args['singular'];
		$html = '<input id="cb-select-' . $item['id'] . '" type="checkbox" name="' . $singular .'[]" value="' . $item['id'] .'" />';
		return $html;
	}
}
