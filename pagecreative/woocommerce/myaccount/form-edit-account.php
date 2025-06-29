<?php
/**
 * Edit account form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.7.0
 */

defined('ABSPATH') || exit;

/**
 * Hook - woocommerce_before_edit_account_form.
 *
 * @since 2.6.0
 */
do_action('woocommerce_before_edit_account_form');
?>

<div class="pb-4 pb-lg-5">
	<div class="borderbottom font-18 font-mb-16 mb-lg-4 py-3">
		<div class="d-flex flex-wrap justify-content-between">
			<div>
				<h2 class="text-black font-25 font-mb-20"> Account Settings </h2>
			</div>
			<div class="d-none d-lg-block">
				<p class="font-16 mb-0"><span class="font-17">Need Help?</span> 0207 183 8431 </p>
				<a href="mailto:sales@iconprinting.com" class="font-15 mb-0">sales@iconprinting.com</a>
			</div>
		</div>
	</div>
</div>

<div class="row justify-content-between">
	<div class="col-12 col-lg-6">
		<h2 class="text-black font-20 mb-0 pb-4">Personal Details:</h2>
		<form class="woocommerce-EditAccountForm edit-account" action="" method="post" <?php do_action('woocommerce_edit_account_form_tag'); ?>>

			<?php do_action('woocommerce_edit_account_form_start'); ?>

			<p class="woocommerce-form-row w-100">
				<label for="account_first_name"><?php esc_html_e('First name', 'woocommerce'); ?>&nbsp;<span
						class="required" aria-hidden="true">*</span></label>
				<input type="text" class="woocommerce-Input woocommerce-Input--text input-text"
					name="account_first_name" id="account_first_name" autocomplete="given-name"
					value="<?php echo esc_attr($user->first_name); ?>" aria-required="true" />
			</p>
			<p class="woocommerce-form-row w-100">
				<label for="account_last_name"><?php esc_html_e('Last name', 'woocommerce'); ?>&nbsp;<span
						class="required" aria-hidden="true">*</span></label>
				<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_last_name"
					id="account_last_name" autocomplete="family-name" value="<?php echo esc_attr($user->last_name); ?>"
					aria-required="true" />
			</p>
			<div class="clear"></div>

			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="account_display_name"><?php esc_html_e('Display name', 'woocommerce'); ?>&nbsp;<span
						class="required" aria-hidden="true">*</span></label>
				<input type="text" class="woocommerce-Input woocommerce-Input--text input-text"
					name="account_display_name" id="account_display_name"
					aria-describedby="account_display_name_description"
					value="<?php echo esc_attr($user->display_name); ?>" aria-required="true" /> <span
					id="account_display_name_description"><!--<em><?php esc_html_e('This will be how your name will be displayed in the account section and in reviews', 'woocommerce'); ?></em>--></span>
			</p>
			<div class="clear"></div>

			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="account_email"><?php esc_html_e('Email address', 'woocommerce'); ?>&nbsp;<span
						class="required" aria-hidden="true">*</span></label>
				<input type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="account_email"
					id="account_email" autocomplete="email" value="<?php echo esc_attr($user->user_email); ?>"
					aria-required="true" />
			</p>

			<?php
			/**
			 * Hook where additional fields should be rendered.
			 *
			 * @since 8.7.0
			 */
			do_action('woocommerce_edit_account_form_fields');
			?>

			<fieldset">
				<legend class="text-black font-20 pt-5 mt-lg-4">Password:</legend>

				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<!--<label
						for="password_current"><?php esc_html_e('Current password (leave blank to leave unchanged)', 'woocommerce'); ?></label>-->
					<input type="password" class="woocommerce-Input woocommerce-Input--password input-text"
						name="password_current" id="password_current" autocomplete="off"
						placeholder="Current Password" />
				</p>
				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<!--<label
						for="password_1"><?php esc_html_e('New password (leave blank to leave unchanged)', 'woocommerce'); ?></label>-->
					<input type="password" class="woocommerce-Input woocommerce-Input--password input-text"
						name="password_1" id="password_1" placeholder="New Password" autocomplete="off" />
				</p>
				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<!--<label for="password_2"><?php esc_html_e('Confirm new password', 'woocommerce'); ?></label>-->
					<input type="password" class="woocommerce-Input woocommerce-Input--password input-text"
						name="password_2" id="password_2" placeholder="Confirm new password" autocomplete="off" />
				</p>
				</fieldset>
				<div class="clear"></div>

				<?php
				/**
				 * My Account edit account form.
				 *
				 * @since 2.6.0
				 */
				do_action('woocommerce_edit_account_form');
				?>

				<p class="pt-3">
					<?php wp_nonce_field('save_account_details', 'save-account-details-nonce'); ?>
					<button type="submit"
						class="woocommerce-Button button<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?>"
						name="save_account_details"
						value="<?php esc_attr_e('Save', 'woocommerce'); ?>"><?php esc_html_e('Save', 'woocommerce'); ?></button>
					<input type="hidden" name="action" value="save_account_details" />
				</p>

				<?php do_action('woocommerce_edit_account_form_end'); ?>
		</form>

	</div>

	<div class="col-12 col-lg-5 pt-5 pt-lg-0">
		<h2 class="text-black font-20 mb-0 pb-4">Payment Method:</h2>
		<?php
		defined('ABSPATH') || exit;

		$saved_methods = wc_get_customer_saved_methods_list(get_current_user_id());
		$has_methods = (bool) $saved_methods;
		$types = wc_get_account_payment_methods_types();

		do_action('woocommerce_before_account_payment_methods', $has_methods); ?>

		<?php if ($has_methods): ?>

			<table
				class="woocommerce-MyAccount-paymentMethods shop_table shop_table_responsive account-payment-methods-table">
				<thead>
					<tr>
						<?php foreach (wc_get_account_payment_methods_columns() as $column_id => $column_name): ?>
							<th
								class="woocommerce-PaymentMethod woocommerce-PaymentMethod--<?php echo esc_attr($column_id); ?> payment-method-<?php echo esc_attr($column_id); ?>">
								<span class="nobr"><?php echo esc_html($column_name); ?></span>
							</th>
						<?php endforeach; ?>
					</tr>
				</thead>
				<?php foreach ($saved_methods as $type => $methods): // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited ?>
					<?php foreach ($methods as $method): ?>
						<tr class="payment-method<?php echo !empty($method['is_default']) ? ' default-payment-method' : ''; ?>">
							<?php foreach (wc_get_account_payment_methods_columns() as $column_id => $column_name): ?>
								<td class="woocommerce-PaymentMethod woocommerce-PaymentMethod--<?php echo esc_attr($column_id); ?> payment-method-<?php echo esc_attr($column_id); ?>"
									data-title="<?php echo esc_attr($column_name); ?>">
									<?php
									if (has_action('woocommerce_account_payment_methods_column_' . $column_id)) {
										do_action('woocommerce_account_payment_methods_column_' . $column_id, $method);
									} elseif ('method' === $column_id) {
										if (!empty($method['method']['last4'])) {
											/* translators: 1: credit card type 2: last 4 digits */
											echo sprintf(esc_html__('%1$s ending in %2$s', 'woocommerce'), esc_html(wc_get_credit_card_type_label($method['method']['brand'])), esc_html($method['method']['last4']));
										} else {
											echo esc_html(wc_get_credit_card_type_label($method['method']['brand']));
										}
									} elseif ('expires' === $column_id) {
										echo esc_html($method['expires']);
									} elseif ('actions' === $column_id) {
										foreach ($method['actions'] as $key => $action) { // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
											echo '<a href="' . esc_url($action['url']) . '" class="button ' . sanitize_html_class($key) . '">' . esc_html($action['name']) . '</a>&nbsp;';
										}
									}
									?>
								</td>
							<?php endforeach; ?>
						</tr>
					<?php endforeach; ?>
				<?php endforeach; ?>
			</table>

		<?php else: ?>

			<?php wc_print_notice(esc_html__('No saved methods found.', 'woocommerce'), 'notice'); ?>

		<?php endif; ?>

		<?php do_action('woocommerce_after_account_payment_methods', $has_methods); ?>

		<?php if (WC()->payment_gateways->get_available_payment_gateways()): ?>
			<a class="button"
				href="<?php echo esc_url(wc_get_endpoint_url('add-payment-method')); ?>"><?php esc_html_e('Add payment method', 'woocommerce'); ?></a>
		<?php endif; ?>

	</div>
</div>

<?php do_action('woocommerce_after_edit_account_form'); ?>