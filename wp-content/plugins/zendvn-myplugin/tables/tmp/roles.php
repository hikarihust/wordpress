<?php
new Zendvn_Mp_Roles();

class Zendvn_Mp_Roles{
	
	public function __construct(){        
        //WP_Role
        $group = get_role('editor');

        echo "<pre>";
        print_r($group);
        echo "</pre>";
	}
}