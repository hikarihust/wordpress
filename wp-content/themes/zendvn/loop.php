<?php global $zendvnSupport; ?>
<header class="archive-header clr">
    <h1 class="archive-header-title"><?php echo translate('Home'); ?></h1>
    <div class="layout-toggle">
        <span class="fa fa-bars"></span>
    </div>
    <!-- .layout-toggle -->
</header>
<!-- .archive-header -->
<div class="clr" id="blog-wrap">
<?php while (have_posts()): the_post(); ?>
    <article class="clr loop-entry col-1">
        <div class="loop-entry-media clr">
            <?php 
                $cats       = get_the_category($post->ID);
                $catObj     = $cats[0];
                $catId      = $catObj->cat_ID;
                $catName    = get_cat_name($catId);
                $catUrl     = get_category_link($catId);
            ?>
            <div class="entry-cat-tag cat-28-bg">
                <a title="<?php echo $catName; ?>" href="<?php echo $catUrl ?>"><?php echo $catName; ?></a>
            </div>
            <!-- .entry-cat-tag -->
            <?php
                $width = 620;
                $height = 350;
                $feature_img = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
                if($feature_img == false){
                    $imgUrl = $zendvnSupport->get_img_url($post->post_content); 
                }else{
                    $imgUrl = $feature_img;
                }
                if(!empty($imgUrl)){
                    $imgUrl = $zendvnSupport->get_new_img_url($imgUrl, $width, $height);	
                }
            ?>
            <figure class="loop-entry-thumbnail">
                <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
                    <div class="post-thumbnail">
                        <img width="620" height="350" alt="<?php the_title(); ?>" 
                            src="<?php echo $imgUrl; ?>">
                    </div>
                    <!-- .post-thumbnail -->
                </a>
            </figure>
            <!-- .loop-entry-thumbnail -->
        </div>
        <!-- .loop-entry-media -->
        <div class="loop-entry-content clr">
            <header>
                <h2 class="loop-entry-title">
                    <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h2>
                <div class="loop-entry-meta clr">
                    <div class="loop-entry-meta-date">
                        <span class="fa fa-clock-o"></span><?php the_modified_date(); ?>
                    </div>
                    <div class="loop-entry-meta-comments">
                        <span class="fa fa-comments"></span>
                        <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php comments_number('No comment', 'one comment', '% comments'); ?></a>
                    </div>
                </div>
                <!-- .loop-entry-meta -->
            </header>
            <div class="loop-entry-excerpt entry clr">Lorem ipsum
                dolor sit amet, consectetur adipiscing elit. Donec congue
                velit accumsan, feugiat massa in, sollicitudin metus. Nam
                turpis neque, molestie vel nulla id, vulputate…</div>
            <!-- .loop-entry-excerpt -->
        </div>
        <!-- .loop-entry-content -->
    </article>
    <!-- .loop-entry -->
    <?php endwhile; ?>
</div>
<!-- #blog-wrap -->
<div class="site-pagination clr">
    <span class="site-pagination-heading">Pages</span>
    <ul class="page-numbers">
        <li><span class="page-numbers current">1</span></li>
        <li><a href="#" class="page-numbers">2</a></li>
    </ul>
</div>
<div class="ad-spot archive-bottom-ad clr">
    <a title="Ad" href="#">
        <img alt="Ad" src="images/ad-620x80.png">
    </a>
</div>
<!-- .ad-spot -->
         