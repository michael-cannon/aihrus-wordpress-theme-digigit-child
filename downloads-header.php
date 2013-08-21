<div class="content clearfix row stocontent">
				
	<div class="six columns">
		
		<div class="breadc">
				
				<h4>
				
				<?php
					if ( 'download' == get_post_type() || is_page() ) {
						echo '<a href="' . site_url() . '/downloads/">Store</a>';
					}
				?>
				
				/ 
				
				<?php
					if ( is_post_type_archive( 'download' ) ) {
						echo post_type_archive_title();
					} elseif ( is_tax() ) {
						echo single_term_title( '', false );
					}
					
					
				?>			
				 
				<?php
					if ( is_singular( 'download' ) ) {
						echo the_title();
					}
				?>
				
				<?php
					if (is_page()) {
						the_title();
					}
				?>
				 
				</h4>
				
		</div>
	
	</div>
				
	<div class="six columns meta">
		
		<ul class="inlinemenu">
			<li class="button small secondary about radius search">
				<a href="#" data-reveal-id="SearchModal" data-animationspeed="100">
					<i class="foundicon-search"></i>
				</a>
			</li>
		</ul><!-- ul.inlinemenu -->
		
		<?php            
	        if ( has_nav_menu( 'store' ) ) {
            	wp_nav_menu( array(
                	'theme_location' => 'store',
                	'container' => false,
                	'menu_class' => 'inlinemenu',
                	'walker' => class_exists( 'Digigit_Walker_Nav_Menu' ) ? new Digigit_Walker_Nav_Menu : new Walker_Nav_Menu
                ) );
            } else {
            	
                }
        ?>	
			
		<?php
		$profilebuttons = of_get_option('digigit_hideprofile');
							
		if ( $profilebuttons == '1' ) { ?>
		
		<ul class="inlinemenu">
		
		<?php } else { ?>	
		
		<ul class="inlinemenu">
		
			<?php
			if ( is_user_logged_in() ) { ?>
				<li class="button small secondary about radius">
					<a href="<?php echo site_url(); ?>/profile/"><i class="foundicon-people"></i><span>&nbsp;</span>Profile</a>
				</li>
				<li class="button small secondary about radius">
					<a href="<?php echo site_url(); ?>/profile/#Download_History"><i class="foundicon-inbox"></i><span>&nbsp;</span>Downloads</a>
				</li>
			<?php	
			} else { ?>
				<li class="button small secondary about radius">
					<a href="#" data-reveal-id="LIModal"><span>&nbsp;</span>Log In</a>
				</li>
				<li class="button small secondary about radius">
					<a href="#" data-reveal-id="RegModal"><span>&nbsp;</span>Register</a>
				</li>
			<?php	
			}
			?>
			
		<?php } ?>
							
			<li class="cart"><span class="has-tip tip-top" title="
				<?php 	if ( edd_get_cart_quantity() == 0 ) {
							echo 'Visit the Store!';
						} else {
							echo edd_currency_filter( edd_format_amount( edd_get_cart_amount() ) );
						} ?>
			"><i class="foundicon-cart"></i> <?php echo edd_get_cart_quantity(); ?></span><a href="<?php echo edd_get_checkout_uri(); ?>" id="btn_cart">View Cart</a></li>
		</ul>
		
		
				
	</div>		
				
</div>