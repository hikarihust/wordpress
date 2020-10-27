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

	}
	
	public function update( $new_instance, $old_instance ) {

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
            //echo '<br>' . $tmp[$i];
            $options['data'][$tmp[$i]] = ucfirst($tmp[$i]);
        }
		echo '<p><label for="' . $inputID . '">'. translate('Type of Format') .'</label>'
                . $htmlObj->selectbox($inputName, $inputValue, $arr,$options) 
                . '</p>';
	}
	
}
