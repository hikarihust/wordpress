<?php
class ZendvnMp_Widget_Db_Simple{
	
	public function __construct(){
		
		add_action('wp_dashboard_setup', array($this,'widget'));		
	}
	
	public function widget(){
		wp_add_dashboard_widget('zendvn_mp_widget_db_simple', 'My Plugin Information', 
						array($this,'password'));
	}
	
	/*
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
	*/

	/*
	public function display(){
		$wpQuery = new WP_Query('author=1');
		$lnkPost = '#';
		if(count($wpQuery->posts)>0){
			foreach ($wpQuery->posts as $key => $val){
				echo '<br/>' . $val->post_title;
			}
		}
	}
	*/

	public function display(){
		$arrQuery = array(
			'author' => 1,
			'cat' => 1,
			'posts_per_page' => 4
		);

		$wpQuery = new WP_Query($arrQuery);
		$wpQuery->query('posts_per_page=2');
		if($wpQuery->have_posts()){
			echo '<ul>';
			while ($wpQuery->have_posts()){
				$wpQuery->the_post();
				$lnkPost = admin_url('post.php?post=' . get_the_ID() . '&action=edit');
				echo '<li>' . get_the_ID() . '-' . get_the_title() . '</li>';

			}
			echo '</ul>';
		}else{
			echo '<p>' . translate('No post found') . '</p>';
		}


		echo "<br />======================";
		echo "<pre>";
		print_r($wpQuery);
		echo "</pre>";
	}

	public function author(){
		$wpQuery = new WP_Query( array('author__not_in' => array( 1, 2, 3 ) ) );

		if($wpQuery->have_posts()){
			echo '<ul>';
			while ($wpQuery->have_posts()){
				$wpQuery->the_post();
				echo '<li>' . get_the_ID() . ' - ' . get_the_title() . '</li>';
		
			}
			echo '</ul>';
		}else{
			echo '<p>' . translate('No post found') . '</p>';
		}
	}

	public function category(){
		$wpQuery = new WP_Query(array('cat'=>'3,5') );
	
		if($wpQuery->have_posts()){
			echo '<ul>';
			while ($wpQuery->have_posts()){
				$wpQuery->the_post();
				echo '<li>' . get_the_ID() . ' - ' . get_the_title() . '</li>';
	
			}
			echo '</ul>';
		}else{
			echo '<p>' . translate('No post found') . '</p>';
		}
	}

	public function tag(){
		$wpQuery = new WP_Query(array( 'tag_slug__in'=>array('php-course') ) );
	
		if($wpQuery->have_posts()){
			echo '<ul>';
			while ($wpQuery->have_posts()){
				$wpQuery->the_post();
				echo '<li>' . get_the_ID() . ' - ' . get_the_title() . '</li>';
	
			}
			echo '</ul>';
		}else{
			echo '<p>' . translate('No post found') . '</p>';
		}
	}

	public function search(){
		$wpQuery = new WP_Query(array( 's' => 'công trình' ));
	
		if($wpQuery->have_posts()){
			echo '<ul>';
			while ($wpQuery->have_posts()){
				$wpQuery->the_post();
				echo '<li>' . get_the_ID() . ' - ' . get_the_title() . '</li>';
	
			}
			echo '</ul>';
		}else{
			echo '<p>' . translate('No post found') . '</p>';
		}
	}

	public function post_page(){
		$wpQuery = new WP_Query(array( 'post_parent' => 0, 'post_type' => 'page' ));
		
		if($wpQuery->have_posts()){
			echo '<ul>';
			while ($wpQuery->have_posts()){
				$wpQuery->the_post();
				echo '<li>' . get_the_ID() . ' - ' . get_the_title() . '</li>';
		
			}
			echo '</ul>';
		}else{
			echo '<p>' . translate('No post found') . '</p>';
		}
	}

	public function password(){
		$wpQuery = new WP_Query(array( 'post_password' => '123456' ) );
		
		if($wpQuery->have_posts()){
			echo '<ul>';
			while ($wpQuery->have_posts()){
				$wpQuery->the_post();
				echo '<li>' . get_the_ID() . ' - ' . get_the_title() . '</li>';
		
			}
			echo '</ul>';
		}else{
			echo '<p>' . translate('No post found') . '</p>';
		}
	}

}