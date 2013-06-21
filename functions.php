<?php
/**
 *  SCRIPT_SUMMARY
 *
 *  @author Michael Cannon <mc@aihr.us>
 */
include_once 'custom/digigit/custom_functions.php';

function aihrus_digigit_featured_slider() { ?>

		<div id="featured">

<?php
	global $post;
$tmp_post = $post;
$args = array( 'numberposts' => 5, 'post_type' => 'slides' );
$myposts = get_posts( $args );
foreach( $myposts as $post ) :	setup_postdata($post); 
$post_thumbnail_id = get_post_thumbnail_id();
$featured_src = wp_get_attachment_image_src( $post_thumbnail_id, 'digigit-home-featured' );


$my_meta = get_post_meta($post->ID, 'digigit_slideurl', true);

if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
	echo '<div class="post thumb f2bg">';
	if ( $my_meta == '' ) {
		echo '<h4>';
		echo the_title();
		echo '</h4>';

		echo the_post_thumbnail('digigit-home-featured');
	} else {
		echo '<h4>';
		echo '<a href="';
		echo $my_meta;
		echo '">';
		echo the_title();
		echo '</a>';
		echo '</h4>';

		echo '<a href="';
		echo $my_meta;
		echo '">';
		echo the_post_thumbnail('digigit-home-featured');
		echo '</a>';
	}
	echo '</div>';
}
else {
} 
?>								

						<?php endforeach; ?>
						<?php $post = $tmp_post; ?>

		</div><!-- #featured -->

<script type="text/javascript">
jQuery(window).load(function() {
	jQuery('#featured').orbit({ 
		animation: '<?php echo of_get_option('slide_animation'); ?>', // four options under Theme Options
			animationSpeed: 800,                // how fast animtions are
			timer: <?php $timer = of_get_option('slide_timer');
		if ( $timer == '1' ) {
			echo 'false';
		} else {
			echo 'true';
		}
?>, 			 // true or false to have the timer
	resetTimerOnClick: false,           // true resets the timer instead of pausing slideshow progress
	advanceSpeed: <?php echo of_get_option('slide_speed','4500'); ?>, 		 // if timer is enabled, time between transitions 
	pauseOnHover: false, 		 // if you hover pauses the slider
	startClockOnMouseOut: true, 	 // if clock should start on MouseOut
	startClockOnMouseOutAfter: 1000, 	 // how long after MouseOut should the timer start again
	directionalNav: <?php $nav = of_get_option('slide_nav');
		if ( $nav == '1' ) {
			echo 'false';
		} else {
			echo 'true';
		}
?>, 		 // manual advancing directional navs
	captions: true, 			 // do you want captions?
	captionAnimation: 'fade', 		 // fade, slideOpen, none
	captionAnimationSpeed: 800, 	 // if so how quickly should they animate in
	bullets: <?php $bullets = of_get_option('slide_bullets');
		if ( $bullets == '1' ) {
			echo 'true';
		} else {
			echo 'false';
		}
?>,			 // true or false to activate the bullet navigation
	bulletThumbs: false,		 // thumbnails for the bullets
	bulletThumbLocation: '',		 // location from this file where thumbs will be
	afterSlideChange: function(){}, 	 // empty function 
	fluid: '16x6'
	});
});
</script>

<?php }

function aihrus_edd_get_payment_meta( $meta, $payment_id ) {
	if ( -1 == $meta['user_id'] ) {
		$user_id         = get_post_meta( $payment_id, '_edd_payment_user_id', true );
		$meta['user_id'] = $user_id;

		$user_info         = maybe_unserialize( $meta['user_info'] );
		$user_info['id']   = $user_id;
		$meta['user_info'] = serialize( $user_info );
	}

	return $meta;
}
add_filter( 'edd_get_payment_meta', 'aihrus_edd_get_payment_meta', 10, 2 );

function aihrus_init() {
	if ( ! is_super_admin() ) {
		show_admin_bar( false );
	}
}
add_action( 'init', 'aihrus_init' );
remove_action( 'wp_head', 'wp_admin_bar_header' );

global $Isa_EDD_Related_Downloads;
remove_action( 'edd_after_download_content', array( $Isa_EDD_Related_Downloads, 'isa_after_download_content' ), 90 );

add_filter( 'edd_purchase_download_form', 'aihrus_edd_purchase_download_form', 10, 2 );
function aihrus_edd_purchase_download_form( $purchase_form, $args ) {
	$id    = $args['download_id'];
	$price = edd_get_download_price( $id );
	if ( 0 == $price ) {
		$price         = '&#036;' . $price;
		$replace       = 'Free';
		$purchase_form = str_replace( $price, $replace, $purchase_form );
	} elseif ( class_exists( 'EDD_Recurring' ) && EDD_Recurring()->is_recurring( $id ) ) {
		$period = EDD_Recurring()->get_period_single( $id );
		if ( 'never' != $period ) {
			$replace       = $price . ' per ' . $period;
			$purchase_form = str_replace( $price, $replace, $purchase_form );
		}
	}

	return $purchase_form;
}


function aihrus_wp_footer() {
	echo <<<EOD
<!-- Zendesk support -->
		<script type="text/javascript" src="//assets.zendesk.com/external/zenbox/v2.6/zenbox.js"></script>
		<style type="text/css" media="screen, projection">
			@import url(//assets.zendesk.com/external/zenbox/v2.6/zenbox.css);
		</style>
			<script type="text/javascript">
		if (typeof(Zenbox) !== "undefined") {
			Zenbox.init({
				dropboxID:   "20182507",
					url:         "https://aihrus.zendesk.com",
					tabTooltip:  "Need Help?",
					tabImageURL: "https://assets.zendesk.com/external/zenbox/images/tab_ask_us_right.png",
					tabColor:    "#ff0000",
					tabPosition: "Right"
			});
		}
		</script>

<!-- Google Analytics Code -->
		<script type="text/javascript">

		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-20956818-1']);
		_gaq.push(['_trackPageview']);

		(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();

		</script>

<!-- ClickTale Bottom part -->
<div id="ClickTaleDiv" style="display: none;"></div>
		<script type="text/javascript">
		if(document.location.protocol!='https:')
			document.write(unescape("%3Cscript%20src='http://s.clicktale.net/WRe0.js'%20type='text/javascript'%3E%3C/script%3E"));
		</script>
		<script type="text/javascript">
		if(typeof ClickTale=='function') ClickTale(6494,0.225,"www08");
		</script>
<!-- ClickTale end of Bottom part -->
EOD;
}
// add_action( 'wp_footer', 'aihrus_wp_footer', 20 );

?>