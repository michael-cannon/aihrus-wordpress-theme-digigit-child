<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and top header content
 * 
 * @package      Spiritualized
 * @author       Bryce Adams <brycead@gmail.com>
 * @copyright    Copyright (c) 2012, Bryce Adams
 * @since        1.0
 * @alter        1.0
 *
 */

?>
<!DOCTYPE html>

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />

  <!-- Set the viewport width to device width for mobile -->
  <meta name="viewport" content="width=device-width" />

  <title><?php wp_title(''); ?></title>

	<!-- other stuff -->
	
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
	<![endif]-->
	
	<!--[if IE]>
     <style type="text/css">
         .timer { display: none !important; }
         div.caption { background:transparent; filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000,endColorstr=#99000000);zoom: 1; }
    </style>
	<![endif]-->
	
	<!--[if gte IE 9]>
	 <style type="text/css">
	 	.gradient {
        	filter: none;
        }
     </style>
    <![endif]-->
	
	<!-- Custom CSS added in Theme Options -->
	<style type="text/css">
	<?php echo of_get_option('digigit_css',''); ?>
	
	/* css for color changes */
	<?php css_options(); ?>
	
	/* css for social icons hiding */
	<?php digigit_sm_head(); ?>
	</style>
	
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!-- ClickTale Top part -->
<script type="text/javascript">
var WRInitTime=(new Date()).getTime();
</script>
<!-- ClickTale end of Top part -->

<div id="wrap">

	<div class="row container">
		<div class="twelve columns">

			<div id="page" class="hfeed site">
				<?php do_action( 'before' ); ?>
	
				<header id="masthead" class="site-header row" role="banner">
				
					<div class="twelve columns">
						
						<div class="titlecont">
						
						<?php if ( of_get_option('digigit_logo') == '') {
						
							echo '<h1 class="site-title"><a href="';
							echo home_url();
							echo '">';
							echo bloginfo('name');
							echo '</a></h1>';
						
							} else {
							
							echo '<a href="';
							echo home_url();
							echo '"><div class="sitelogoimg"></div></a>';
							
							}
						?>
						
						</div>
					
					<nav id="access" role="navigation">
	        			<?php            
	            			if ( has_nav_menu( 'primary' ) ) {
            					wp_nav_menu( array(
            				    	'theme_location' => 'primary',
            				    	'container' => false,
            				    	'menu_class' => 'headermenu',
            				    ) );
            				} else {
            					echo 'Go add some items in your <a href="' . admin_url('nav-menus.php') . '">menu settings</a>!';
            				    }
            			?>
        			</nav><!-- #access -->
					
				</header><!-- #masthead .site-header.row -->
				
					
									
			</div><!-- #page .hfeed.site -->
		</div><!-- .twelve.columns -->
	</div><!-- .row.container -->

<div class="row container">
	<div class="twelve columns bloggrid storegrid midcontainer <?php echo of_get_option('digigit_colorbar'); ?>">
		<div id="main-content" class="store-template">