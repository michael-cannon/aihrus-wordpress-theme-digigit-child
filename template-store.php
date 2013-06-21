<?php
/**
 * Template Name: Store
 */

get_header(); ?>

<div class="row">
	
	<div class="twelve columns">
		
			<?php get_template_part( 'downloads', 'header' ); ?>
			
				<div class="row">
				
					<?php
					$current_page = get_query_var('paged');
					$per_page = 12;
					$offset = $current_page > 0 ? $per_page * ($current_page-1) : 0;
					$product_args = array(
						'post_type' => 'download',
						'posts_per_page' => $per_page,
						'offset' => $offset,
						'orderby' => 'date',
						'order' => 'DESC',
					);
					$products = new WP_Query($product_args);
				
					?>
					
					<?php $i = 1; ?>
					
						<?php while ($products->have_posts()) : $products->the_post(); ?>
							
							<?php
							$threedownloads = of_get_option('digigit_threedownloads');
							
							if ( $threedownloads == '1' ) { ?>
								
								<div class="four columns">
									<?php get_template_part( 'content', 'download' ); ?>
								</div>
							
								<?php 
									if( $i % 3 == 0 ) {
										echo '</div><div class="row">';
									}
								?>
								
							<?php } else { ?>
									
								<div class="six columns">
									<?php get_template_part( 'content', 'download' ); ?>
								</div>
							
								<?php 
									if( $i % 2 == 0 ) {
										echo '</div><div class="row">';
									}
								?>	
										
							<?php } ?>
							
							<?php $i++; ?>
						<?php endwhile; ?>
						
				</div>
		
	
		<div class="row pag">
			<div class="twelve columns cent">
				<?php 					
					$big = 999999999; // need an unlikely intege					
					echo paginate_links( array(
						'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
						'format' => '?paged=%#%',
						'current' => max( 1, get_query_var('paged') ),
						'type' => 'list',
						'total' => $products->max_num_pages
					) );
				?>
			</div><!-- .twelve.columns.cent -->
		</div><!-- .row.pag -->
		
		
	</div><!-- .twelve.columns -->
</div><!-- .row -->
	
<?php get_footer(); ?>