
<?php if(has_nav_menu('footer-menu')):?>
<?php 
    //<li><a href="#">Home</a></li>
	$args = array( 
        'menu' 				    => '', 
        'container' 		    => '', 
        'container_class' 	    => '', 
        'container_id' 		    => '', 
        'container_aria_label'  => '',
        'menu_class' 		    => 'footer-nav clr', 
        'menu_id' 			    => 'menu-footer',	
        'echo' 				    => true, 
        'fallback_cb' 		    => 'wp_page_menu', 
        'before' 			    => '', 
        'after' 			    => '', 
        'link_before' 		    => '', 
        'link_after' 		    => '', 
        'items_wrap' 		    => '<ul id="%1$s" class="%2$s">%3$s</ul>',	
        'depth' 			    => 0, 
        'walker' 			    => '', // new My_Walker_Menu
        'theme_location' 	    => 'footer-menu',
        'item_spacing'          => 'preserve'
    );
	wp_nav_menu($args);
?>
<?php endif;?>
<!-- <ul id="menu-footer" class="footer-nav clr">
    <li><a href="#">Home</a></li>
    <li><a href="#">Archives</a></li>
    <li><a href="#">Contact</a></li>
</ul> -->