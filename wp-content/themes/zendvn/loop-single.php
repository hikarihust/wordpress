<?php
global $zendvnSupport;
?>
<?php if (have_posts()) while (have_posts()) : the_post(); ?>
    <!-- .single-post-media -->
    <header class="post-header clr">
        <h1 class="post-header-title"><?php the_title(); ?></h1>
        <div class="post-meta clr">
            <span class="post-meta-date"><?php translate('Posted on'); ?> <?php the_modified_date(); ?> </span>
            <span class="post-meta-author"> <?php translate('by'); ?> <?php the_author_posts_link(); ?></span>
            <span class="post-meta-category"> <?php translate('in'); ?> <?php the_category(', ') ?></span>
            <span class="post-meta-comments"> <?php translate('with'); ?>
                <a title="<?php the_title(); ?>" href="<?php comment_link(); ?>"><?php comments_number('No comment', '1 comment', '% comments') ?></a>
            </span>
        </div>
        <!-- .post-meta -->
    </header>
    <!-- .page-header -->
    <div class="entry clr">
        <div class="ad-spot post-top-ad clr">
            <a title="Ad" href="#"><img alt="Ad" src="http://wordpress.xyz/wp-content/themes/zendvn/images/ad-250x250.png"></a>
        </div>
        <!-- .ad-spot -->
        <?php
        $format  = get_post_format($post->ID);
        $content = get_the_content();
        if (!$format) {
            $firstImg = $zendvnSupport->get_first_img($content);
            $content  = $zendvnSupport->remove_first_img($firstImg, $content);
        }

        if ($format == 'audio') {
            $firstAudio = $zendvnSupport->get_first_audio($content);
            $content  = $zendvnSupport->remove_first_audio($firstAudio, $content);
        }

        if ($format == 'video') {
            $firstVideo = $zendvnSupport->get_first_video($content);
            $content  = $zendvnSupport->remove_first_video($firstVideo, $content);
            $content = $zendvnSupport->replace_video_embed($content);
        }

        if ($format == 'gallery') {
            $firstGallery = $zendvnSupport->get_first_gallery_shortcode($content);
            $content      = $zendvnSupport->remove_first_gallery($firstGallery, $content);
        }

        echo $content;
        ?>
        <div class="ad-spot post-bottom-ad clr">
            <a title="Ad" href="#"><img alt="Ad" src="http://wordpress.xyz/wp-content/themes/zendvn/images/ad-620x80.png"></a>
        </div>
        <!-- .ad-spot -->
    </div>
    <div class="post-tags">
        <?php the_tags(); ?>
    </div>
    <div class="author-bio clr">
        <div class="author-bio-avatar clr">
            <a title="Visit Author Page" href="<?php echo get_author_posts_url($post->post_author); ?>">
                <?php echo get_avatar($post->post_author, 60); ?>
            </a>
        </div>
        <!-- .author-bio-avatar -->
        <div class="author-bio-content clr">
            <div class="author-bio-author clr">
                <?php echo translate('Authored by') . ':'; ?>
                <?php the_author_posts_link(); ?>
            </div>
            <div class="author-bio-url">
                <span><?php echo translate('Website') . ':'; ?></span> <?php echo get_the_author_link(); ?>
            </div>
            <p><?php the_author_meta('description'); ?></p>
        </div>
        <!-- .author-bio-content -->
        <div class="author-bio-social clr">
            <a target="_blank" class="twitter" title="Twitter" href="https://twitter.com/WPExplorer">
                <span class="fa fa-twitter"></span></a>
            <a target="_blank" class="facebook" title="Facebook" href="#">
                <span class="fa fa-facebook"></span>
            </a>
            <a target="_blank" class="google-plus" title="Google Plus" href="#">
                <span class="fa fa-google-plus"></span>
            </a>
            <a target="_blank" class="linkedin" title="LinkedIn" href="#">
                <span class="fa fa-linkedin"></span>
            </a>
            <a target="_blank" class="pinterest" title="Pinterest" href="#">
                <span class="fa fa-pinterest"></span>
            </a>
            <a target="_blank" class="instagram" title="Instagram" href="#">
                <span class="fa fa-instagram"></span>
            </a>
        </div>
        <!-- .author-bio-social -->
    </div>
    <div class="next-prev clr">
        <div class="post-prev">
            <?php
            $format = '<img alt="Previous Article" src="' . ZENDVN_THEME_IMG_URL . '/prev-post.png">';
            echo previous_post_link($format . ' %link', translate('Previous Article'));
            ?>
        </div>
        <div class="post-next">
            <?php
            $format = '<img alt="Next Article" src="' . ZENDVN_THEME_IMG_URL . '/next-post.png">';
            echo next_post_link($format . ' %link', translate('Next Article'));
            ?>
        </div>
    </div>
<?php endwhile; ?>