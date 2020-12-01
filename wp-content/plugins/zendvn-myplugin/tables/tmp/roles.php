<?php
new Zendvn_Mp_Roles();

class Zendvn_Mp_Roles{
	
	public function __construct(){        
        //WP_Roles
        global $wp_roles;
        echo "<pre>";
        print_r($wp_roles->get_role('author'));
        echo "</pre>";
	}
}