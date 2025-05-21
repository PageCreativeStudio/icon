<?php
/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.3.0
 */

if (!defined('ABSPATH')) {
	exit;
}

do_action('woocommerce_before_account_navigation');
?>

<div class="container-fluid mx-auto max-100 px-2 px-md-4 mx-auto text-left pb-5 pt-3 pt-lg-4"
	aria-label="<?php esc_html_e('Account pages', 'woocommerce'); ?>">
	<div class="bordertop borderbottom font-18 font-mb-16 mb-lg-3 pt-3 pb-1 position-relative">
		<ul class="accountnavigation d-grid d-md-flex flex-wrap pr-md-5 mr-md-4">
			<?php foreach (wc_get_account_menu_items() as $endpoint => $label): ?>
				<?php if ('customer-logout' === $endpoint): ?>
					<li class="<?php echo wc_get_account_menu_item_classes($endpoint); ?> pl-2 pr-2 custom-logout">
						<a class="pr-2 d-flex align-items-center text-danger"
							href="<?php echo esc_url(wc_get_account_endpoint_url($endpoint)); ?>" <?php echo wc_is_current_account_menu_item($endpoint) ? 'aria-current="page"' : ''; ?>>
							<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
								<path
									d="M16.7363 9.03906V5.28906C16.7363 4.69233 16.4993 4.12003 16.0773 3.69807C15.6554 3.27612 15.0831 3.03906 14.4863 3.03906H8.48633C7.88959 3.03906 7.31729 3.27612 6.89534 3.69807C6.47338 4.12003 6.23633 4.69233 6.23633 5.28906V18.7891C6.23633 19.3858 6.47338 19.9581 6.89534 20.3801C7.31729 20.802 7.88959 21.0391 8.48633 21.0391H14.4863C15.0831 21.0391 15.6554 20.802 16.0773 20.3801C16.4993 19.9581 16.7363 19.3858 16.7363 18.7891V15.0391M12.9863 9.03906L9.98633 12.0391M9.98633 12.0391L12.9863 15.0391M9.98633 12.0391H22.7363"
									stroke="#333333" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
							</svg>
							<span class="text-black font-14 pl-2">Sign Out</span>
						</a>
					</li>
				<?php else: ?>
					<li class="<?php echo wc_get_account_menu_item_classes($endpoint); ?> pl-2 pr-2 pb-2">
						<a class="pr-2" href="<?php echo esc_url(wc_get_account_endpoint_url($endpoint)); ?>" <?php echo wc_is_current_account_menu_item($endpoint) ? 'aria-current="page"' : ''; ?>>
							<?php echo esc_html($label); ?>
						</a> |
					</li>
				<?php endif; ?>
			<?php endforeach; ?>
		</ul>
	</div>
</div>

<?php do_action('woocommerce_after_account_navigation'); ?>