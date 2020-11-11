<?php 
	if($wpQuery->have_posts()){
?>
<div class="featured-carousel-wrap clr">
    <h2 class="heading"><?php echo $title;?></h2>
    <div class="featured-carousel owl-carousel clr count-8">
	<?php 
		$i = 1;
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
    <div class="featured-carousel-slide">
        <a href="<?php the_permalink();?>" title="<?php the_title();?>">
            <img src="<?php echo $imgUrl;?>" alt="<?php the_title();?>" /><?php the_title();?>
        </a>
    </div>
	<?php 
		}//while ($wpQuery->have_posts()){
	?>
    </div>
    <!-- .featured-carousel -->
</div>
<?php 
    }//while ($wpQuery->have_posts()){
?>