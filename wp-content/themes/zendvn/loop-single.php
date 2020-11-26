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
        if(! $format) {
            $firstImg = $zendvnSupport->get_first_img($content);
            $content  = $zendvnSupport->remove_first_img($firstImg, $content);
        }

        if($format == 'audio') {
            $firstAudio = $zendvnSupport->get_first_audio($content);
            $content  = $zendvnSupport->remove_first_audio($firstAudio, $content);
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
<?php endwhile; ?>