<?php
/**
 * The template to display content in a single.php post template
 *
 * @package Digigit
 * @since Digigit 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<table class="product-box blogcontent">

	<tr class="header gradient">
		<td colspan="2">
			<h1 class="title singlepost">
				<?php the_title(); ?>
			</h1><!-- .title -->
		</td><!-- .ten.columns -->
		<td width="110">
			<div class="see">
				<div class="button secondary" style="cursor:default;"><?php the_time('M j, Y'); ?></div>
			</div><!-- .see -->
		</td><!-- .two.columns -->
	</tr><!-- .header.row -->
	
	<tr class="body">
		<td colspan="3">
			<div class="photo">
					<?php
						if ( has_post_thumbnail() ) {
						    echo the_post_thumbnail( 'blogthumb', array('class' => 'image') );
						}
						else { // make following image changable in theme options
						   
						}
					?>
			</div>
			
			<div class="content">
				<?php the_content('',false); ?>
		    	<?php echo do_shortcode( '[fb layout=button_count send=true]' ); ?>
		    	<?php echo do_shortcode( '[p1]' ); ?>
				<?php edit_post_link( __( 'Edit', 'digigit' ), '<span class="edit-link">', '</span>' ); ?>
			</div>
			
		</td><!-- .photo -->
	</tr><!-- .body.row -->
	
	<tr class="footer <?php echo of_get_option('digigit_colorbar'); ?>">
		<td width="420">
			<div class="category">
			
				<?php
					/* translators: used between list items, there is a space after the comma */
					$categories_list = get_the_category_list( __( ', ', 'digigit' ) );
					if ( $categories_list && digigit_categorized_blog() ) :
				?>
				<div class="cat-links entry-meta">
					<?php printf( __( 'Posted in %1$s', 'digigit' ), $categories_list ); ?>
				</div>
				<?php
					endif; // End if categories ?>
					
			</div><!-- .category -->
		</td><!-- .seven.columns-->
		<td colspan="2">
			<?php if ( ! is_singular( 'testimonials-widget' ) ) : ?>
			<div class="add">
				<a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>" class="button success radius">
					<?php the_author_meta('display_name'); ?>
				</a>
			</div>
			<?php endif; ?>
		</td>
	</tr><!-- .footer.row -->

</table>


</article><!-- #post-<?php the_ID(); ?> -->