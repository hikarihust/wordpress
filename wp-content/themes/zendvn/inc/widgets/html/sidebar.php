<?php 
	if($wpQuery->have_posts()){
?>
<div class="slider-widget owl-carousel clr">
    <?php 
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
    <div class="slider-widget-slide clr">
        <a href="<?php the_permalink();?>" title="<?php the_title();?>" class="widget-recent-posts-thumbnail clr">
            <img src="<?php echo $imgUrl;?>" 
                alt="<?php the_title();?>" width="620" height="350" />
            <div class="slider-widget-title"><?php the_title();?></div>
        </a>
        <?php if($cat != 0):?>
		<div class="entry-cat-tag cat-29-bg">
			<a href="<?php echo get_category_link($cat);?>" title="<?php echo get_cat_name($cat);?>"><?php echo get_cat_name($cat);?></a>
		</div>
        <?php endif;?>
    </div>
	<?php 
		}//while ($wpQuery->have_posts()){
	?>
    <!-- .widget-slider-slide -->
</div>
<?php 
    }//while ($wpQuery->have_posts()){
?>