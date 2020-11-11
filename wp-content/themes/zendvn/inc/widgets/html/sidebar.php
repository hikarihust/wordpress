<?php 
	if($wpQuery->have_posts()){
?>
<div class="slider-widget owl-carousel clr">
    <?php 
        while ($wpQuery->have_posts()){
            $wpQuery->the_post();
    ?>
    <div class="slider-widget-slide clr">
        <a href="#" title="<?php the_title();?>" class="widget-recent-posts-thumbnail clr">
            <img src="http://wordpress.xyz/wp-content/themes/zendvn/files/uploads/2014/02/shutterstock_80791570-620x350.jpg" 
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