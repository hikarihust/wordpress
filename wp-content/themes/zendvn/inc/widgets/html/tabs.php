<div class="wpex-tabs-widget clr">
    <div class="wpex-tabs-widget-inner clr">
        <div class="wpex-tabs-widget-tabs clr">
            <ul>
				<?php if(!empty($instance['popular_title'])):?>
				<li><a href="#" data-tab="#wpex-widget-popular-tab" class="active"><?php echo $instance['popular_title'];?></a></li>
				<?php endif;?>
				
				<?php if(!empty($instance['recent_title'])):?>
				<li><a href="#" data-tab="#wpex-widget-recent-tab"><?php echo $instance['recent_title'];?></a></li>
				<?php endif;?>
				
				<?php if(!empty($instance['comment_title'])):?>
				<li><a href="#" data-tab="#wpex-widget-comments-tab" class="last"><?php echo $instance['comment_title'];?></a></li>
				<?php endif;?>
			</ul>
        </div>
        <!-- .wpex-tabs-widget-tabs -->
        <div id="wpex-widget-popular-tab"
            class="wpex-tabs-widget-tab active-tab clr">
            <ul class="clr">
                <li class="clr">
                    <a href="#" title="Amazing Nature Photography by Matt Tucker" class="clr">
                        <span class="counter">1</span>
                        <span class="title strong">Amazing Nature Photography by Matt Tucker:</span> Cras vehicula in purus ut blandit.
                        Pellentesque tristique ornare ipsum&hellip;
                    </a>
                </li>
            </ul>
        </div>
        <!-- wpex-tabs-widget-tab -->
        <div id="wpex-widget-recent-tab"
            class="wpex-tabs-widget-tab  clr">
            <ul class="clr">
                <li class="clr">
                    <a href="#" title="Formula 1 Is Boring But The Cars Are Super Awesome" class="clr">
                        <img src="http://wordpress.xyz/wp-content/themes/zendvn/files/uploads/2014/02/shutterstock_80791570-100x100.jpg" alt="Formula 1 Is Boring But The Cars Are Super Awesome" width="100" height="100" />
                        <span class="title strong">Formula 1 Is Boring But The Cars Are Super Awesome:</span> Quisque
                        pellentesque fringilla scelerisque. Donec porta urna eu
                        fringilla adipiscing.&hellip;
                    </a>
                </li>
            </ul>
        </div>
        <!-- wpex-tabs-widget-tab -->
        <div id="wpex-widget-comments-tab"
            class="wpex-tabs-widget-tab clr">
            <ul class="clr">
                <li class="clr">
                    <a href="#" title="Homepage" class="clr"> 
                        <img src='http://wordpress.xyz/wp-content/themes/zendvn/files/avatar/1c292955bf55ec6172964107fd325638.png' class="avatar avatar-100 photo" />
                        <span class="title strong">AJ Clarke:</span> Aenean ut blandit lorem. Nullam ut ultrices nulla, non tristique&hellip;&hellip;
                    </a>
                </li>
            </ul>
        </div>
        <!-- .wpex-tabs-widget-tab -->
    </div>
    <!-- .wpex-tabs-widget-inner -->
</div>
<!-- .wpex-tabs-widget -->
