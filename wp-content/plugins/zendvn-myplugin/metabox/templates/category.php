<?php
/**
 * Template for displaying Category Archive pages
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

		<div id="container">
			<div id="content" role="main">
				<div class="zendvn_mp_taxonomy_category">
					<div class="img"><img src="<?php echo $zendvn_mp_taxonomy_category['picture'];?>"></div>
					<div class="summary">
						<h1 class="page-title">
							<?php
								/* translators: %s: Category title. */
								printf( __( 'Category Archives: %s', 'twentyten' ), '<span>' . single_cat_title( '', false ) . '</span>' );
							?>
						</h1>
						<?php echo $zendvn_mp_taxonomy_category['summary'];?>
					</div>
				</div>
				<?php
				/*
					$category_description = category_description();
				if ( ! empty( $category_description ) ) {
					echo '<div class="archive-meta">' . $category_description . '</div>';
				}
				*/

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
