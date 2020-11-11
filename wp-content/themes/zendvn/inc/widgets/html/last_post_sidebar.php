<?php 
	if($wpQuery->have_posts()){
?>
<ul class="widget-recent-posts clr">
    <?php 
		$width			= 125;
		$height			= 71;
        while ($wpQuery->have_posts()){
            $wpQuery->the_post();
			$postObj = $wpQuery->post;
			//echo $postObj->ID;
			$feature_img = wp_get_attachment_url(get_post_thumbnail_id($postObj->ID));
			if($feature_img == false){
				$imgUrl = $this->get_img_url($postObj->post_content); 
			}else{
				$imgUrl = $feature_img;
			}
			//get_post_thumbnail_id($postObj->ID);
			if(!empty($imgUrl)){
				$imgUrl = $this->get_new_img_url($imgUrl, $width, $height);	
			}
    ?>
    <li class="clr widget-recent-posts-li left-thumbnail format-">
        <a href="<?php the_permalink();?>" title="<?php the_title();?>" class="widget-recent-posts-thumbnail clr"> 
            <img src="<?php echo $imgUrl;?>" alt="<?php the_title();?>" width="620" height="350" />
        </a>
        <div class="widget-recent-posts-content clr">
            <a href="<?php the_permalink();?>" title="<?php the_title();?>" class="widget-recent-posts-title"><?php the_title();?></a>
            <div class="widget-recent-posts-date"><?php the_modified_date();?></div>
        </div>
        <!-- .widget-recent-posts-content -->
    </li>
    <?php 
		}//while ($wpQuery->have_posts()){
    ?>
</ul>
<?php 
    }//while ($wpQuery->have_posts()){
?>