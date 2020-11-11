<?php 
	if($wpQuery->have_posts()){
?>
<ul class="widget-latest-news clr">
    <?php 
        $width			= 238;
        $height			= 134;
        $i = 1;
        while ($wpQuery->have_posts()){
            $wpQuery->the_post();
			$postObj = $wpQuery->post;
			//echo $postObj->ID;
    ?>
    <?php if($i== 1):?>
    <?php
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
    <li class="first-post clr">
        <div class="first-post-media clr">
            <a href="<?php the_permalink();?>" title="<?php the_title();?>"> 
                <img src="<?php echo $imgUrl;?>" alt="<?php the_title();?>" width="620" height="350" />
            </a>
            <?php if($cat !=0):?>
            <div class="entry-cat-tag cat-36-bg">
                <a href="<?php echo get_category_link($cat)?>" title="<?php echo get_cat_name($cat)?>"><?php echo get_cat_name($cat)?></a>
            </div>
            <?php endif;?>
            <!-- .entry-cat-tag -->
        </div>
        <!-- .first-post-media --> 
        <a href="<?php the_permalink();?>" title="<?php the_title();?>" class="widget-recent-posts-title"><?php the_title();?></a>
        <p><?php echo mb_substr(get_the_excerpt(), 0,65) . '...';?></p>
    </li>
    <?php else :?>
    <li>
        <a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php echo mb_substr(get_the_title(), 0,32) . '...';?></a>
    </li>
    <?php endif;?>
    <?php 
        $i++;
		}//while ($wpQuery->have_posts()){
    ?>
</ul>
<?php 
    }//while ($wpQuery->have_posts()){
?>