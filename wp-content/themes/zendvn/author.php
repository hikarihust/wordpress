<?php get_header();?>
		<!-- #top-wrap -->
<style type="text/css">
	.archive-header {
		padding-left: 80px;
	}
</style>
		<div class="site-main-wrap clr">
			<div id="main" class="site-main clr container">
				<div id="primary" class="content-area clr">
					<div id="content" class="site-content left-content boxed-content" role="main">
						<?php 
							$userId = get_the_author_meta("ID");
						?>
						<header class="archive-header clr">
							<div class="author-archive-gravatar clr">
								<?php echo get_avatar($userId, 60); ?>
							</div>
							<h1 class="archive-header-title">
								<?php echo translate('Articles Written by') ?>:
								<?php echo get_the_author_meta('display_name', $userId); ?>
							</h1>
							<div class="archive-description clr">
								<?php 
									echo translate('This author has written') . ' ';
									if(count_user_posts($userId) == 1) {
										echo count_user_posts($userId) . ' ' . translate('article');
									} elseif(count_user_posts($userId) > 1) {
										echo count_user_posts($userId) . ' ' . translate('articles');
									}
								?>
							</div>
							<div class="layout-toggle">
								<span class="fa fa-bars"></span>
							</div>
						</header>
						<?php get_template_part('loop', 'archive'); ?>
                    </div>
					<!-- #content -->
                    <?php get_sidebar();?>
					<!-- #secondary -->
				</div>
				<!-- #primary -->

			</div>
			<!--.site-main -->
		</div>
		<!-- .site-main-wrap -->
	</div>
	<!-- #wrap -->
    <?php get_footer();?>