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
            <div class="entry-cat-tag cat-28-bg">
                <a title="Nascar" href="#"><?php the_category(); ?></a>
            </div>
            <!-- .entry-cat-tag -->
            <figure class="loop-entry-thumbnail">
                <a title="Nascar Final Results 2015" href="#">
                    <div class="post-thumbnail">
                        <img width="620" height="350" alt="Nascar Final Results 2015" src="files/uploads/2014/09/shutterstock_124918517-620x350.jpg">
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
                    <a title="Nascar Final Results 2015" href="#">Nascar Final Results 2015</a>
                </h2>
                <div class="loop-entry-meta clr">
                    <div class="loop-entry-meta-date">
                        <span class="fa fa-clock-o"></span>September 23, 2014
                    </div>
                    <div class="loop-entry-meta-comments">
                        <span class="fa fa-comments"></span>
                        <a title="Comment on Nascar Final Results 2015" href="#">3 Comments</a>
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
         