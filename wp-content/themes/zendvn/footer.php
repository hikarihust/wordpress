
<?php 
	$options = get_theme_mods();
	if(isset($options['zendvn_theme_general']) && !empty($options['zendvn_theme_general'])) {
		$options = $options['zendvn_theme_general'];
	}
?>
	<footer id="footer-wrap" class="site-footer clr">
		<?php require_once ZENDVN_THEME_INC_DIR . '/footer.php';?>
		<!-- #footer -->
		<div id="footer-bottom" class="clr">
			<div class="container clr">
				<div id="copyright" class="clr" role="contentinfo">
					<?php if( isset($options['copyright']) && !empty($options['copyright'])):?>
						<?php echo $options['copyright']; ?>
					<?php endif;?>
				</div>
				<!-- #copyright -->
				<?php require_once ZENDVN_THEME_INC_DIR . '/bottom-menu.php';?>
			</div>
			<!-- .container -->
		</div>
		<!-- #footer-bottom -->
	</footer>
	<!-- #footer-wrap -->

	<a href="#" class="site-scroll-top"><span class="fa fa-arrow-up"></span></a>
	<?php echo wp_footer() ?>
</body>
</html>