<?php
/**
 * The template used for displaying a single post.
 *
 * @package Spiritualized
 * @since Spiritualized 1.0
 */

if ( is_singular( 'downloads' ) || is_singular( Testimonials_Widget::PT ) ) {
	global $efficientRelatedPosts;
	remove_filter('the_content', array( $efficientRelatedPosts, 'filterPostContent'), 99);
}

get_header(); ?>

<div class="row">
	<div class="eight columns">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'single' ); ?>

				<?php digigit_content_nav( 'nav-below' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template - if uncomment next line
					// if ( comments_open() || '0' != get_comments_number() )
						comments_template( '', true );
				?>

			<?php endwhile; // end of the loop. ?>

	</div><!-- .eight.columns -->
		
	<div class="four columns">
		<?php get_sidebar(); ?>
	</div><!-- .four.columns -->
	
</div><!-- .row -->
	
<?php get_footer(); ?>