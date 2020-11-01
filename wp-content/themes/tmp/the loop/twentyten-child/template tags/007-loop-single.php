<?php
/**
 * The loop that displays a single post
 *
 * The loop displays the posts and the post content. See
 * https://developer.wordpress.org/themes/basics/the-loop/ to understand it and
 * https://developer.wordpress.org/themes/basics/template-tags/ to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop-single.php.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.2
 */
?>
<style>
	#zendvn-mp-info{
		background-color: white;
		min-height: 300px;
		border: solid 1px #ccc;
		padding: 10px;
	}
</style>
<?php
if ( have_posts() ) {
	while ( have_posts() ) :
		the_post();
		?>

<div id="zendvn-mp-info">
	<ul>
		<li>body_class()			: <?php echo body_class();?> </li>
		<li>next_post_link()		: <?php echo next_post_link();?> </li>
		<li>next_posts_link()		: <?php echo next_posts_link();?> </li>
		<li>post_class()			: <?php echo post_class();?> </li>
		<li>post_password_required(): <?php echo post_password_required();?> </li>
		<li>posts_nav_link()		: <?php echo posts_nav_link();?> </li>	
		<li>previous_post_link()	: <?php echo previous_post_link();?> </li>
		<li>previous_posts_link()	: <?php echo previous_posts_link();?> </li>		
		<li>single_post_title()		: <?php echo single_post_title();?> </li>
		
		<li><hr/></li>
		
		<li>the_category()		: <?php echo the_category();?> </li>
		<li>the_category_rss()	: <?php echo the_category_rss();?> </li>
		<li>the_content()		: <?php echo the_content();?> </li>
		<li>the_excerpt()		: <?php echo the_excerpt();?> </li>
		<li>the_excerpt_rss()	: <?php echo the_excerpt_rss();?> </li>
		
		<li><hr/></li>
		
		<li>the_ID()				: <?php echo the_ID();?> </li>
		<li>the_meta()				: <?php echo the_meta();?> </li>		
		<li>the_tags()				: <?php echo the_tags();?> </li>
		<li>the_title()				: <?php echo the_title();?> </li>		
		<li>the_title_attribute()	: <?php echo the_title_attribute();?> </li>
		<li>the_title_rss()			: <?php echo the_title_rss();?> </li>
		
		<li><hr/></li>
		
		<li>wp_link_pages()			: <?php echo wp_link_pages();?> </li>
		<li>get_attachment_link()	: <?php echo get_attachment_link();?> </li>		
		<li>wp_get_attachment_link(): <?php echo wp_get_attachment_link();?> </li>
		<li>the_attachment_link()	: <?php echo the_attachment_link();?> </li>	
		
		<li><hr/></li>
			
		<li>the_search_query()		: <?php echo the_search_query();?> </li>
		<li>is_attachment()			: <?php echo is_attachment();?> </li>
		
		<li><hr/></li>
			
		<li>wp_attachment_is_image()		: <?php echo wp_attachment_is_image();?> </li>
		<li>wp_get_attachment_image()		: <?php //echo wp_get_attachment_image();?> </li>
		<li>wp_get_attachment_image_src()	: <?php //echo wp_get_attachment_image_src();?> </li>
		<li>wp_get_attachment_metadata()	: <?php echo wp_get_attachment_metadata();?> </li>
		
		<li><hr/></li>
			
		<li>get_the_date()			: <?php echo get_the_date();?> </li>
		<li>single_month_title()	: <?php echo single_month_title('Ngay thang: ');?> </li>
		
		<li><hr/></li>
			
		<li>the_date()				: <?php echo the_date();?> </li>
		<li>the_date_xml()			: <?php echo the_date_xml();?> </li>
		<li>the_modified_author()	: <?php echo the_modified_author();?> </li>
		<li>the_modified_date()		: <?php echo the_modified_date();?> </li>
		<li>the_modified_time()		: <?php echo the_modified_time();?> </li>
		<li>the_time()				: <?php echo the_time();?> </li>
		
		<li><hr/></li>
			
		<li>the_shortlink()			: <?php echo the_shortlink();?> </li>
		<li>wp_get_shortlink()		: <?php echo wp_get_shortlink();?> </li>
	</ul>
</div>

				<div id="nav-above" class="navigation">
					<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'twentyten' ) . '</span> %title' ); ?></div>
					<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'twentyten' ) . '</span>' ); ?></div>
				</div><!-- #nav-above -->

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h1 class="entry-title"><?php the_title(); ?></h1>

					<div class="entry-meta">
						<?php twentyten_posted_on(); ?>
					</div><!-- .entry-meta -->

					<div class="entry-content">
						<?php the_content(); ?>
						<?php
						wp_link_pages(
							array(
								'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ),
								'after'  => '</div>',
							)
						);
						?>
					</div><!-- .entry-content -->

		<?php if ( get_the_author_meta( 'description' ) ) : // If a user has filled out their description, show a bio on their entries. ?>
					<div id="entry-author-info">
						<div id="author-avatar">
							<?php
							/** This filter is documented in author.php */
							$author_bio_avatar_size = apply_filters( 'twentyten_author_bio_avatar_size', 60 );
							echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
							?>
							</div><!-- #author-avatar -->
							<div id="author-description">
							<h2>
							<?php
							/* translators: %s: Author display name. */
							printf( __( 'About %s', 'twentyten' ), get_the_author() );
							?>
							</h2>
							<?php the_author_meta( 'description' ); ?>
							<div id="author-link">
								<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
									<?php
									/* translators: %s: Author display name. */
									printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'twentyten' ), get_the_author() );
									?>
								</a>
							</div><!-- #author-link	-->
							</div><!-- #author-description -->
						</div><!-- #entry-author-info -->
	<?php endif; ?>

						<div class="entry-utility">
							<?php twentyten_posted_in(); ?>
							<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="edit-link">', '</span>' ); ?>
						</div><!-- .entry-utility -->
					</div><!-- #post-<?php the_ID(); ?> -->

					<div id="nav-below" class="navigation">
						<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'twentyten' ) . '</span> %title' ); ?></div>
						<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'twentyten' ) . '</span>' ); ?></div>
					</div><!-- #nav-below -->

					<?php comments_template( '', true ); ?>

	<?php endwhile;
}; // End of the loop. ?>
