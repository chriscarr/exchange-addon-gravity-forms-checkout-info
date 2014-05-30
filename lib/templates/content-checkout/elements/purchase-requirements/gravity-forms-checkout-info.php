<?php
/**
 * This is the default template part for the gravity forms checkout info
 * purchase requirement element in the content-checkout
 * template part.
 *
 * @since 1.3.0
 * @version 1.3.0
 * @package IT_Exchange
 *
 * WARNING: Do not edit this file directly. To use
 * this template in a theme, copy over this file
 * to the exchange/content-checkout/elements/purchase-requirements directory
 * located in your theme.
 */

// Don't show anything if login-requirement exists and hasn't been met
if ( in_array( 'logged-in', it_exchange_get_pending_purchase_requirements() ) )
	return;

$session_data = it_exchange_get_session_data( 'ibd_gfci_checkout_forms' );

?>
<?php do_action( 'it_exchange_content_checkout_gravity_forms_checkout_info_purchase_requirement_before_element' ); ?>
	<div class="it-exchange-checkout-gravity-forms-checkout-info-purchase-requirement">
	<div class="checkout-purchase-requirement-gravity-forms-checkout-info-edit">
		<?php do_action( 'it_exchange_content_checkout_gravity_forms_checkout_info_purchase_requirement_before_while' ); ?>
		<?php while ( it_exchange( 'cart', 'cart-items' ) ) : ?>
			<?php $id = $GLOBALS['it_exchange']['cart-item']['product_id']; ?>
			<?php if ( it_exchange_product_has_feature( $id, 'ibd-gravity-forms-info' ) && !isset( $session_data[$id] ) ) : ?>
				<div class="it-exchange-gravity-forms-checkout-info-form">
					<?php do_action( 'it_exchange_content_checkout_gravity_forms_checkout_info_purchase_requirement_before_form' ); ?>
					<?php gravity_form( it_exchange_get_product_feature( $id, 'ibd-gravity-forms-info' ), $display_title = true, $display_description = true, $display_inactive = false, $field_values = null, $ajax = false ); ?>
					<?php do_action( 'it_exchange_content_checkout_gravity_forms_checkout_info_purchase_requirement_after_form' ); ?>
				</div>
			<?php endif; ?>
		<?php endwhile; ?>
		<?php do_action( 'it_exchange_content_checkout_gravity_forms_checkout_info_purchase_requirement_after_while' ); ?>
	</div>
</div>

	<div class="it-exchange-clearfix"></div>
<?php do_action( 'it_exchange_content_checkout_gravity_forms_checkout_info_purchase_requirement_after_element' ); ?>