<?php 
global $wp_query;
global $zendvnSupport;

$postObj = $wp_query->post;
$format = get_post_format($postObj->ID);
?>
<?php if(! $format): ?>
<?php 
	$firstImg = $zendvnSupport->get_first_img($postObj->post_content);
?>
<div class="single-post-media clr">
	<div class="post-thumbnail">
		<?php echo $firstImg; ?>
	</div>
	<!-- .post-gallery -->
</div>
<?php endif; ?>