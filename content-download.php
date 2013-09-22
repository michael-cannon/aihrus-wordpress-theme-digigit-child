<?php
/* The template for displaying content for the downloads loop
 *
 * @package Digigit
 * @since Digigit 1.0
*/
?>


<table class="product-box">

	<tr class="header gradient">
		<td colspan="2">
			<h2 class="title">
				<?php the_title(); ?>
			</h2><!-- .title -->
		</td><!-- .ten.columns -->
		<td width="110px;">
			<div class="see">
				<a href="<?php the_permalink(); ?>" class="button secondary">see details</a>
			</div><!-- .see -->
		</td><!-- .two.columns -->
	</tr><!-- .header.row -->
	
	<tr class="body">
		<td colspan="3">
			<div class="photo">
				<a href="<?php the_permalink(); ?>">
					<?php
						if ( has_post_thumbnail() ) {
						    echo the_post_thumbnail('medium', array('class' => 'image') );
						}
						else { // make following image changable in theme options
						    echo '<img src="' . get_template_directory_uri() . '/images/nopic.jpg" />';
						}
					?>
				</a>
			</div>
		</td><!-- .photo -->
	</tr><!-- .body.row -->
	
	<tr class="footer <?php echo of_get_option('digigit_colorbar'); ?>">
		<td>
			<div class="category">
					<?php the_terms( $post->ID, 'download_category', '', ' / ', '' ); ?>
			</div><!-- .category -->
		</td><!-- .seven.columns-->
		<td>
			<div class="price">
							<?php
								$id = get_the_ID();
								if(edd_has_variable_prices($id)) {
						    		// if the download has variable prices, show the first one as a starting price
						    		edd_price($id);
						    		echo '+';
						    	} else {
						    		edd_price($id);
						   		}
								if ( class_exists( 'EDD_Recurring' ) && EDD_Recurring()->is_recurring( $id ) ) {
									$period = EDD_Recurring()->get_period_single($id);
									if ( 'never' != $period ) {
										echo ' per ' . $period;
									}
								}
							?>
			</div><!-- .price -->
		</td><!-- .five.columns -->
		<td>
			<div class="add">
				<?php
					if( edd_has_variable_prices( get_the_ID() ) ) { ?>
						<a href="<?php the_permalink(); ?>" class="button success radius">view item</a>
				<?php
					} else { ?>
						<a href="<?php echo edd_get_checkout_uri(); ?>?edd_action=add_to_cart&download_id=<?php echo get_the_ID(); ?>" class="button success radius">add to cart</a>
				<?php
					} ?>
			</div>
		</td>
	</tr><!-- .footer.row -->

</table>