<?php
new Zendvn_Mp_Roles();

class Zendvn_Mp_Roles{
	
	public function __construct(){        
        //WP_User
        global $current_user;
        $user = wp_get_current_user();

        $user = new WP_User(2);
        // $user->remove_role('contributor');
        // $user->remove_role('editor');
        // $user->add_role('contributor');
        $user->__set('zendvn_mp_website', 'goole.com');

        // $user->add_cap('manage_options', true);
        echo '<pre>';
        print_r($user);
        echo '</pre>';
	}
}