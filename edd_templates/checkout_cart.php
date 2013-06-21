<?php global $post; ?>

<div class="storegrid checkout">

<table class="product-box <?php if(edd_is_ajax_enabled()) { echo 'ajaxed'; } ?>">
	<thead>
		<tr class="header">
			<?php do_action('edd_checkout_table_header_first'); ?>
			<th colspan="1"><div class="title"><i class="foundicon-cart"></i> Cart</div></th>
			<th colspan="3"><div class="see"><a href="<?php echo site_url(); ?>/downloads/" class="button secondary"><i class="foundicon-refresh"></i> Continue Shopping</a></div></th>
			<?php do_action('edd_checkout_table_header_last'); ?>
		</tr>
	</thead>
	<tbody>
		<?php $cart_items = edd_get_cart_contents(); ?>
		<?php if($cart_items) : ?>
			<?php foreach($cart_items as $key => $item) : ?>			
			
		<tr class="body">
					<?php do_action('edd_checkout_table_body_first', $item['id']); ?>
					<td class="cent" width="120">
						<?php 
							//print_r($item);
							if(current_theme_supports('post-thumbnails')) {
								if(has_post_thumbnail($item['id'])) { 
									echo get_the_post_thumbnail($item['id'], 'edd_checkout_image_size', array('class' => 'checkout-thumb')); 
								} 
							}
							 
						?>
					</td>
					<td width="300">
					<?php $item_title = '<div class="itemtitle">' . get_the_title($item['id']) . '</div>';
							if(!empty($item['options'])) {
								$item_title .= '<div class="itemvariation">' . edd_get_price_name($item['id'], $item['options']) . '</div>';							
							}
							echo '<span class="edd_checkout_cart_item_title">' . $item_title . '</span>'; ?>
					</td>
					<td class="pricebox"><?php echo edd_currency_filter(edd_format_amount(edd_get_cart_item_price($item['id'], $item['options']))); ?></td>
					<td class="edd_cart_actions"><a href="<?php echo edd_remove_item_url($key, $post); ?>" class="droidsans button secondary small radius"><?php _e('Remove', 'edd'); ?></a></td>
					<?php do_action('edd_checkout_table_body_last', $item); ?>
			</tr>
			
			<?php endforeach; ?>
			
		<?php else: ?>
		
			<tr class="edd_cart_item" id="edd_cart_item_<?php echo $item['id']; ?>">
				<td colspan="4" class="emptycart"><?php do_action('edd_empty_cart'); ?></td>
			</tr>
			
		<?php endif; ?>

	</tbody>
	<tfoot>
		<tr class="footer <?php echo of_get_option('digigit_colorbar'); ?>">
			<?php do_action('edd_checkout_table_footer_first'); ?>
			<th colspan="2"></th>
			<th colspan="2" class="edd_cart_total category"><?php _e('Total', 'edd'); ?> <span class="price"><?php echo edd_currency_filter(edd_format_amount(edd_get_cart_amount())); ?></span></th>
			<?php do_action('edd_checkout_table_footer_last'); ?>
		</tr>
	</tfoot>
</table>

</div>