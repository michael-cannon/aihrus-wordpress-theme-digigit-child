<?php
/*
Template Name: Home Page Template With Items & Widgets
*/


get_header(); ?>

	<div id="content" role="main">

				<?php aihrus_digigit_featured_slider(); ?>

				<?php if (of_get_option('hp_text1') != '') { ?>
					<?php if (of_get_option('hp_link1') != '') { ?>
	    				<a href="<?php echo (of_get_option('hp_link1')); ?>" class="hptext1 button secondary"><?php echo of_get_option('hp_text1'); ?></a>
	    			<?php } else { ?>
	    				<div class="hptext1"><?php echo of_get_option('hp_text1'); ?></div>
	    			<?php }
	    		} else {} ?>

	    <div class="row hpwidgets">
	    	<div class="four columns hp1">
	    		<?php if ( ! dynamic_sidebar( 'hp-1') ) : ?>
    				Add some widgets in your <a href="<?php echo site_url(); ?>/wp-admin/widgets.php">Widgets</a> settings!
        		<?php endif; ?>
	    	</div><!-- .four.columns.hp2 -->
	
	    	<div class="four columns hp2">
	    		<?php if ( ! dynamic_sidebar( 'hp-2') ) : ?>
    				Add some widgets in your <a href="<?php echo site_url(); ?>/wp-admin/widgets.php">Widgets</a> settings!
        		<?php endif; ?>
	    	</div><!-- .four.columns.hp1 -->
	    
	    	<div class="four columns hp3">
	    		<?php if ( ! dynamic_sidebar( 'hp-3') ) : ?>
    				Add some widgets in your <a href="<?php echo site_url(); ?>/wp-admin/widgets.php">Widgets</a> settings!
        		<?php endif; ?>
	    	</div><!-- .four.columns.hp2 -->
	    </div><!-- .row -->

				<div class="row">
				
					<?php
					$current_page = get_query_var('paged');
					$per_page = 2;
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
							
								<div class="six columns">
									<?php get_template_part( 'content', 'download' ); ?>
								</div>
							
								<?php 
									if( $i % 3 == 0 ) {
										echo '</div><div class="row">';
									}
								?>
															
							<?php $i++; ?>
						<?php endwhile; ?>
						
				</div>

				<a href="<?php echo home_url(); ?>/downloads" class="button large hpmore secondary"><?php _e('View Aihrus Products','spiritualized'); ?></a>
				
	</div><!-- #content -->
	
<?php get_footer(); ?>