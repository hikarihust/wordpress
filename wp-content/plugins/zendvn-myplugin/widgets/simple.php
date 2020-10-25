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

    public function form( $instance ) {}
}
