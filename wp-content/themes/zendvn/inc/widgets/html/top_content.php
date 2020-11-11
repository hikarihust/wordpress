<?php 
	if($wpQuery->have_posts()){
?>
<div id="home-slider-wrap" class="clr">
    <div id="home-slider" class="owl-carousel">
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
	<div class="home-slider-slide" data-dot="<?php echo $i; $i++;?>">
		<?php if($cat != 0):?>
		<div class="entry-cat-tag cat-25-bg">
			<a href="<?php echo get_category_link($cat);?>" title="<?php echo get_cat_name($cat);?>"><?php echo get_cat_name($cat);?></a>
		</div>
		<?php endif;?>
		<!-- .entry-cat-tag -->
		<div class="home-slider-media">
			<a href="<?php the_permalink();?>" title="<?php the_title();?>">
				<img src="<?php echo $imgUrl;?>" alt="<?php the_title();?>" />
			</a>
		</div>
		<!-- .home-slider-media -->
		<div class="home-slider-caption clr">
			<h2 class="home-slider-caption-title">
				<a href="<?php the_permalink();?>" title="<?php the_title();?>" rel="bookmark"><?php the_title();?></a>
			</h2>
			<div class="home-slider-caption-excerpt clr">
				<?php echo mb_substr(get_the_excerpt(), 0,55) . '...';?>
			</div>
			<!-- .home-slider-caption-excerpt -->
		</div>
		<!--.home-slider-caption -->
	</div>
	<?php 
		}//while ($wpQuery->have_posts()){
	?>
    </div>
    <!-- #home-slider -->
    <div id="home-slider-numbers"></div>
</div>
<?php 
    }//while ($wpQuery->have_posts()){
?>