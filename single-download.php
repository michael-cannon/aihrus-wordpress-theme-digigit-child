<?php
/**
 * Template for displaying a single download.
 *
 * @package Digigit
 * @since Digigit 1.0
*/

global $efficientRelatedPosts;
remove_filter('the_content', array( $efficientRelatedPosts, 'filterPostContent'), 99);

get_header(); ?>

<!--	<div id="main-content" class="container"> 
<div class="row">-->

<div class="row">
	<div class="twelve columns singleproduct">

		<?php get_template_part( 'downloads', 'header' ); ?>
		
		<?php while (have_posts()) : the_post(); ?>
	
		<div class="row">
		
			<div class="eight columns">		
						
				<div class="images">
				
					<?php
						if ( has_post_thumbnail() ) {
							echo the_post_thumbnail('product-image-large');
						}
						else {
							echo '<img src="' . get_template_directory_uri() . '/images/nopic-big.jpg" />';
						}
					?>		
					
					<?php
						echo do_shortcode( '[gallery include_featured=false]' );
					?>	

				</div><!-- .images -->

				<?php digigit_content_nav( 'nav-below' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template - if uncomment next line
					// if ( comments_open() || '0' != get_comments_number() )
						comments_template( '', true );
				?>
							
			</div><!-- .eight.columns-->			
						
						
			<div class="four columns productmeta <?php echo of_get_option('digigit_colorbar'); ?>">
			
			    	<div class="price" id="to_top">
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
			    	</div>
			    	
		    		<?php if(edd_has_variable_prices($post->ID)) {
		    	    echo edd_get_purchase_link($post->ID, 'Add to Cart', 'button', 'blue');
		    	 } 
		    	    else {
		    	    echo edd_get_purchase_link($post->ID, 'Add to Cart', 'button', 'blue');
		    	    }
		    	?>	
		    		
<p class="why-purchase">Your purchase helps fund my on-going mentoring and support of <a title="WordPress" href="http://wordpress.org" target="_blank">Open Source</a> <a title="TYPO3 Enterprise CMS" href="http://typo3.org" target="_blank">projects</a> and <a href="http://wwoof.it/en/" target="_blank">WWOOF</a>.</p>
<hr />

		    			
		    			
		    	<?php echo do_shortcode( '[fb layout=button_count send=true]' ); ?>
		    	<?php echo do_shortcode( '[p1]' ); ?>
		    	<?php the_content(); ?>
		    	<?php echo do_shortcode( '[fb layout=button_count send=true]' ); ?>
		    	<?php echo do_shortcode( '[p1]' ); ?>
		    	<div class="to-top">
		    		<p>
				    <a href="#to_top">To Top ↑</a>
		    		</p>
		    	</div><!-- to-top-->

				<?php edit_post_link( __( 'Edit', 'digigit' ), '<span class="edit-link">', '</span>' ); ?>
		    		
		    		<hr />	
		    				
		    	<div class="product-categories">
		    		<p>
		    		<?php the_terms( $post->ID, 'download_category', '<span class="title">Categories:</span>&nbsp;<span>', '</span>,&nbsp;<span>', '</span>' ); ?>
		    		</p>
		    	</div><!-- product-categories-->
		    				
		    	<div class="product-tags">
		    		<p>
		    		<?php the_terms( $post->ID, 'download_tag', '<span class="title">Tags:</span>&nbsp;<span>', '</span>,&nbsp;<span>', '</span>' ); ?>
		    		</p>
		    	</div><!-- .product-tags-->
		    			
				
<?php
								if ( false && class_exists( 'Isa_EDD_Related_Downloads' ) ) {
					global $Isa_EDD_Related_Downloads;
$Isa_EDD_Related_Downloads->isa_after_download_content();
								}
?>
						    				
		    </div><!-- .four.columns.productmeta -->
		    
		    
		    						
		<?php endwhile; ?>
		
	
		</div><!-- .row-->

	</div><!-- .twelve.columns.singleproduct -->
</div><!-- .row -->

<?php get_footer(); ?>