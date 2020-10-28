<?php
class Zendvn_Mp_SC_Date{
	
	public function __construct(){
		add_shortcode('zendvn_mp_sc_date', array($this,'show'));
	}
	
	public function show(){
		
        $str = '<div class="zendvn_mp_sc_date_css">'
        . date('l jS \of F Y h:i:s A')
        . '</div>';

        return $str;
	}
}
