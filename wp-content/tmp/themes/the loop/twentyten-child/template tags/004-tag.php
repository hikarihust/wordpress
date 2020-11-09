<?php
/**
 * Template for displaying Tag Archive pages
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>
<style>
#zendvn-mp-info{
	background-color: white;
	min-height: 300px;
	border: solid 1px #ccc;
	padding: 10px;
}
</style>

		<div id="container">
			<div id="content" role="main">
			<div id="zendvn-mp-info">
				<ul>
					<li>single_tag_title()		: <?php single_tag_title();?> </li>
					<li>tag_description()		: <?php echo tag_description();?> </li>
					<li>the_tags()				: <?php the_tags();?> </li>
					<li>wp_generate_tag_cloud()	: <?php wp_generate_tag_cloud('');?> </li>
					<li>wp_tag_cloud()			: <?php wp_tag_cloud()?> </li>
					
				</ul>
			</div>

				<h1 class="page-title">
				<?php
					/* translators: %s: Tag title. */
					printf( __( 'Tag Archives: %s', 'twentyten' ), '<span>' . single_tag_title( '', false ) . '</span>' );
				?>
				</h1>

				<?php
				/*
				 * Run the loop for the tag archive to output the posts
				 * If you want to overload this in a child theme then include a file
				 * called loop-tag.php and that will be used instead.
				 */
				get_template_part( 'loop', 'tag' );
				?>
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
