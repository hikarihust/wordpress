<?php 
    // echo "<pre>";
    // print_r($wp_query);
    // echo "</pre>";
?>
<style>
.zendvn-loop{
	list-style-type: none;
}

.zendvn-loop li{
	border: 1px solid #ccc;
	padding: 8px;
	margin-bottom: 10px;
}
</style>
<?php if ( $wp_query->max_num_pages > 1 ) : ?>
				<div id="nav-below" class="navigation">
					<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentyten' ) ); ?></div>
					<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentyten' ) ); ?></div>
				</div><!-- #nav-below -->
<?php endif; ?>

<?php 
    if( have_posts()){
        echo '<ul class="zendvn-loop">';
        while(have_posts()){
            the_post();
?>
        <li>
            <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
            <div>id: <?php the_ID(); ?> - time: <?php the_time(); ?></div>
			<div>Author: <?php the_author();?></div>
			<div><?php the_tags();?></div>
			<div>Category: <?php the_category(' ');?></div>
			<div>Excerpt: <?php the_excerpt();?></div>
        </li>
<?php
        } 
        // wp_reset_query();
        wp_reset_postdata();
        echo "</ul>";
    } else {
        
    } 
?>

<?php if ( $wp_query->max_num_pages > 1 ) : ?>
				<div id="nav-below" class="navigation">
					<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentyten' ) ); ?></div>
					<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentyten' ) ); ?></div>
				</div><!-- #nav-below -->
<?php endif; ?>