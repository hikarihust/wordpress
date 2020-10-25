<?php
class Zendvn_Mp_Widget_Simple extends WP_Widget {
	public function __construct() {
		$id_base = 'zendvn-mp-widget-simple';
		$name	= 'Abc Simple widget';
		$widget_options = array(
					'classname' => 'zendvn-mp-wg-css-simple',
					'description' => 'Day la mot Widget đơn gian'
				);
		$control_options = array('width'=>'250px');
        parent::__construct($id_base, $name,$widget_options, $control_options);
    }	
    
    public function widget( $args, $instance ) {}

    public function update( $new_instance, $old_instance ) {}

    public function form( $instance ) {
		$htmlObj =  new ZendvnHtml();

		//Tao phan tu chua Title
		$inputID 	= $this->get_field_id('title');
		$inputName 	= $this->get_field_name('title');
		$inputValue = '';
		$arr = array('class' =>'widefat','id' => $inputID);			
		echo '<p><label for="' . $inputID . '">'. translate('Title') .'</label>'
		. $htmlObj->textbox($inputName, $inputValue, $arr) 
		. '</p>';

		//Tao phan tu chua Movie
		$inputID 	= $this->get_field_id('movie');
		$inputName 	= $this->get_field_name('movie');
		$inputValue = '';
		$arr = array('class' =>'widefat','id' => $inputID);
		echo '<p><label for="' . $inputID . '">' . translate('Movie') . '</label>'
		. $htmlObj->textbox($inputName,$inputValue,$arr)
		. '</p>';

		//Tao phan tu chua Song
		$inputID 	= $this->get_field_id('song');
		$inputName 	= $this->get_field_name('song');
		$inputValue = '';
		$arr = array('class' =>'widefat','id' => $inputID);
		echo '<p><label for="' . $inputID . '">' . translate('Song') . '</label>'
		. $htmlObj->textbox($inputName,$inputValue,$arr)
		. '</p>';
    }
}
