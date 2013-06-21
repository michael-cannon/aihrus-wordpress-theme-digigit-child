<?php
/**
 * The template for displaying the footer
 *
 * @package Digigit
 * @since Digigit 1.0
 */
?>
		</div><!-- #main-content .store-template -->
	</div><!-- .twelve.columns.bloggrid.midcontainer" -->
</div><!-- .row.container -->

</div><!-- #wrap -->

<div class="footerarea gradient">
	<div class="fwarea">
		<div class="row fwr1 hpwidgets">

			<div class="six columns fw1">
				<div class="inner">
					<?php if ( ! dynamic_sidebar( 'fw-1') ) : ?>
        			<?php endif; ?>
        		</div><!-- .inner -->
			</div><!-- .six.columns.fw1 -->
			
			<div class="six columns fw2">
				<div class="inner">
					<?php if ( ! dynamic_sidebar( 'fw-2') ) : ?>
       				<?php endif; ?>
       			</div><!-- .inner -->
			</div><!-- .six.columns.fw2 -->
				
		</div> <!-- .row.fwr1 -->

	</div><!-- .fwarea -->
</div><!-- .footerarea.gradient -->


<div class="footerarea2">
	<div class="row container">
		<div class="twelve columns footleft">

			<footer id="colophon" class="site-footer" role="contentinfo">
				
				<div class="row">
				
				<hr class="footerhr">
				
				<div class="four columns">
					<div class="inner left">
					
					<?php 	if ( of_get_option('footer_text') != '' ) {
								echo '<div class="footertext">';
								echo of_get_option('footer_text');
								echo '</div>';
							}
							else {
								if ( has_nav_menu( 'footer' ) ) {
                    			wp_nav_menu( array(
                           			'theme_location' => 'footer',
                           			'container' => false,
                            		'menu_class' => 'link-list'
                    			) );
                    			} else {
                    			echo '<div class="menwarn2">Go to <a href="'. site_url() . '/wp-admin/nav-menus.php">Appearance > Menus</a> and create a footer menu and then set the theme location! Or you can have text here by adding it in your <a href="'. site_url() . '/wp-admin/themes.php?page=options-framework">Theme Options</a>.</div>';
                    			}
							}
					?>
						
            		</div><!-- .inner.left -->
				</div><!-- .footlinks.eight.columns -->

				<div class="four columns">
					<div class="inner">
						<!-- START StopTheHacker SEAL -->
						<img width="145" height="54" border="0" style="cursor: pointer;" src="https://panel.stopthehacker.com/seal?domain=aihr.us&id=145444" alt="This seal is issued to aihr.us by StopTheHacker Inc." title="This seal is issued to aihr.us by StopTheHacker Inc." onclick="window.open('https://panel.stopthehacker.com/seal/verify?domain=aihr.us&id=145444','StopTheHacker','width=600,height=600,left=150,top=150');" oncontextmenu="alert('Copying Prohibited by Law - Copyright &copy; 2012 StopTheHacker Inc., all rights reserved.'); return false;">
						<!-- END StopTheHacker SEAL --> 
            		</div><!-- .inner -->
				</div><!-- .four.columns -->
				
				<div class="four columns sm">
					<div class="inner">
						<ul class="social">
						    <li class="facebook">
						    	<a href="<?php echo of_get_option('sm_facebook'); ?>"></a>
						    </li>
						    <li class="twitter">
						    	<a href="<?php echo of_get_option('sm_twitter'); ?>"></a>
						    </li>
						    <li class="tumblr">
						    	<a href="<?php echo of_get_option('sm_tumblr'); ?>"></a>
						    </li>
						    <li class="linkedin">
						    	<a href="<?php echo of_get_option('sm_linkedin'); ?>"></a>
						    </li>
						    <li class="youtube">
						    	<a href="<?php echo of_get_option('sm_youtube'); ?>"></a>
						    </li>
						     <li class="vimeo">
						    	<a href="<?php echo of_get_option('sm_vimeo'); ?>"></a>
						    </li>
						    <li class="flickr">
						    	<a href="<?php echo of_get_option('sm_flickr'); ?>"></a>
						    </li>
						    
							<?php
							$rssicon = of_get_option('digigit_hiderss');
								if ( $rssicon == '1' ) {
								}
								else {
						    	echo '<li class="rss">';
						    	echo '<a href="' . site_url() . '/feed/"></a>';
								echo '</li>'; }
						    ?>
						</ul><!-- .social -->
					</div><!-- .inner -->
				</div><!-- .four.columns.sm -->

				
				</div><!-- .row -->
				
			</footer><!-- #colophon .site-footer -->

		</div><!-- .twelve.columns.footleft -->
	</div><!-- .row.container -->
</div><!-- .footerarea2 -->

<!-- Modals -->

<div id="SearchModal" class="reveal-modal small">
	<?php digigit_dl_searchform(); ?>
	<a class="close-reveal-modal">&#215;</a>
</div>

<?php 
	    echo '<div id="LIModal" class="reveal-modal"><h2>';
	    _e('Log In','digigit');
	    echo '</h2>' . digigit_login_form() . '<p class="lead">';
	    _e('Need an account?','digigit');
	    echo ' <a href="#" data-reveal-id="RegModal">';
	    _e('Register','digigit');
	    echo '</a><br/>';
	    _e('Forgot your password?','digigit');
	    echo ' <a href="' . site_url() . '/wp-login.php?action=lostpassword">';
	    _e('Recover','digigit');
	    echo '</a></p>';
		echo '<h4>Guest Purchase?</h4>';
	    echo '<p>If you purchased as a guest, then you need to <a title="Convert Guest Account to Real" href="http://aihr.us/profile/convert-guest-account-to-real/">convert to a real account</a> before accessing your purchases.</p>';
	    echo '<a class="close-reveal-modal">&#215;</a></div>';

	    echo '<div id="RegModal" class="reveal-modal"><h2>';
	    _e('Register','digigit');
	    echo '</h2>' . digigit_registration_form() . '<p class="lead">';
	    _e('Already registered?','digigit');
	    echo ' <a href="#" data-reveal-id="LIModal">';
	    _e('Log In','digigit');
	    echo '</a></p><a class="close-reveal-modal">&#215;</a></div>';
?>

<?php aihrus_wp_footer(); ?>
<?php wp_footer(); ?>
</body>
</html>