<?php 
	if($wpQuery->have_posts()){
?>
<div id="home-slider-wrap" class="clr">
    <div id="home-slider" class="owl-carousel">
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
	<div class="home-slider-slide" data-dot="1">
		<div class="entry-cat-tag cat-25-bg">
			<a href="#" title="Models">Models</a>
		</div>
		<!-- .entry-cat-tag -->
		<div class="home-slider-media">
			<a href="#" title="Model Shoot For GQ 2015">
				<img src="http://wordpress.xyz/wp-content/themes/zendvn/files/uploads/2014/09/shutterstock_180775436-620x350.jpg" alt="Model Shoot For GQ 2015" />
			</a>
		</div>
		<!-- .home-slider-media -->
		<div class="home-slider-caption clr">
			<h2 class="home-slider-caption-title">
				<a href="#" title="Model Shoot For GQ 2015" rel="bookmark">Model Shoot For GQ 2015</a>
			</h2>
			<div class="home-slider-caption-excerpt clr">Proin a
				imperdiet purus, sit amet sollicitudin felis. Donec
				scelerisque tristique auctor. Suspendisse id nibh malesuada,
				bibendum nibh sit amet, luctus magna. Curabitur vestibulum
				felis&hellip;</div>
			<!-- .home-slider-caption-excerpt -->
		</div>
		<!--.home-slider-caption -->
	</div>
	<!--  
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
	-->
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