<?php 
global $wp_query;
global $zendvnSupport;

$postObj = $wp_query->post;
$format = get_post_format($postObj->ID);
?>

<?php if($format === 'gallery'): ?>
<?php 
	$firstGallery = $zendvnSupport->get_first_gallery_shortcode($postObj->post_content);
?>
<div class="single-post-media clr">
	<?php echo do_shortcode($firstGallery); ?>
</div>
<?php endif; ?>

<?php if($format === 'video'): ?>
<?php 
	$firstVideo = $zendvnSupport->get_first_video($postObj->post_content);
?>
<div class="single-post-media clr">
	<div class="post-thumbnail">
		<?php 
			if(preg_match_all('#<figure.*<video.*</video></figure>#im', $firstVideo)) {
				echo $firstVideo;
			} elseif(preg_match_all('#\[http.*www.youtube.com\S+\]#im', $firstVideo)) {
				echo $zendvnSupport->video_embed($firstVideo);
			}
		?>
	</div>
	<!-- .post-gallery -->
</div>
<?php endif; ?>

<?php if($format === 'audio'): ?>
<?php 
	$firstAudio = $zendvnSupport->get_first_audio($postObj->post_content);
?>
<div class="single-post-media clr">
	<div class="post-thumbnail">
		<?php echo $firstAudio; ?>
	</div>
	<!-- .post-gallery -->
</div>
<?php endif; ?>

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