<!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
	<meta charset="<?php bloginfo('charset')?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		<?php 
			wp_title('|', true,'right');
			bloginfo('name');
		?>
	</title>
	<!--[if lt IE 9]>
		<script src="js/html5.js" type="text/javascript"></script>
	<![endif]-->
	<meta name='robots' content='noindex,follow' />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>?ver=20190507" />
	<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
	<?php wp_head();?>
</head>
<body class="home fixed-nav">

	<div id="wrap" class="clr">

		<div id="top-wrap" class="clr">
			<div id="topbar" class="clr">
				<div class="container clr">
					<div id="topbar-date" class="clr">
						<div class="topbar-date-full">
							<span class="fa fa-clock-o"></span>Monday 13th October 2014
						</div>
						<div class="topbar-date-condensed">
							<span class="fa fa-clock-o"></span>13-Oct-2014
						</div>
					</div>
                    <!-- .topbar-date -->
					<?php require_once ZENDVN_THEME_INC_DIR . '/top-menu.php';?>
					<!-- #topbar-nav -->
					<div id="topbar-search" class="clr">
						<form method="get" class="topbar-searchform" action="#" role="search">
							<input type="search" class="field topbar-searchform-input" name="s" value="" placeholder="Type your search & hit enter" />
							<button type="submit" class="topbar-searchform-btn">
								<span class="fa fa-search"></span>
							</button>
						</form>
					</div>
					<!-- topbar-search -->
				</div>
				<!-- .container -->
			</div>
			<!-- #topbar -->
			<header id="header" class="site-header clr container" role="banner">
				<div class="site-branding clr">
					<div id="logo" class="clr">
						<div class="site-text-logo clr">
							<?php 
								global $zendvnCustomize;
								echo $zendvnCustomize->general_setion('site-logo');
							?>
						</div>
					</div>
					<!-- #logo -->
					<div id="blog-description" class="clr">
						<?php 
							global $zendvnCustomize;
							echo $zendvnCustomize->general_setion('site-description');
						?>
					</div>
					<!-- #blog-description -->
				</div>
				<!-- .site-branding -->
				<div class="ad-spot header-ad clr">
					<?php 
						global $zendvnCustomize;
						echo $zendvnCustomize->ads_setion('top-banner');
					?>
				</div>
				<!-- .ad-spot -->
			</header>
            <!-- #header -->
            <?php require_once ZENDVN_THEME_INC_DIR . '/main-menu.php';?>
			<!-- #site-navigation-wrap -->
		</div>