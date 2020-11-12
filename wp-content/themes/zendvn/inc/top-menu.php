<?php if(has_nav_menu('top-menu')):?>
<div id="topbar-nav" class="cr">
<?php 
    //<li><a href="#">Home</a></li>
	$args = array( 
        'menu' 				    => '', 
        'container' 		    => 'div', 
        'container_class' 	    => 'menu-menu-container', 
        'container_id' 		    => '', 
        'container_aria_label'  => '',
        'menu_class' 		    => 'top-nav sf-menu', 
        'menu_id' 			    => 'menu-menu',	
        'echo' 				    => true, 
        'fallback_cb' 		    => 'wp_page_menu', 
        'before' 			    => '', 
        'after' 			    => '', 
        'link_before' 		    => '', 
        'link_after' 		    => '', 
        'items_wrap' 		    => '<ul id="%1$s" class="%2$s">%3$s</ul>',	
        'depth' 			    => 2, 
        'walker' 			    => '', // new My_Walker_Menu
        'theme_location' 	    => 'top-menu',
        'item_spacing'          => 'preserve'
    );
	wp_nav_menu($args);
?>
</div>
<?php endif;?>
<!-- <div id="topbar-nav" class="cr">
    <div class="menu-menu-container">
        <ul id="menu-menu" class="top-nav sf-menu">
            <li>
                <a href="#">Home</a>
            </li>
            <li class="dropdown">
                <a href="#">Features <i class="fa fa-caret-down nav-arrow"></i></a>
                <ul class="sub-menu">
                    <li>
                        <a href="#">Standard Post</a>
                    </li>
                    <li>
                        <a href="#">Gallery</a>
                    </li>
                    <li>
                        <a href="#">Audio</a>
                    </li>
                    <li>
                        <a href="#">Video</a>
                    </li>
                    <li>
                        <a href="#">Symple Shortcodes</a>
                    </li>
                    <li>
                        <a href="#">Contributors</a>
                    </li>
                </ul></li>
            <li>
                <a href="#">Archives</a>
            </li>
            <li>
                <a href="#">Contact</a>
            </li>
            <li>
                <a target="_blank" href="#">Customize</a>
            </li>
            <li>
                <a href="#" class="nav-loginout-link">
                    <span class="fa fa-lock"></span> Login
                </a>
            </li>
        </ul>
    </div>
</div> -->