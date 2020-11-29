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
					'id' 		=> 'ID',
					'title' 	=> 'Title',
					'picture' 	=> 'Picture',
					'content' 	=> 'Content',
					'author_id' => 'Author ID',
					'status' 	=> 'Status'	
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
}
