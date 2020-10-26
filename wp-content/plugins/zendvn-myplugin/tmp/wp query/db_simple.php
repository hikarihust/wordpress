<?php
class ZendvnMp_Widget_Db_Simple{
	
	public function __construct(){
		
		add_action('wp_dashboard_setup', array($this,'widget'));		
	}
	
	public function widget(){
		wp_add_dashboard_widget('zendvn_mp_widget_db_simple', 'My Plugin Information', 
						array($this,'display'));
	}
	
	public function display(){
		$wpQuery = new WP_Query('author=1');
		$lnkPost = '#';
		if($wpQuery->have_posts()){
			echo '<ul>';
			while ($wpQuery->have_posts()){
				$wpQuery->the_post();
				$lnkPost = admin_url('post.php?post=' . get_the_ID() . '&action=edit');
				echo '<li><a href="' . $lnkPost . '">' . get_the_title() . '</a></li>';
			}
			echo '</ul>';
		}else{
			echo '<p>' . translate('No post found') . '</p>';
		}

		wp_reset_postdata();
	}
}