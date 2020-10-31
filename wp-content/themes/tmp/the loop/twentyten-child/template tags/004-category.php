<?php
/**
 * Template for displaying Category Archive pages
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
					<li>category_description()	: <?php echo category_description(1);?> </li>
					<li>single_cat_title()		: <?php single_cat_title('ZendVN - ',true);?> </li>
					<li>the_category()			: <?php the_category(' - ');?> </li>
					<li>the_category_rss()		: <?php the_category_rss();?> </li>
					<li>wp_dropdown_categories(): <?php wp_dropdown_categories()?> </li>
					<li>wp_list_categories()	: <?php wp_list_categories();?> </li>		
				</ul>
			</div>

				<h1 class="page-title">
				<?php
					/* translators: %s: Category title. */
					printf( __( 'Category Archives: %s', 'twentyten' ), '<span>' . single_cat_title( '', false ) . '</span>' );
				?>
				</h1>
				<?php
					$category_description = category_description();
				if ( ! empty( $category_description ) ) {
					echo '<div class="archive-meta">' . $category_description . '</div>';
				}

				/*
				 * Run the loop for the category page to output the posts.
				 * If you want to overload this in a child theme then include a file
				 * called loop-category.php and that will be used instead.
				 */
				get_template_part( 'loop', 'category' );
				?>

			</div><!-- #content -->
		</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
