<?php
if(!class_exists('WP_List_Table')){
	require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
}

class Article_Table extends WP_List_Table{
    
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
	}

	private function table_data() {
		$data = array();
		$data[] = array(
			'id' 		=> 1,
			'title' 	=> 'Hàn Quốc vô địch, Thái Lan trắng tay tại ASIAD 17',
			'picture' 	=> 'picture001.png',
			'content' 	=> 'content - Hàn Quốc vô địch, Thái Lan trắng tay tại ASIAD 17',
			'author_id' => 1,
			'status' 	=> 0	
		);

		$data[] = array(
			'id' 		=> 2,
			'title' 	=> 'Messi Hàn Quốc dẫn đầu bộ tứ siêu đẳng đối đầu U19 Việt Nam',
			'picture' 	=> 'picture002.png',
			'content' 	=> 'content - Messi Hàn Quốc dẫn đầu bộ tứ siêu đẳng đối đầu U19 Việt Nam',
			'author_id' => 1,
			'status' 	=> 1	
		);

		return $data;
	}

	public function get_columns(){
		$arr = 	array(
					'cb'		=> '<input type="checkbox" />',
					'title' 	=> 'Title',
					'picture' 	=> 'Picture',
					'content' 	=> 'Content',
					'author_id' => 'Author ID',
					'status' 	=> 'Status',
					'id' 		=> 'ID'
				);
		return $arr;
	}

	public function get_hidden_columns(){

		return array('content','author_id');
	}

	public function get_sortable_columns(){

		return array();
	}

	public function column_default($item, $column_name){
		
		return $item[$column_name];
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
