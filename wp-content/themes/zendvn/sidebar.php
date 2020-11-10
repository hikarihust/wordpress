<aside id="secondary" class="sidebar-container" role="complementary">
    <div class="sidebar-inner">
        <div class="widget-area">
            <?php if(is_active_sidebar('primary-widget-area')):?>
                <?php dynamic_sidebar('primary-widget-area');?>
            <?php endif;?>
        </div>
    </div>
</aside>