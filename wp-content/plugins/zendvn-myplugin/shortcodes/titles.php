<?php
class Zendvn_Mp_SC_Titles{
	
	public function __construct(){
        add_shortcode('zendvn_mp_sc_titles', array($this,'show'));
        // echo '<br/>' . __METHOD__;
	}
	
	public function show($attr){

		if(is_single()) {
            extract($attr);
            $ids = explode(',', $ids);
            $list = '';

            if(count($ids)>0) {
				$args = array(
                    'post_type' 		=> 'post',
                    'post__in' 			=> $ids,
                    'post_status' 		=>'publish',
                    'ignore_sticky_posts' => true
                );
                $wpQuery = new WP_Query($args);
                
                if($wpQuery->have_posts()){
                    $list .='<ul>';
                    while ($wpQuery->have_posts()){
                        $wpQuery->the_post();
                        $lnk = $wpQuery->post->guid;
                        $list .='<li><a href="' . $lnk .'">' . get_the_title() . '</a></li>';
                    }
                    $list .='</ul>';
                }
                wp_reset_postdata();
            }
            
            $html = "<div><b><i>{$title}</i></b>{$list}</div>";
            return $html;
		}
	}
}
