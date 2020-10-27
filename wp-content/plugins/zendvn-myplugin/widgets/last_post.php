<?php
class Zendvn_Mp_Widget_Last_Post extends WP_Widget {

	public function __construct() {
		
		$id_base = 'zendvn-mp-widget-last-post';
		$name	= 'Abc Last Post';
		$widget_options = array(
					'classname' => 'zendvn-mp-wg-css-last-post',
					'description' => 'Hien thi nhung bai viet (post) moi nhat'
				);
		$control_options = array('width'=>'250px');
		parent::__construct($id_base, $name,$widget_options, $control_options);	

	}	
		
	public function widget( $args, $instance ) {
        extract($args);	

		$title 		= apply_filters('widget_title', $instance['title']);
		$title 		= (empty($title))? 'Abc last post': $title;
		$format 	= (empty($instance['format']))? 'standard':$instance['format'];
		$items 		= (empty($instance['items']))? '5':$instance['items'];
        $ordering 	= (empty($instance['ordering']))? 'DESC':$instance['ordering'];
        
        $args = array(
            'post_type' => 'post',
            'order' => $ordering,
            'orderby'=> 'ID',
            'posts_per_page' => $items,
            'post_status' => 'publish',
            'ignore_sticky_posts' => true
        );

        $wpQuery = new WP_Query($args);
		if($wpQuery->have_posts()){
			echo '<ul>';
			while($wpQuery->have_posts()){
				$wpQuery->the_post();
				/* echo '<pre>';
				print_r($wpQuery->post);
				echo '</pre>'; */
				$lnk = $wpQuery->post->guid;
				echo '<li><a href="' . $lnk . '">' . get_the_title() . '</a></li>';
			}
			echo '</ul>';
			wp_reset_postdata();
		}
	}
	
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] 		= strip_tags($new_instance['title']);
		$instance['format'] 	= strip_tags($new_instance['format']);
		$instance['items'] 		= strip_tags($new_instance['items']);
		$instance['ordering'] 	= strip_tags($new_instance['ordering']);
        
		return $instance;
	}
	
	public function form( $instance ) {
		$htmlObj =  new ZendvnHtml();

		//Tao phan tu chua Title
		$inputID 	= $this->get_field_id('title');
		$inputName 	= $this->get_field_name('title');
		$inputValue = @$instance['title'];
		$arr = array('class' =>'widefat','id' => $inputID);			
		echo '<p><label for="' . $inputID . '">'. translate('Title') .'</label>'
                . $htmlObj->textbox($inputName, $inputValue, $arr) 
                . '</p>';

        $tmp = get_theme_support('post-formats');
        $tmp = $tmp[0];
        
		//Tao phan tu chua Format
		$inputID 	= $this->get_field_id('format');
		$inputName 	= $this->get_field_name('format');
		$inputValue = @$instance['format'];
        $arr = array('class' =>'widefat','id' => $inputID);		
		$options['data'] = array(
                                'standard' => 'Standard'
                            );
        for($i=0; $i< count($tmp); $i++){
            $options['data'][$tmp[$i]] = ucfirst($tmp[$i]);
        }
		echo '<p><label for="' . $inputID . '">'. translate('Type of Format') .'</label>'
                . $htmlObj->selectbox($inputName, $inputValue, $arr,$options) 
                . '</p>';

		//Tao phan tu chua Items
		$inputID 	= $this->get_field_id('items');
		$inputName 	= $this->get_field_name('items');
		$inputValue = @$instance['items'];
		$arr = array('class' =>'widefat','id' => $inputID);
		echo '<p><label for="' . $inputID . '">' . translate('Number of Item') . '</label>'
				. $htmlObj->textbox($inputName,$inputValue,$arr)
                . '</p>';
                
		//Tao phan tu chua ordering
		$inputID 	= $this->get_field_id('ordering');
		$inputName 	= $this->get_field_name('ordering');
		$inputValue = @$instance['ordering'];
		$arr = array('class' =>'widefat','id' => $inputID);
		$options['data'] = array(
				'asc' => 'ASC (a-z)',
				'desc' => 'DESC (z-a)'
		);
		
		echo '<p><label for="' . $inputID . '">' . translate('Ordering by ID') . '</label>'
                . $htmlObj->selectbox($inputName,$inputValue,$arr,$options)
                . '</p>';
	}
	
}
