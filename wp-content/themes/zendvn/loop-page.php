<div id="content" class="site-content left-content clr" role="main">
    <?php if (have_posts()) while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('clr'); ?>>
            <header class="page-header clr">
                <h1 class="page-header-title"><?php the_title(); ?></h1>
            </header>
            <div class="entry clr"><?php the_content(); ?></div>
            <!-- .entry -->
        </article>
        <div class="comments-area clr" id="comments">
            <?php comments_template('/comments.php', true); ?>
        </div>
    <?php endwhile; ?>
</div>