<?php
new Zendvn_Mp_Roles();

class Zendvn_Mp_Roles{
	
	public function __construct(){        
        //WP_User
        global $current_user;
        $user = wp_get_current_user();

        $user = new WP_User(1);
        $user->__set('zendvn_mp_website', 'goole.com');

        echo $user->__isset('zendvn_mp_website');
	}
}