<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Digigit
 * @since Digigit 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<div class="photo">
			<?php
				if ( has_post_thumbnail() )
					echo the_post_thumbnail( 'blogthumb', array('class' => 'image') );
			?>
		</div>
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'digigit' ), 'after' => '</div>' ) ); ?>
		<?php edit_post_link( __( 'Edit', 'digigit' ), '<span class="edit-link">', '</span>' ); ?>
	</div><!-- .entry-content -->
	
</article><!-- #post-<?php the_ID(); ?> -->
