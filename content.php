<?php
/**
 * General template for displaying post content
 *
 * @package Digigit
 * @since Digigit 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<table class="product-box blogcontent">

	<tr class="header gradient">
		<td colspan="2">
			<h2 class="title">
<?php
if ( is_archive() || is_home() ) {
	echo '<a href="' . get_permalink() . '">';
	the_title();
	echo '</a>';
} else {
	the_title();
}
?>
			</h2><!-- .title -->
		</td><!-- .ten.columns -->
		<td width="110">
			<div class="see">
				<div class="button secondary"><?php the_time('M j, Y'); ?></div>
			</div><!-- .see -->
		</td><!-- .two.columns -->
	</tr><!-- .header.row -->
	
	<tr class="body">
		<td colspan="3">
			<div class="photo">
				<a href="<?php the_permalink(); ?>">
					<?php
						if ( has_post_thumbnail() ) {
						    echo the_post_thumbnail( 'blogthumb', array('class' => 'image') );
						}
						else { // make following image changable in theme options
						    
						}
					?>
				</a>
			</div>
			
			<div class="content">
<?php
if ( ! is_archive() && ! is_home() )
	the_content('',false);
else
	the_excerpt();
?>
			</div>
			
		</td><!-- .photo -->
	</tr><!-- .body.row -->
	
	<tr class="footer <?php echo of_get_option('digigit_colorbar'); ?>">
		<td width="350">
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
			<div class="add">
				<a href="<?php the_permalink(); ?>" class="button success radius">continue reading</a>
			</div>
		</td>
	</tr><!-- .footer.row -->

</table>


</article><!-- #post-<?php the_ID(); ?> -->