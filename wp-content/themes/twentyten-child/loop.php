<?php 
    // echo "<pre>";
    // print_r($wp_query);
    // echo "</pre>";
?>

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
        echo "</ul>";
    } else {
        
    } 
?>