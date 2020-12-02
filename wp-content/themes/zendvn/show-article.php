<?php
/*
 * Template Name: Article page
*/
get_header();?>
		<!-- #top-wrap -->

		<div class="site-main-wrap clr">
			<div id="main" class="site-main clr container">
				<div id="primary" class="content-area clr">
					<div id="content" class="site-content left-content boxed-content" role="main">
						<?php require_once ZENDVN_THEME_INC_DIR . '/top-content.php';?>
					
                        <?php if(have_posts()) while (have_posts()): the_post();?>
						<?php 
							$article = get_query_var('article');
                            if(empty($article)){
                                require_once 'pages/article-list.php';
                            }else{
                                require_once 'pages/article.php';
                            }
                        ?>
                        <?php endwhile;?>

                        <!-- .home-cats -->
						<?php require_once ZENDVN_THEME_INC_DIR . '/bottom-content.php';?>
						<!-- .featured-carousel-wrap -->
						<div class="ad-spot home-bottom-ad clr">
							<?php 
								global $zendvnCustomize;
								echo $zendvnCustomize->ads_setion('content-banner');
							?>
						</div>
						<!-- .ad-spot -->
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