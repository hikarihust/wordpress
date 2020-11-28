<?php
/* 
	Template Name: List Authors
	*/
?>
<?php get_header(); ?>
<!-- #top-wrap -->
<div class="site-main-wrap clr">
	<div id="main" class="site-main clr container">
		<div id="primary" class="content-area clr">
			<div id="content" class="site-content left-content clr" role="main">
				<?php if (have_posts()) while (have_posts()) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class('clr'); ?>>
						<header class="page-header clr">
							<h1 class="page-header-title"><?php the_title(); ?></h1>
						</header>
						<div class="entry clr"><?php the_content(); ?></div>
						<!-- .entry -->
					</article>
					<?php
					$args = array(
						'orderby'   => 'post_count',
						'order'		=> 'DESC'
					);
					$allUsers = get_users($args);
					?>
					<div id="contributors-template-wrap" class="clr">
						<?php
						foreach ($allUsers as $info) {
							$userId = $info->ID;
							if (count_user_posts($userId) > 0) {
						?>
								<article class="contributor-entry boxed-content clr">
									<div class="contributor-entry-inner clr">
										<div class="contributor-entry-avatar">
											<?php echo get_avatar($userId, 60); ?>
											<div class="contributor-entry-count">
												<a href="<?php echo get_author_posts_url($userId); ?>">
													<?php
													if (count_user_posts($userId) == 1) {
														echo count_user_posts($userId) . ' ' . translate('Article');
													} else {
														echo count_user_posts($userId) . ' ' . translate('Articles');
													}
													?>
												</a>
											</div>
										</div>
										<div class="contributor-entry-desc">
											<h2 class="contributor-entry-title">
												<a href="<?php echo get_author_posts_url($userId); ?>" title="Posts by <?php echo get_the_author_meta('display_name', $userId); ?>"><?php echo get_the_author_meta('display_name', $userId); ?></a>
											</h2>
											<div class="contributor-entry-url">
												<span>Website:</span><a href="<?php echo get_the_author_meta('url', $userId); ?>" title=""><?php echo get_the_author_meta('url', $userId); ?></a>
											</div>
											<p><?php echo get_the_author_meta('description', $userId); ?></p>
											<div class="contributor-entry-social clr">
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
										</div>
									</div>
								</article>
						<?php
							}
						}
						?>
					</div>

					<div class="comments-area clr" id="comments">
						<?php comments_template('/comments.php', true); ?>
					</div>
				<?php endwhile; ?>
			</div>
			<!-- #content -->
			<?php get_sidebar(); ?>
		</div>
		<!-- #primary -->

	</div>
	<!--.site-main -->
</div>
<!-- .site-main-wrap -->
</div>
<!-- #wrap -->
<?php get_footer(); ?>